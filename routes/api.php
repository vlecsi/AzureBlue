<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CititorController;
use App\Http\Controllers\CarteController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
     return response()->json([
        'message' => "OK Get user!"
    ]);
});

//LOGIN API
//=================================================================
Route::post('Register', 'App\Http\Controllers\AuhoriztationApiController@register'); 
Route::post('Login', 'App\Http\Controllers\AuhoriztationApiController@login'); 



Route::middleware(['auth:sanctum'])->group(function () {

    Route::get('Cititor', 'App\Http\Controllers\CititorController@getAllCititor'); 
    Route::get('Cititor/{id}', 'App\Http\Controllers\CititorController@getCititor'); 
    Route::get('Cititor/filter/{search}', 'App\Http\Controllers\CititorController@getFilterCititor'); 
    
    // NEW CITTIOR
    Route::post('Cititor', 'App\Http\Controllers\CititorController@newCititor'); 
    // MODIFY CITTIOR
    Route::put('Cititor/{id}', 'App\Http\Controllers\CititorController@modifyCititor'); 
    // DELETE CITTIOR
    Route::delete('Cititor/{id}', 'App\Http\Controllers\CititorController@deleteCititor'); 
      
  });



//================================================ CARTE API ======================================================== 

//Route::middleware(['auth:sanctum'])->group(function () {

  Route::get('Carte/filter/{search}', 'App\Http\Controllers\CarteController@getFilterCarte'); 
  Route::get('Carte', 'App\Http\Controllers\CarteController@getAllCarte'); 
  Route::get('Carte/Depozit/{carte_id}', 'App\Http\Controllers\CarteController@getDepozitCarte'); 
    
//});

//================================================ DEPOZIT API ======================================================== 

//Route::middleware(['auth:sanctum'])->group(function () {
  //Route::get('Depozit/Carte/{carte_id}', 'App\Http\Controllers\DepozitController@getDepozitCarte'); 
  
    
//});



// GET
//Route::middleware('auth:sanctum')->get('/Cititor', 'App\Http\Controllers\CititorController@getAllCititor'); 


