<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\CustomerController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/



//========METODO READ=========//

Route::get("/users",[UserController::class, 'read']);


Route::get("/customers",[CustomerController::class,'read']);




//========METODO READ_ONE=========//

Route::patch("/user",[UserController::class, 'read_one']);

Route::patch("/customer",[CustomerController::class, 'read_one']);



//========METODO CREATE=========//

Route::post("/user",[UserController::class,'create']);

Route::post("/customer",[CustomerController::class,'create']);



//========METODO UPDATE=========//

Route::put("/user",[UserController::class,'update']);

Route::put("/customer",[CustomerController::class,'update']);


//========METODO DELETE=========//

Route::delete("/user",[UserController::class,'delete']);

Route::delete("/customer",[CustomerController::class,'delete']);







//  Route::get("/customers",function(Request $request){

//      $message = ['mensaje' => "Clientes"];

//      return response()->json($message); 

//  });




// Route::get("/users",function(Request $request){

//     $message = ['mensaje' => "Usuarios"];

//     return response()->json($message); 


// });







//===============================================
Route::get("/saludo",function(Request $request){
    $message = ['mensaje' => "Hola Mundo !!!, desde la API Backend_ProjectFG"];
    return response()->json($message);  /*Arreglo asociativo en php simil a objeto json*/

});

Route::post("/user1",function(Request $request){
    $message = ['Test_Usuario1' => "Luis Gómez"];
    return response()->json($message);  
});

Route::put("/customer1",function(Request $request){
    $message = ['test_Cliente1' => "Juan Rios",
        'Datos del cliente:'=>[
        'Edad:'=>"35",
        'Género'=>'M',
        'Id'=>'CC',
        'id_Número'=>'123456789',
        'detalle de la compra:'=>['5000','10000','50000']]         /*sin coma el úlimo*/
    ];
    return response()->json($message);  
});

Route::patch("/customer2",function(Request $request){
    $message = ['Test_Cliente2' => "Maria Sierra"];
    return response()->json($message);  
});

Route::delete("/user2",function(Request $request){
    $message = ['test_usuario2' => "Pedro Pérez"];
    return response()->json($message);  
});