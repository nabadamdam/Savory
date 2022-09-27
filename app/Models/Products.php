<?php
namespace App\Models;

class Products{
    private $table = "proizvodi";
    public function getProducts(){
        return \DB::table($this->table)
                ->get();
    }
    public function getProductsPaginate(){
        return \DB::table($this->table)
                ->paginate(3);
    }
    public function deleteProdAjax($id){
        return \DB::table($this->table)
                ->where('idProizvoda',$id)
                ->delete();
    }
    public function getProductWithId($id){
        return \DB::table($this->table)
                ->where('idProizvoda',$id)
                ->get();
    }
    public function getOneProduct($id){
        return \DB::table($this->table)
                ->where('idProizvoda',$id)
                ->first();
    }
    public function getProductsSearchPaginate($value){
        return \DB::table($this->table)
                ->where('Naziv','LIKE','%'.$value.'%')
                ->orWhere('Opis','LIKE','%'.$value.'%')
                ->paginate(3)
                ->setpath('');
    }
    public function insertProduct($name,$imeFajla,$picalt,$desc,$price,$quantity){
        return \DB::table($this->table)
                ->insertGetId(
                    ["Naziv" => $name,"SlikaSrc" => 'images/'.$imeFajla,"SlikaAlt" => $picalt,"Opis" => $desc,"Kolicina" => $quantity,"Cena" => $price,"idKategorije" => 2]
                );
    }
    public function updateProductWithOutPic($name,$picalt,$desc,$price,$id,$quantity){
        return \DB::table($this->table)
                ->where("idProizvoda",$id)
                ->update(['Naziv' => $name,"SlikaAlt" => $picalt,"Opis" => $desc,"Kolicina" => $quantity,"Cena" => $price]);

    }
    public function updateProductWithPic($name,$imeFajla,$picalt,$desc,$price,$id,$quantity){
        return \DB::table($this->table)
                ->where("idProizvoda",$id)
                ->update(['Naziv' => $name,"SlikaSrc" => 'images/'.$imeFajla,"SlikaAlt" => $picalt,"Opis" => $desc,"Kolicina" => $quantity,"Cena" => $price]);

    }
}
