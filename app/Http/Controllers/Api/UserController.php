<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;  /*se debe importar el modelo*/
use Illuminate\Http\Response;

class UserController extends Controller
{

    public function read() //Puede ser eliminado y dejar solo 2OP
    {
        $users = new User();
        $data = $users->all();
        return $data;
    }


    public function create(Request $request)
    {

        $user = new User();

        $user->name = $request->input("name"); //nombre del campo como se va a enviar
        $user->last_name = $request->input("last_name");
        $user->phone = $request->input("phone");
        $user->e_mail = $request->input("e_mail");
        $user->user_name = $request->input("user_name");
        $user->password = $request->input("password");

        $user->save();

        $message = ["message" => "Registro Exitoso de Usuario"];
        return response()->json($message,200);
    }

    public function update(Request $request)
    {

        $idUser = $request->query("id");

        $user = User::find($idUser);


        $user->name = $request->input("name"); //nombre del campo como se va a enviar
        $user->last_name = $request->input("last_name");
        $user->phone = $request->input("phone");
        $user->e_mail = $request->input("e_mail");
        $user->user_name = $request->input("user_name");
        $user->password = $request->input("password");

        $user->save();  
        
        // Obtener todos los datos del usuario actualizado
        $updatedUser = $user->find($idUser);

        $message = [
            "message" => "Actualización Exitosa del Usuario",
            "user"=>$updatedUser,

            // "idUser" => $request->query("id"),
            // "name_User" => $user->name,
            // "last_name_User" => $user->last_name,
            // "e_mail" => $user -> e_mail,
            // "user_name" => $user -> user_name,
            // "password" => $user -> password,            

        ];

        return response($message,Response::HTTP_CREATED);

    }
    
    public function delete(Request $request)
    {

        $idUser = $request->query("id");

        $user = new User();

        $userIdent = $user->find($idUser);

        $userIdent->delete();

        $message = [
            "message" => "El usuario ha sido eliminado",
            "id del usuario" => $request->query("id"),

        ];

        return $message;
    }

    public function read_one(Request $request)
    {

        $idUser = $request->query("id");

        $user = new User();

        $userIdent = $user->find($idUser);

        return $userIdent;
    }

    public function read_2OP(Request $request)
    {
        $userSingle = new User();

        if ($request->query("id")){

            $user = $userSingle->find($request->query("id"));

        }else{
            $user = $userSingle->all();
        }
        
        return response()->json($user,Response::HTTP_CREATED);

    }
}
