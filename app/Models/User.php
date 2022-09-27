<?php
namespace App\Models;

class User{
    private $table = "korisnici";
    public function getAllUser(){
        return \DB::table($this->table)
                ->get();
    }
    public function insertActivity($email,$operation){
        return \DB::table("aktivnosti")
                ->insert(
                    ["EmailKorisnika" => $email,"Operacija" => $operation]
                );
    }
    public function getUserWithUsername($username){
        return \DB::table($this->table)
                ->select("idKorisnika")
                ->where("Username",$username)
                ->get();
    }
    public function updatePassword($password,$id){
        return \DB::table($this->table)
                ->where("idKorisnika",$id)
                ->update(["Pass" => md5($password)]);
    }
    public function getAllUsersAndRole(){
        return \DB::table("korisnici")
                ->join("uloga","korisnici.idUloga","=","uloga.idUloga")
                ->get();
    }
    public function isLogedIn($email,$password){
        return \DB::table($this->table)
                ->where([
                    ["Email",$email],
                    ["Pass",md5($password)]
                    ])
                ->get();

    }
    public function getOneUser($email,$username){
        return \DB::table($this->table)
                ->where("Email",$email)
                ->orWhere("Username",$username)
                ->get();
    }
    public function insertUser($name,$surname,$email,$username,$password){
        return \DB::table($this->table)
                ->insertGetId(
                    ["Ime" => $name,"Prezime" => $surname,"Email" => $email,"Username" => $username,"Pass" => md5($password),"idUloga" => 2]
                );
    }
    public function getSubUser($email){
        return \DB::table("subscribe")
                ->where("Email",$email)
                ->get();
    }
    public function getEmailUser($id){
        return \DB::table($this->table)
                ->select("Email")
                ->where("idKorisnika",$id)
                ->get();
    }
    public function insertSub($email){
        return \DB::table("subscribe")
                ->insertGetId(
                    ["Email" => $email]
                );
    }
    public function insertContact($name,$email,$message){
        return \DB::table("kontakt")
                ->insertGetId(
                    ["Ime" => $name,"Email" => $email,"Pitanje" => $message]
                );
    }
    public function getAllSub(){
        return \DB::table("subscribe")
                ->get();
    }
    public function getAllContact(){
        return \DB::table("kontakt")
                ->get();
    }
    public function deleteUserAjax($id){
        return \DB::table($this->table)
                ->where("idKorisnika",$id)
                ->delete();
    }
    public function deleteContactAjax($id){
        return \DB::table("kontakt")
                ->where("idPitanja",$id)
                ->delete();
    }
    public function deleteSubscribeAjax($id){
        return \DB::table("subscribe")
                ->where("idSub",$id)
                ->delete();
    }
    public function getUserWithId($id){
        return \DB::table("korisnici")
                ->where("idkorisnika",$id)
                ->get();
    }
    public function getAllRoles(){
        return \DB::table("uloga")
                ->get();
    }
    public function updateUser($name,$surname,$email,$username,$role,$idUser){
        return \DB::table($this->table)
                ->where("idKorisnika",$idUser)
                ->update(['Ime' => $name,'Prezime' => $surname,"Email" => $email,"Username" => $username,"idUloga" => $role]);
    }
    public function getAllActivity(){
        return \DB::table("aktivnosti")
                ->get();
    }
    public function getAllActivityWithDate($date){
        return \DB::table("aktivnosti")
                ->where('DatumOperacije',$date)
                ->get();
    }
    public function insertReservation($date,$time,$people,$idUser){
        return \DB::table("rezervacije")
                ->insertGetId(
                    ["datum" => $date,"vreme" => $time,"brojLjudi" => $people,"idKorisnika" => $idUser]
                );
    }
    public function getReservation($time,$date){
        return \DB::table("rezervacije")
                ->where([
                    ['datum',$date],
                    ['vreme',$time]
                    ])
                ->get();
    }

}
