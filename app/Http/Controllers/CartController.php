<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Korisnik;
use App\Models\Links;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe;

class CartController extends FrontController
{
    public function add(Request $request)
    {
        $id = $request->id;
        $quantity = $request->quantity;
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = array();
        } else {
            foreach ($cart as $value) {
                if ($value['id'] == $id) {
                    $response['warning'] = true;
                    $response['msg'] = __('Product is already in cart');
                    return $response;
                }
            }
        }

        $product = \DB::table('proizvodi')->where('idProizvoda', $request->id)->first();

        $cart[] = [
            "id" => $product->idProizvoda,
            "name" => $product->Naziv,
            "price" => $product->Cena*$quantity,
            "quantity" => $quantity,
            "currency" => 'EUR',
            "featured_image" => $product->SlikaSrc,
        ];

        session()->put('cart', $cart);
        $response['success'] = true;
        $response['msg'] = __('Successfully added product to cart');
        return response()->json($response);
    }

    public function remove($id)
    {
        $cart = session()->get('cart');
        foreach ($cart as $key => $item) {
            if ($item['id'] == $id) {
                unset($cart[$key]);
                session()->put('cart', $cart);
            }
        }

        toastr()->info('Successfully removed product from cart');
        return redirect()->route('cart');
    }


    public function cart()
    {
        $subscriber = null;
        $cart = session()->get('cart');

        if (empty($cart)) {
            toastr()->error('Cart is empty');
            return redirect()->route('homepage');
        }

        if(session()->has('user')){
            $subscriber = Korisnik::where('idKorisnika', session('user')[0]->idKorisnika)->first();
        }

        $final_price = 0;
        foreach ($cart as $item) {
            $final_price += $item['price'];
        }

        $model = new Links();
        $links = $model->getLinks();
        $this->data['links'] = $links;

        return view('pages.cart', compact('cart', 'final_price', 'links', 'subscriber'));
    }

    public function payment(Request $request)
    {
        $cart = session()->get('cart');
        $itemId = $cart[0]["id"];
        /** #todo Proveri da li je korisnik ulogovan */

        if(!session()->has('user')){
            toastr()->error('You must be logged in to buy something');
            return redirect()->route('homepage');
        }

        if (!$cart) {
            toastr()->error('Cart is empty');
            return redirect()->route('homepage');
        }

        $this->validate($request, array(
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'country' => 'required',
            'postal_code' => 'required',
            'city' => 'required'
        ));

        \DB::table('korisnici')
            ->where("idKorisnika", session('user')[0]->idKorisnika)
            ->update(['broj_telefona' => $request->phone_number, "grad" => $request->city, "adresa" => $request->address, "postanski_broj" => $request->postal_code, "drzava" => $request->country]);

        $now_time = Carbon::now();

        $cart_db = new Cart();
        $cart_db->first_name = $request->first_name;
        $cart_db->last_name = $request->last_name;
        $cart_db->email = $request->email;
        $cart_db->country = $request->country;
        $cart_db->address = $request->address;
        $cart_db->city = $request->city;
        $cart_db->postal_code = $request->postal_code;
        $cart_db->phone_number = $request->phone_number;
        //$cart_db->user_id = $user->id;
        $cart_db->status = 'Započeto';
        $cart_db->payment_method = 'stripe_payment';
        $price = 0;
        foreach ($cart as $val) {
            $price += $val['price'];
        }
        $cart_db->price = $price;
        $cart_db->started_at = $now_time;
        if ($cart_db->save()) {
            foreach ($cart as $val) {
                $cart_items = new CartItem();
                $cart_items->cart_id = $cart_db->id;
                $cart_items->item_id = $val['id'];
                $cart_items->quantity = $val['quantity'];
                $cart_items->price = $val['price'];
                $cart_items->save();

                $product = \DB::table('proizvodi')
                ->where('idProizvoda',$val['id'])
                ->first();

                $newQuantity = $product->Kolicina - $val['quantity'];
        
                \DB::table('proizvodi')
                ->where("idProizvoda",  $val['id'])
                ->update(['Kolicina' => $newQuantity]);
            }

            session()->forget('cart');


            $total=$request->input('totall');
            $total1=$total*100;
            $total=(int)$total1;


            $kon="idOrders: ".$cart_db->id;


            // Set your secret key: remember to change this to your live secret key in production
            // See your keys here: https://dashboard.stripe.com/account/apikeys

            \Stripe\Stripe::setApiKey('sk_test_51KwV0xFYMD1HadiTJsLVMYx2sqiU7TWh4WWJV09WnAvCXaH7ljYMiZ7SJEaitDYATIsiMlQdEY5jdCKhAst9FTbC00bSU4Se1c');

            // Token is created using Checkout or Elements!
            // Get the payment token ID submitted by the form:
            $token = $_POST['stripeToken'];

            $charge = \Stripe\Charge::create([
                'amount' => $total,
                'currency' => 'usd',
                'description' => $kon,
                'source' => $token,
            ]);
        
            if($charge->status == 'succeeded') {
                $cart_db->status = 'Succeeded';
                $cart_db->save();
                toastr()->success('Successfully payment!');
                return view("pages/home",$this->data);
            } else {
                toastr()->error('Something is wrong with the payment please try again!');
                return view("pages/home",$this->data);
            }
            
        }
    }

}
