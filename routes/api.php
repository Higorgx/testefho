<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//rota de teste api
Route::get('/is_alive', function(){
    $response = new \Illuminate\Http\Response(json_encode(['msg'=>'FHO CRUD']));
    $response->header('Content-Type', 'application/json');
    return $response;
});
//lista students

Route::post('/create/student', [StudentController::class, 'save']);
Route::get('/read/students', [StudentController::class, 'list_all']);
Route::get('/read/student/{id}', [StudentController::class, 'list_all']);
Route::put('/update/student', [StudentController::class, 'update']);
Route::Delete('/delete/student/{id}', [StudentController::class, 'delete']);