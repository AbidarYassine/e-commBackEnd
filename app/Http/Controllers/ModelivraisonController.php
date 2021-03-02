<?php

namespace App\Http\Controllers;

use App\Models\Modelivraison;
use App\Service\ModeLivraisonService;
use Illuminate\Http\Request;

class ModelivraisonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ModeLivraisonService $modeLivService)
    {
        return $modeLivService->getAllMode();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ModeLivraisonService $modeLivService)
    {
        $facture = [
            "modlivLib" => $request->modlivLib,
            "modelibDesc" => $request->modelibDesc,
        ];
        return $modeLivService->save($facture);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Modelivraison $modelivraison
     * @return \Illuminate\Http\Response
     */
    public function show($modelivraison, ModeLivraisonService $modeLivService)
    {
        return $modeLivService->findById($modelivraison);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Modelivraison $modelivraison
     * @return \Illuminate\Http\Response
     */
    public function edit(Modelivraison $modelivraison)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Modelivraison $modelivraison
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModeLivraisonService $modeLivService)
    {
        return $modeLivService->updateModeLivraison($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Modelivraison $modelivraison
     * @return \Illuminate\Http\Response
     */
    public function destroy($modelivraison, ModeLivraisonService $modeLivService)
    {
        return $modeLivService->deleteModeLivraison($modelivraison);
    }
}
