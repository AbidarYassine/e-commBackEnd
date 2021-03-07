<?php

namespace App\Http\Controllers;

use App\Exception\FactureNotFoundException;
use App\Models\Facture;
use App\Service\FactureService;
use http\Client\Response;
use Illuminate\Http\JsonResponse;
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
     * @param $id
     * @param FactureService $factureService
     * @return JsonResponse
     */
    public function show($id, FactureService $factureService): JsonResponse
    {
        try {
            $facture = $factureService->findById($id);
        } catch (FactureNotFoundException $ex) {
            return response()->json(["error" => $ex->getMessage()], 404);
        }
        return response()->json(["data" => new FactureResource($facture), "status" => '200']);

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
