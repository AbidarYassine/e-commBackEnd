<?php

namespace App\Http\Controllers;
use App\Http\Resources\ProprieteRessource;
use App\Models\Propriete;
use App\Service\ProprieteService;
use Illuminate\Http\Request;

class ProprieteController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProprieteService $proprieteService)
    {
        return ProprieteRessource::collection($proprieteService->getAllPropriete());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('Proriete.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , ProprieteService $proprieteService)
    {
        $proriete = [
            "lib" => $request->lib,
            "propvaleur" => $request->propvaleur,
        
        ];
        return new ProprieteRessource($proprieteService->save($proriete));

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, ProprieteService $proprieteService)
    {
        return new ProprieteRessource($proprieteService->findById($propriete));

    }

    /**
     * Show the form for editing the specified resource.
     *
     *

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,ProprieteService $proprieteService)
    {
        return $proprieteService->updatePropriete($request);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($propriete , ProprieteService $proprieteService)
    {
        return $proprieteService->deletePropriete($propriete);

    }
}
