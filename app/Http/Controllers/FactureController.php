<?php

namespace App\Http\Controllers;


use App\Exceptions\Command\CommandNotFountException;
use App\Exceptions\Facture\FactureAlreadyExistException;
use App\Exceptions\Facture\FactureNotFoundException;
use App\Http\Requests\FactureStoreRequest;
use App\Service\FactureService;
use App\Traits\GeneralTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Resources\FactureResource;

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
     * @param FactureStoreRequest $request
     * @param FactureService $factureService
     * @return JsonResponse
     */
    public function store(FactureStoreRequest $request, FactureService $factureService): JsonResponse
    {
        try {
            $facture = [
                "datefact" => $request->datefact,
                "baseht" => $request->baseht,
                "tva" => $request->tva,
                "remise" => $request->remise,
                "totalht" => $request->totalht,
                "totalttc" => $request->totalttc,
                "command_id" => $request->command_id,
            ];
            $factureSaved = $factureService->save($facture);
        } catch (FactureAlreadyExistException | \Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
            return response()->json(["error" => $er->getMessage()], 422);
        }
        return $this->returnData(new FactureResource($factureSaved), '201');

    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @param FactureService $factureService
     * @return JsonResponse
     */
    public
    function show($id, FactureService $factureService): JsonResponse
    {
        try {
            $facture = $factureService->findById($id);
        } catch (FactureNotFoundException $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        }
        return $this->returnData(new FactureResource($facture), '200');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param FactureStoreRequest $request
     * @param FactureService $factureService
     * @return JsonResponse
     */
    public
    function update(FactureStoreRequest $request, FactureService $factureService): JsonResponse
    {
        try {
            $factureService->updateFactures($request);
        } catch (FactureNotFoundException | CommandNotFountException | \Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
            return response()->json(["error" => $er->getMessage()], 422);
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
    public
    function destroy($id, FactureService $factureService): JsonResponse
    {
        try {
            $factureService->deleteFacture($id);
        } catch (FactureNotFoundException $ex) {
            return response()->json(["error" => $ex->getMessage()], 404);
        }
        return $this->returnSuccessMessage('Successfully delete Facture And Command Associate', 204);
    }

    public
    function findByCommande($idCommande, FactureService $factureService): JsonResponse
    {
        try {
            $facture = $factureService->findByIdCommande($idCommande);
        } catch (CommandNotFountException $ex) {
            return response()->json(["error" => $ex->getMessage()], 404);
        }
        return $this->returnData(new FactureResource($facture), '200');
    }
}
