<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
class ProductsController extends FrontController
{
    protected $model;
    public function __construct(){
        parent::__construct();
        $this->model = new Products;
    }
    public function index(){
        try{
            $products = $this->model->getProductsPaginate();
            $this->data['products'] = $products;
            return view("pages/menu",$this->data);
        }
        catch(\Exception $ex){
            return \redirect("/")->with("message","Error with load page menu!");
            \Log::error($ex->getMessage());
        }   
    }
    public function search(Request $request){
        $value = $request->input('q');
        if($value != ""){
            try{
                $products = $this->model->getProductsSearchPaginate($value);
                $products->appends(array(
                    'q' => $value,
                ));
                if(count($products) > 0){
                    return view('pages/menu')->with('products',$products)->with($this->data);
                }
            }
            catch(\Exception $ex){
                return \redirect("/")->with("message","Error with search!");
                \Log::error($ex->getMessage());
            } 
        }else{
            return $this->index();
        }
        
        
    }
    public function oneProduct($id){
        try{
            $oneProducts = $this->model->getOneProduct($id);
            if(isset($oneProducts) > 0){
                return view('pages/oneProduct')->with('oneProducts',$oneProducts)->with($this->data);
            }
        }
        catch(\Exception $ex){
            dd($ex);
            return \redirect("/")->with("message","Error with getting the product!");
            \Log::error($ex->getMessage());
        } 
    }
}
