<?php

namespace App\Http\Controllers;

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
    public function store(Request $request, LivraisonService $livraisonService)
    {
        $livraison = [
            "livdate" => $request->livdate,
            "livdescription" => $request->livdescription,
            "command_id" => $request->command_id,
            "modeliv_id" => $request->modeliv_id,
            "boutique_id" => $request->boutique_id,
        ];
        return $livraisonService->save($livraison);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Livraison $livraison
     * @return \Illuminate\Http\Response
     */
    public function show($livraison, LivraisonService $livraisonService)
    {
        return $livraisonService->findById($livraison);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Livraison $livraison
     * @return \Illuminate\Http\Response
     */
    public function edit(Livraison $livraison)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Livraison $livraison
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LivraisonService $livraisonService)
    {
        return $livraisonService->updateLivraison($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Livraison $livraison
     * @return \Illuminate\Http\Response
     */
    public function destroy($livraison, LivraisonService $livraisonService)
    {
        return $livraisonService->deleteLivraison($livraison);
    }

    public function getALLivraisonByBoutique($boutique, LivraisonService $livraisonService)
    {
        return $livraisonService->getALLivraisonByBoutique($boutique);
    }
}
