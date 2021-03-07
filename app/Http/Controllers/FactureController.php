<?php

namespace App\Http\Controllers;

use App\Exception\CommandNotFountException;
use App\Exception\FactureNotFoundException;
use App\Http\Requests\FactureStoreRequest;
use App\Models\Facture;
use App\Service\FactureService;
use App\Traits\GeneralTrait;
use http\Client\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Resources\FactureResource;
use Illuminate\Support\Facades\Validator;

class FactureController extends Controller
{
    use GeneralTrait;

    /**
     * Display a listing of the resource.
     *
     * @param FactureService $factureService
     * @return JsonResponse
     */
    public function index(FactureService $factureService): JsonResponse
    {
        return $this->returnData(FactureResource::collection($factureService->getAllFacture()), '200');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param FactureService $factureService
     * @return JsonResponse
     */
    public function store(Request $request, FactureService $factureService): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'datefact' => 'required|date|date_format:Y-m-d|after:yesterday',
            'baseht' => 'required|numeric',
            "tva" => 'required|numeric',
            "remise" => 'required|numeric',
            "totalht" => 'required|numeric',
            "totalttc" => 'required|numeric',
            'command_id' => 'exists:App\Models\Command,id'
        ], [], [
            'datefact' => 'Date Facture',
            'baseht' => 'Base Hors Taxe',
            'tva' => 'TVA',
            'remise' => 'Remise',
            'totalht' => 'Total Hors Taxe',
            'totalttc' => 'TTC',
            'command_id' => 'Command'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 500);
        }
        $facture = [
            "datefact" => $request->datefact,
            "baseht" => $request->baseht,
            "tva" => $request->tva,
            "remise" => $request->remise,
            "totalht" => $request->totalht,
            "totalttc" => $request->totalttc,
            "command_id" => $request->command_id,
        ];
        return $this->returnData(new FactureResource($factureService->save($facture)), '201');


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
        return $this->returnData(new FactureResource($facture), '200');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param FactureService $factureService
     * @return JsonResponse
     */
    public function update(Request $request, FactureService $factureService): JsonResponse
    {
        try {
            $factureService->updateFactures($request);
        } catch (FactureNotFoundException $ex) {
            return response()->json(["error" => $ex->getMessage()], 404);
        }
        return $this->returnSuccessMessage('Successfully update Facture', 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param FactureService $factureService
     * @return JsonResponse
     */
    public function destroy($id, FactureService $factureService): JsonResponse
    {
        try {
            $factureService->deleteFacture($id);
        } catch (FactureNotFoundException $ex) {
            return response()->json(["error" => $ex->getMessage()], 404);
        }
        return $this->returnSuccessMessage('Successfully delete Facture And Command Associate', 204);
    }

    public function findByCommande($idCommande, FactureService $factureService): JsonResponse
    {
        try {
            $facture = $factureService->findByIdCommande($idCommande);
        } catch (CommandNotFountException $ex) {
            return response()->json(["error" => $ex->getMessage()], 404);
        }
        return $this->returnData(new FactureResource($facture), '200');
    }
}
