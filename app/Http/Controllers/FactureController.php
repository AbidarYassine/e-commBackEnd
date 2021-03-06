<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Service\FactureService;
use Illuminate\Http\Request;
use App\Http\Resources\FactureResource;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(FactureService $factureService)
    {
//        FactureResource(User::findOrFail($id));
        return FactureResource::collection($factureService->getAllFacture());

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
     * @return FactureResource
     */
    public function store(Request $request, FactureService $factureService)
    {
//        $facture = new Facture();
        $facture = [
            "datefact" => $request->datefact,
            "baseht" => $request->baseht,
            "tva" => $request->tva,
            "remise" => $request->remise,
            "totalht" => $request->totalht,
            "totalttc" => $request->totalttc,
            "command_id" => $request->idCommande,
        ];
        return new FactureResource($factureService->save($facture));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Facture $facture
     * @return FactureResource
     */
    public function show($id, FactureService $factureService)
    {
        return new FactureResource($factureService->findById($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Facture $facture
     * @return \Illuminate\Http\Response
     */
    public function edit(Facture $facture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Facture $facture
     * @return FactureResource
     */
    public function update(Request $request, FactureService $factureService)
    {
        return $factureService->updateFactures($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Facture $facture
     * @return FactureResource
     */
    public function destroy($id, FactureService $factureService)
    {
        return $factureService->deleteFacture($id);
    }

    public function findByCommande($idCommande, FactureService $factureService)
    {
        return new FactureResource($factureService->findByIdCommande($idCommande));
    }
}
