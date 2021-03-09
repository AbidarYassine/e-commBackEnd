<?php

namespace App\Http\Controllers;

use App\Marque;
use App\Http\Resources\MarqueResource;
//use App\Models\Marque as ModelsMarque;
use App\Service\MarqueService;

use Illuminate\Http\Request;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MarqueService $marqueService)
    {
        return MarqueResource::collection($MarqueService->getAllMarques());

    }

    /**
     * Show the form for creating a new resource.
     *
     *

    /**
   
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , MarqueService $marqueService)
    {
        $marque = [
            "libelle"=>$request->marqlib,
        ];
        
        return new MarqueResource($MarqueService->save($marque));
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id , MarqueService $marqueService)
    {
        return new MarqueRessource($MarqueService->findById($marque));

    }

    /**
     * Show the form for editing the specified resource.
     *

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *  @return MarqueResource
     */
    public function update(Request $request , MarqueService $marqueService)
    {
        return $marqueService->updateMarques($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,  MarqueService $marqueService)
    {
        return $factureService->deleteFacture($id);
    }

    public function findByMarque($idMarque,  MarqueService $marqueService)
    {
        return new MarqueResource($marqueService->findByIdMarque($idMarque));
    }
}

}
