<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function read()
    {
        $products = new Product();
        $data = $products->all();
        return $data;
    }

    public function create(Request $request)
    {

    $product = new Product();

    $product->name = $request->input("name");
    $product->quantity = $request->input("quantity");
    $product->unit_value = $request->input("unit_value");
    $product->total_value = $request->input("total_value");
    $product->customer = $request->input("customer");

    $product-> save();

    $message = ["Mensaje"=> "registro exitoso de Producto",];
        return response()->json($message);

    }

    public function update(Request $request)
    {
        $idProduct = $request ->query("id");

        $product = new Product();

        $productIdent = $product->find($idProduct);

        $productIdent->name = $request->input("name"); //nombre del campo como se va a enviar
        $productIdent->quantity = $request->input("quantity");
        $productIdent->unit_value = $request->input("unit_value");
        $productIdent->total_value = $request->input("total_value");
        $productIdent->customer = $request->input("customer"); 

        $productIdent->save();

        $message = [
            "Mensaje"=>"Actualización exitosa de Producto",
            "id del Producto"=>$request->query("id"),            
        ];

        return $message;
    }

    public function delete(Request $request)

    {
        $idProduct = $request->query("id");

        $product = new Product();

        $productIdent = $product->find($idProduct);

        $productIdent->delete();

        $message = [
            "Mensaje"=> "El producto ha sido eliminado",
            "Id del Producto"=>$request->query("id"),
        ];

        return $message;
    }

    public function read_one(Request $request)

    {
        $idProduct = $request->query("id");

        $product = new Product();

        $productIdent = $product->find($idProduct);

        return $productIdent;
    }







}
