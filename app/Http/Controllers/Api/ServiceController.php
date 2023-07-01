<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{

    public function read()
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
        return response()->json($message);   
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

        return $message;
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
}
