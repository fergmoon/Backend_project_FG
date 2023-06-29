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

        $message=["message"=>"Registro Exitoso"];             
        return response()->json($message) ;
        

    }

    public function update(){
        return true;

    }
    public function delete(){
        return true;

    }
}
