<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Cititor;
use App\Models\Log;

class CititorController extends Controller
{

    public function getFilterCititor(Request $request,$serach )
    {
        $response= Cititor::
         where('nume', 'like', '%'.$serach.'%')
        ->orWhere('prenume', 'like', '%'.$serach.'%')
        ->orWhere('nume', 'like', '%'.$serach.'%')
        ->orWhere('nr_permis', 'like', '%'.$serach.'%')
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

    public function getCititor(Request $request, $id)
    {
        $response = Cititor::find($id); 
        
        if ($response==null){
            $data =  [ "message" => 'Nu gasesc date care raspund criterilor de cautare', ];      
            return response()->json($data, 404);
        }

        return response()->json($response, 200);
    }

    public function getAllCititor(Request $request)
    {

        $response = Cititor::Paginate(30); 

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

    
    

    public function newCititor(Request $request)
    {

//       $validator = Validator::make($request->all(), [
  //          "nume" => 'bail|required|string|min:3|max:50',
    //        "prenume" => 'bail|required|string|min:3|max:50',
      //      "nr_permis" => 'bail|required|unique:cititors|string|min:3|max:50',
      //      "email"=> 'bail|nullable|unique:cititors',
      //      "cnp"=> 'bail|nullable|unique:cititors',
      //    ]); 

          $validator = Validator::make($request->all(), [
            "nume" => 'bail|required|string|min:3|max:50',
            "prenume" => 'bail|required|string|min:3|max:50',
            "nr_permis" => 'bail|required|string|min:3|max:50',
            "email"=> 'bail|nullable',
            "cnp"=> 'bail|nullable',
          ]); 




        if ($validator->fails()) {
            $data =  ["data" => $validator->errors()->all()];
            return response()->json($data, 406 );
         }

       //  $cititor = new Cititor($request->all());
       //  $cititor->save(); 

       //   $cititor->fill($request->all());
         $cititor = new Cititor();
         $cititor->nume = strtoupper($request->nume);
         $cititor->prenume = strtoupper($request->prenume);
         $cititor->nr_permis = strtoupper($request->nr_permis);
         $cititor->email = strtoupper($request->email);
         $cititor->cnp = strtoupper($request->cnp);
         $cititor->save(); 
        
        $data =  [ "data" => $cititor, ];      
        return response()->json($data, 201);
        
    }
    public function modifyCititor(Request $request,$id){
        
        $validator = Validator::make($request->all(), [
            "nume" => 'bail|required|string|min:3|max:50',
            "prenume" => 'bail|required|string|min:3|max:50',
            "nr_permis" => 'bail|required|string|min:3|max:50',
            "email"=> 'bail|nullable',
            "cnp"=> 'bail|nullable',
          ]); 
          if ($validator->fails()) {
            $data =  ["data" => $validator->errors()->all()];
            return response()->json($data, 406 );
         }

         $cititor = Cititor::find($id);
         if ($cititor==null){
            $data =  [ "data" => null, ];      
            return response()->json($data, 404);
        }

        $cititor->nume = $request->get('nume');  
        $cititor->prenume = $request->get('prenume');  
        $cititor->nr_permis = $request->get('nr_permis');  
        $cititor->email = $request->get('email');  
        $cititor->cnp = $request->get('cnp');  
        $cititor->save();  

        $data =  [ "data" => $cititor, ];      
        return response()->json($data, 202);
         
    }
    public function deleteCititor(Request $request,$id){
    
        $cititor = Cititor::find($id);
        if ($cititor==null){
           $data =  [ "data" => null, ];      
           return response()->json($data, 404);
       }
       $data =  [ "data" => "nu esti autorizat", ];      
       return response()->json($data, 401);

     //  $cititor->delete();
     //  $data =  [ "data" => $cititor, ];      
     //  return response()->json($data, 202);
    }




}
