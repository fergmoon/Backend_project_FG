<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Http\Response;

class ServiceController extends Controller
{

    public function read() //Puede ser eliminado y dejar solo 2OP
    {
        $services = new Service();
        $data = $services->all();
        return $data;
    }
    
    public function create(Request $request)
    {
        $service = new Service();
        
        $service->quantity = $request->input("quantity"); //nombre del campo como se va a enviar
        $service->type = $request->input("type");
        $service->unit_value = $request->input("unit_value");
        $service->total_value = $request->input("total_value");
        $service->customer = $request->input("customer");

        $service->save();

        $message = ["message"=>"Registro exitoso del servicio"];
        return response()->json($message, Response::HTTP_CREATED);   
    }

    public function update(Request $request)
    {
        $idService = $request->query("id");

        $service = new Service();

        $serviceIdent = $service->find($idService);

        $serviceIdent->quantity = $request->input("quantity"); //nombre del campo como se va a enviar
        $serviceIdent->type = $request->input("type");
        $serviceIdent->unit_value = $request->input("unit_value");
        $serviceIdent->total_value = $request->input("total_value");
        $serviceIdent->customer = $request->input("customer");        

        $serviceIdent->save();

        $message = [
            "Mensaje"=> "Actualización Exitosa Tipo de Servicio",
            "id del Servicio" => $request->query("id"),
            "Tipo de servicio actual"=>$serviceIdent->type
        ];

        return response($message,200);

    }

    public function delete (Request $request)
    {
        $idService = $request->query("id");

        $service = new Service();

        $serviceIdent = $service->find($idService);

        $serviceIdent->delete();

        $message = [
            "message"=>"El servicio ha sido eliminado",
            "Id del Servicio"=>$request->query("id"),
        ];

        return $message;
        }

    public function read_one(Request $request)
    {
        $idService = $request->query("id");

        $service = new Service();

        $serviceIdent = $service->find($idService);

        return $serviceIdent;

    }

    public function read_2OP(Request $request)
    {
        $serviceSingle = new Service();

        if ($request->query("id")){

            $service = $serviceSingle->find($request->query("id"));

        }else{
            $service = $serviceSingle->all();
        }
        
        return response()->json($service,Response::HTTP_CREATED);
        // return response()->json($service,Response::201);

    }
}
