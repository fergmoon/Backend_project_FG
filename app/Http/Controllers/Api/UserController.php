<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;  /*se debe importar el modelo*/

class UserController extends Controller
{    

    public function read(){
        $users = new User();
        $data = $users -> all();
        return $data;

    }

    
    public function create(Request $request){
        
        $user = new User();

        $user -> name = $request -> input ("name");//nombre del campo como se va a enviar
        $user -> last_name = $request -> input("last_name");
        $user -> phone = $request -> input("phone");
        $user -> e_mail = $request -> input("e_mail");
        $user -> user_name = $request -> input("user_name");
        $user -> password = $request -> input("password");
        
        $user ->save();

        $message=["message"=>"Registro Exitoso de Usuario"];             
        return response()->json($message) ;
        

    }

    public function update(Request $request){

        $idUser = $request->query("id");

        $user = new User();

        $userIdent = $user->find($idUser);    
           
        
         $userIdent -> name = $request->input("name");//nombre del campo como se va a enviar
         $userIdent-> last_name = $request->input("last_name");
         $userIdent-> phone = $request->input("phone");
         $userIdent-> e_mail = $request->input("e_mail");
         $userIdent-> user_name = $request->input("user_name");
         $userIdent-> password = $request->input("password");

         $userIdent -> save();

         $message = [
             "message"=>"Actualización Exitosa del Usuario",
             "idUser" => $request->query("id"),
             "name_User" => $userIdent->name,
             "last_name_User" => $userIdent->last_name
                    
         ];    

         return $message;


        // $updateUser = [
        //     "name" => $request->input("name"),
        //     "last_name" => $request->input("name"),
        //     "phone" => $request->input("phone"),
        //     "e_mail" => $request->input("e_mail"),
        //     "user_name" => $request->input("user_name"),
        //     "password" => $request->input("password"),
        // ];   

           

    }
    public function delete(Request $request){

        $idUser = $request ->query("id");

        $user = new User();

        $userIdent = $user -> find($idUser);

        $userIdent -> delete();

        $message = [
            "message"=> "El usuario ha sido eliminado",
            "id del usuario" => $request->query("id"),

        ];

        return $message;

    }

    public function read_one(Request $request){

        $idUser = $request->query("id");

        $user = new User();

        $userIdent = $user->find($idUser); 

        return $userIdent;

 



    }
}
