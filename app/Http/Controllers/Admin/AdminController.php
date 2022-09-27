<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontController;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;
use App\Models\Cart;
use App\Models\CartItem;
use App\Http\Requests\UpdateRequest;
use App\Http\Requests\productRequest;

class AdminController extends FrontController
{   
    protected $modelUser;
    protected $modelProduct;
    protected $modelCart;
    protected $modelCartItems;
    public function __construct(){
        parent::__construct();
        $this->modelUser = new User();
        $this->modelProduct = new Products();
        $this->modelCart = new Cart();
        $this->modelCartItems = new CartItem();
    }
    public function index(){
        try{
            $products = $this->modelProduct->getProducts();
            $users = $this->modelUser->getAllUser();
            $subscribes = $this->modelUser->getAllSub();
            $contacts = $this->modelUser->getAllContact();
            $activitys = $this->modelUser->getAllActivity();
            $carts = $this->modelCart->getAllCarts();
            $this->data['products'] = $products;
            $this->data['users'] =$users;
            $this->data['subscribes'] = $subscribes;
            $this->data['contacts'] = $contacts;
            $this->data['activitys'] = $activitys;
            $this->data['carts'] = $carts;
            return view("pages/admin/admin",$this->data);
        }catch(\Exception $ex){
            return \redirect("/")->with("message","Error with load admin page!");
            \Log::error($ex->getMessage());
        }
    }
    public function deleteProductAjax($id){
        try{
            $product = $this->modelProduct->deleteProdAjax($id);
            if($product){
                $products = $this->modelProduct->getProducts(); 
                return ["data" => $products];
            }
        }
        catch(\Exception $ex){
            return \redirect("/admin")->with("message","Error with delete product!");
            \Log::error($ex->getMessage());
        }
        
    }
    public function deleteUserAjax($id){
        try{
            $user = $this->modelUser->deleteUserAjax($id);
            if($user){
                $users = $this->modelUser->getAllUsersAndRole(); 
                return ["dataUser" => $users];
            }
        }
        catch(\Exception $ex){
            return \redirect("/admin")->with("message","Error with delete user!");
            \Log::error($ex->getMessage());
        }
    }
    public function deleteContactAjax($id){
        try{
            $contact = $this->modelUser->deleteContactAjax($id);
            if($contact){
                $contacts = $this->modelUser->getAllContact(); 
                return ["dataContact" => $contacts];
            }
        }
        catch(\Exception $ex){
            return \redirect("/admin")->with("message","Error with delete contact!");
            \Log::error($ex->getMessage());
        }
    }
    public function deleteSubscribeAjax($id){
        try{
            $subscribe = $this->modelUser->deleteSubscribeAjax($id);
            if($subscribe){
                $subscribes = $this->modelUser->getAllSub(); 
                return ["dataSubscribe" => $subscribes];
            }
        }
        catch(\Exception $ex){
            return \redirect("/admin")->with("message","Error with delete subscribe!");
            \Log::error($ex->getMessage());
        }
    }
    public function getOneProduct($id){
        try{
            $oneProduct = $this->modelProduct->getProductWithId($id);
            if($oneProduct){
                $this->data['products'] = $oneProduct;
                return view("pages/admin/updateProductAdmin",$this->data);
            }
        }
        catch(\Exception $ex){
            return \redirect("/admin")->with("message","Error with edit product subscribe!");
            \Log::error($ex->getMessage());
        } 
    }
    public function setDelivered($id){
        try{
            $updatedCart = $this->modelCart->updateCartDelivered($id);
            if($updatedCart){
                return \redirect("/admin")->with("message","Successfuly update cart!");
            }
            else{
                return \redirect("/admin")->with("message","Unsuccessfuly update cart!");
            }
        }
        catch(\Exception $ex){
            return \redirect("/admin")->with("message","Error with edit product subscribe!");
            \Log::error($ex->getMessage());
        } 
    }
    public function seeDetails($id){
        try{
            $cartItems = $this->modelCartItems->getCartItemsOfCart($id);
            $allProducts = $this->modelProduct->getProducts();
            if($cartItems && $allProducts){
                $this->data['cartItems'] = $cartItems;
                $this->data['allProducts'] = $allProducts;
                return view("pages/admin/seeDetailsOfCart",$this->data);
            }
        }
        catch(\Exception $ex){
            return \redirect("/admin")->with("message","Error with edit product subscribe!");
            \Log::error($ex->getMessage());
        } 
    }
    public function getOneUser($id){
        try{
            $oneUser = $this->modelUser->getUserWithId($id);
            $roles = $this->modelUser->getAllRoles();
            if($oneUser){
                $this->data['users'] = $oneUser;
                $this->data['roles'] = $roles;
                return view("pages/admin/updateUserAdmin",$this->data);
            }
        }
        catch(\Exception $ex){
            return \redirect("/admin")->with("message","Error with edit user subscribe!");
            \Log::error($ex->getMessage());
        } 
    }
    public function updateUser(UpdateRequest $request){
        try{
            $name = $request->input("Name");
            $surname = $request->input("Surname");
            $email = $request->input("Email");
            $username = $request->input("Username");
            $role = $request->input("idUser");
            $idUser = $request->input("idUsr");
            $insertUser = $this->modelUser->updateUser($name,$surname,$email,$username,$role,$idUser);
            if($insertUser){
                return \redirect("/admin")->with("message","Successfuly update user!");
            }
            else{
                return \redirect("/admin")->with("message","Unsuccessfuly update user!");
            }
        }
        catch(\Exception $ex){
            return \redirect("/admin")->with("message","Error with update user subscribe!");
            \Log::error($ex->getMessage());
        } 
    }
    public function activityDate(){
        $data = $_GET['dateValue'];
        $activitys = $this->modelUser->getAllActivityWithDate($data);
        return ["data" => $activitys];
    }
    public function updateProduct(Request $request){
        if($request->has('update')){

            $name= $request->input('name');
            $picalt = $request->input('picAlt');
            $desc = $request->input('desc');
            $price = $request->input('price');
            $id = $request->input('idProd');
            $quantity = $request->input('quantity');
            
            if($request->hasFile('picsrc')) {
                $file = $request->file('picsrc');
                $imeFajla = time().$file->getClientOriginalName();
                if($file->isValid()){
                    $file->move(public_path()."/images/", $imeFajla);
                    try{ 
                        $this->modelProduct->updateProductWithPic($name,$imeFajla,$picalt,$desc,$price,$id,$quantity);
                        return \redirect("/admin")->with('messageProductUpdate','Product are successfuly updated!');
                    }
                    catch(\Exception $ex) {
                        return \redirect("/admin")->with('messageProductUpdate','Error with database!');
                        \Log::error($ex->getMessage());
                    }
                } 
                else {
                    return \redirect("/admin")->with('messageProductUpdate','Something is wrong with picture!');
                }
            }else{
                try{
                    $this->modelProduct->updateProductWithOutPic($name,$picalt,$desc,$price,$id,$quantity);
                    return \redirect("/admin")->with('messageProductUpdate','Product are successfuly updated!!!!!');
                }
                catch(\Exception $ex) {
                    return \redirect("/admin")->with('messageProductUpdate','Error with database!');
                    \Log::error($ex->getMessage());
                }
            }
        }

    }
    public function insertProduct(productRequest $request){
        if($request->has('insert')){
            $name= $request->input('name');
            $picalt = $request->input('picAlt');
            $desc = $request->input('desc');
            $price = $request->input('price');
            $quantity = $request->input('quantity');

            $file = $request->file('picsrc');
            $imeFajla = time().$file->getClientOriginalName();

            if($file->isValid()){
                $file->move(public_path()."/images/", $imeFajla);
                try{
                    $idInsertProduct = $this->modelProduct->insertProduct($name,$imeFajla,$picalt,$desc,$price,$quantity);
                    return \redirect("/admin")->with('messageProduct','Product are successfuly inserted!');
                }
                catch(\Exception $ex) {
                    return \redirect("/admin")->with('messageProduct','Error with database!');
                    \Log::error($ex->getMessage());
                }
            } else {
                return \redirect("/admin")->with('messageProduct','Something is wrong with picture!');
            }


        }
    }
}
