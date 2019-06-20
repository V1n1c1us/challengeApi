<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Exception;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\ServicesSearch;
use App\Breed;

class BreedControllerApi extends Controller {
   /**
    * Receives breed type model
    * @var Breed
    */
   public function __construct(Breed $breed, ServicesSearch $service) {
       $this->breed = $breed;
       $this->service = $service;
   }
   /**
    * @param  \Illuminate\Http\Request  $request
    */
    public function search(Request $request) {
        $resLocal = $this->service->searchDataBase($request->name);
        $resExt = $this->service->searchApi($request->name);

         if($this->service->connectDB()){
             if($resLocal->isEmpty()){
                 $this->service->storageLocal($request->name);
                 return response()->json($resExt);
             } else {
                  return response()->json($resLocal);
             }
         }
         return $resExt;
    }
   /**
    * Inserts API data on local database
    * @return \Illuminate\Http\Response
    */
   public function create() {
    try {
        $create = $this->service->apiStore();
        return response()->json([
                'success' => 'Data stored successfully'
            ], 200);
    } catch(Exception $e){
        return response()->json([
            'error' => 'Data has already been entered into the database'
        ], 500);
    }

   }

   public function show($id) {
       /*$user = $this->user->find($id);
       if(!$user) {
           return response()->json([
               'status' => 'não encontado'
           ]);
       }
       return response()->json($user, 201);
       */
   }

}


