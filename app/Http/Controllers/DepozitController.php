<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Depozit;

class DepozitController extends Controller
{
    public function getDepozit(Request $request, $id)
    {
        $response = Depozit::find($id); 
        
        if ($response==null){
            $data =  [ "message" => 'Nu gasesc date care raspund criterilor de cautare', ];      
            return response()->json($data, 404);
        }

        return response()->json($response, 200);
    }


    public function getDepozitCarte(Request $request, $carte_id)
    {
        $response = Depozit::where('carte_id', $carte_id);
        
        if ($response==null){
            $data =  [ "message" => 'Nu gasesc date care raspund criterilor de cautare', ];      
            return response()->json($data, 404);
        }

        return response()->json($response, 200);
    }


}
