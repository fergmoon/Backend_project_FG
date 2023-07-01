<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;  /*se debe importar el modelo*/

class CustomerController extends Controller
{

    public function read(){  //Puede ser eliminado y dejar solo 2OP
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

         $message=["message"=>"Registro Exitoso de Cliente"];             
         return response()->json($message) ;

     }

     public function update(Request $request){

        $idCustomer = $request->query("id");

        $customer = new Customer();

        $customerIdent = $customer->find($idCustomer);    
           
        
         $customerIdent -> name = $request->input("name");//nombre del campo como se va a enviar
         $customerIdent-> last_name = $request->input("last_name");
         $customerIdent-> type = $request->input("type", ['CC','NIT']);
         $customerIdent-> id_number = $request->input("id_number");
         $customerIdent-> company_name = $request->input("company_name");
         $customerIdent-> city = $request->input("city");

         $customerIdent -> save();

         $message = [
             "message"=>"Actualización Exitosa del Cliente",
             "idCustomer" => $request->query("id"),
             "name_Customer" => $customerIdent->name,
             "last_name_Customer" => $customerIdent->last_name
        
         ];    

         return $message;

        }

         public function delete(Request $request){

            $idCustomer = $request ->query("id");
    
            $customer = new Customer();
    
            $customerIdent = $customer -> find($idCustomer);
    
            $customerIdent -> delete();
    
            $message = [
                "message"=> "El cliente ha sido eliminado",
                "id del cliente" => $request->query("id"),
    
            ];
    
            return $message;
    
        }

     
     public function read_one(Request $request){

        $idCustomer = $request->query("id");

        $customer = new Customer();

        $customerIdent = $customer->find($idCustomer); 

        return $customerIdent;


     }

     public function read_2OP(Request $request)
     {
         $customerSingle = new Customer();
 
         if ($request->query("id")){
 
             $customer = $customerSingle->find($request->query("id"));
 
         }else{
             $customer = $customerSingle->all();
         }
         
         return response()->json($customer);
 
     }

     

}

