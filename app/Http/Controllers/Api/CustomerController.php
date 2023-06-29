<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;  /*se debe importar el modelo*/

class CustomerController extends Controller
{

    public function read(){
        $customers = new Customer();
        $data = $customers -> all();
        return $data;

    }
    
     public function create(Request $request){
        
         $customer = new Customer();

         $customer -> name = $request -> input ("name"); //nombre del campo como se va a enviar
         $customer -> last_name = $request -> input("last_name");
         $customer -> type = $request -> input("type", ['CC','NIT']);
         $customer -> id_number = $request -> input("id_number");
         $customer -> company_name = $request -> input("company_name");
         $customer -> city = $request -> input("city");
        
         $customer ->save();

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

