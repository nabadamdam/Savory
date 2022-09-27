<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends FrontController
{
    public function index(){
        try{
            return view("pages/home",$this->data);
        }
        catch(\Exception $ex){
            \Log::error($ex->getMessage());
        }
    }

}
