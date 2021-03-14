<?php

namespace App\Http\Controllers;

use App\Exceptions\Boutique\BoutiqueNotFoundException;
use App\Exceptions\Facture\FactureAlreadyExistException;
use App\Exceptions\Livraison\LivraisonAlreadyCreatedException;
use App\Exceptions\Livraison\LivraisonNotFoundException;
use App\Http\Requests\LivraisonRequest;
use App\Http\Resources\LivraisonRessource;
use App\Models\Livraison;
use App\Service\LivraisonService;
use App\Service\ServiceImpl\LivraisonImpl;
use App\Traits\GeneralTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LivraisonController extends Controller
{
    use GeneralTrait;

    /**
     * Display a listing of the resource.
     *
     * @param LivraisonService $livraisonService
     * @return JsonResponse
     */
    public function index(LivraisonService $livraisonService): JsonResponse
    {
        try {
            $data = $livraisonService->getAllLivraison();
        } catch (\Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
            return response()->json(["error" => $er->getMessage()], 422);
        }
        return $this->returnData(LivraisonRessource::collection($data), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LivraisonRequest $request
     * @param LivraisonService $livraisonService
     * @return JsonResponse
     */
    public function store(LivraisonRequest $request, LivraisonService $livraisonService)
    {
        try {
            $livraison = [
                "livdate" => $request->livdate,
                "livdescription" => $request->livdescription,
                "command_id" => $request->command_id,
                "modeliv_id" => $request->modeliv_id,
                "boutique_id" => $request->boutique_id,
            ];
            $factureSaved = $livraisonService->save($livraison);
        } catch (LivraisonAlreadyCreatedException | \Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
            return response()->json(["error" => $er->getMessage()], 422);
        }
        return $this->returnData(new LivraisonRessource($factureSaved), '201');

    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @param LivraisonService $livraisonService
     * @return JsonResponse
     */
    public function show($id, LivraisonService $livraisonService): JsonResponse
    {
        try {
            $facture = $livraisonService->findById($id);
        } catch (LivraisonNotFoundException | \Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
            return response()->json(["error" => $er->getMessage()], 422);
        }
        return $this->returnData(new LivraisonRessource($facture), '200');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Livraison $livraison
     * @return JsonResponse
     */
    public function update(Request $request, LivraisonService $livraisonService)
    {
        try {
            $livraisonService->updateLivraison($request);
        } catch (\Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
            return response()->json(["error" => $er->getMessage()], 422);
        }
        return $this->returnSuccessMessage('Successfully update Livraison', 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param LivraisonService $livraisonService
     * @return JsonResponse
     */
    public function destroy($id, LivraisonService $livraisonService): JsonResponse
    {
        try {
            $livraisonService->deleteLivraison($id);
        } catch (LivraisonNotFoundException | \Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
            return response()->json(["error" => $er->getMessage()], 422);
        }
        return $this->returnSuccessMessage('Successfully delete Livraison ', 204);
    }

    public function getALLivraisonByBoutique($id, LivraisonService $livraisonService)
    {
        try {
            $data = $livraisonService->getALLivraisonByBoutique($id);
        } catch (BoutiqueNotFoundException | \Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        }
        return $this->returnData(LivraisonRessource::collection($data), 200);
    }
}
