<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Carte;
use App\Models\Depozit;

class CarteController extends Controller
{
    public function getFilterCarte(Request $request,$serach )
    {
        $response= Carte::
         where('autor', 'like', '%'.$serach.'%')
        ->orWhere('titlu', 'like', '%'.$serach.'%')
        ->orWhere('editura', 'like', '%'.$serach.'%')
        ->orWhere('aparitie', 'like', '%'.$serach.'%')
        ->Paginate(30); 
        
        
        if ($response==null){
            $data =  [ "message" => 'Nu gasesc date care raspund criterilor de cautare', ];      
            return response()->json($data, 404);
        }    

        if ($response->isEmpty()) {
            $data =  [ "message" => 'Nu gasesc date care raspund criterilor de cautare', ];      
            return response()->json($data, 404);
        }
     

        return response()->json($response, 200);
    }

    public function getAllCarte(Request $request)
    {

        $response = Carte::Paginate(30); 
        //$response=Depozit::with('Carte')->all(); 
    //    $response = Carte::with('Depozits')->Paginate(30); 
        //$response = Carte::find(2)->Depozits()->get();
          //$response = Carte::all()->Depozits()->get();

        if ($response==null){
            $data =  [ "message" => 'Nu gasesc date care raspund criterilor de cautare', ];      
            return response()->json($data, 404);
        }    

        if ($response->isEmpty()) {
            $data =  [ "message" => 'Nu gasesc date care raspund criterilor de cautare', ];      
            return response()->json($data, 404);
        }

//        $log= new Log();
  //      $log->id_user=1;
    //    $log->action_flag="GET_ALL_CITITITOR";
    //    $log->action_details="Cititotors retuned";
     //   $log->status=200;
     //   $log->save();

        //$data =  [ "data" => $response, ];      
        return response()->json($response, 200);
    }


    public function getDepozitCarte(Request $request, $carte_id)
    {

        $response = Depozit::where('carte_id', $carte_id)->Paginate(30); 

        if ($response==null){
            $data =  [ "message" => 'Nu gasesc date care raspund criterilor de cautare', ];      
            return response()->json($data, 404);
        }    

        if ($response->isEmpty()) {
            $data =  [ "message" => 'Nu gasesc date care raspund criterilor de cautare', ];      
            return response()->json($data, 404);
        }

        return response()->json($response, 200);
    }


}
