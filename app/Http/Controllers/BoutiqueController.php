<?php

namespace App\Http\Controllers;

use App\Exceptions\Boutique\BoutiqueNotFoundException;
use App\Http\Requests\BoutiqueRequest;
use App\Http\Resources\BoutiqueRessource;
use App\Models\Boutique;
use App\Service\BoutiqueService;
use App\Traits\GeneralTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BoutiqueController extends Controller
{
    use GeneralTrait;

    /**
     * Display a listing of the resource.
     *
     * @param BoutiqueService $boutiqueService
     * @return JsonResponse
     */
    public function index(BoutiqueService $boutiqueService): JsonResponse
    {
        try {
            $data = $boutiqueService->getAllBoutique();
        } catch (\Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
            return response()->json(["error" => $er->getMessage()], 422);
        }
        return $this->returnData(BoutiqueRessource::collection($data), 200);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BoutiqueRequest $request
     * @param BoutiqueService $boutiqueService
     * @return JsonResponse
     */
    public function store(BoutiqueRequest $request, BoutiqueService $boutiqueService): JsonResponse
    {
        $boutique = [
            "boutLib" => $request->boutLib,
            "botAdresse" => $request->botAdresse,
            "boutTel" => $request->boutTel,
            "boutFax" => $request->boutFax,
            "boutMail" => $request->boutMail,
            "boutDescription" => $request->boutDescription,
            "command_id" => $request->idCommande,
        ];
        try {
            $boutiqueSaved = $boutiqueService->save($boutique);
        } catch (\Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
            return response()->json(["error" => $er->getMessage()], 422);
        }
        return $this->returnData(new BoutiqueRessource($boutiqueSaved), '201');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @param BoutiqueService $boutiqueService
     * @return JsonResponse
     */
    public function show($id, BoutiqueService $boutiqueService): JsonResponse
    {
        try {
            $boutique = $boutiqueService->findById($id);
        } catch (BoutiqueNotFoundException | \Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
            return response()->json(["error" => $er->getMessage()], 422);
        }
        return $this->returnData(new BoutiqueRessource($boutique), '200');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Boutique $boutique
     * @return Response
     */
    public function edit(Boutique $boutique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BoutiqueRequest $request
     * @param BoutiqueService $boutiqueService
     * @return JsonResponse
     */
    public function update(BoutiqueRequest $request, BoutiqueService $boutiqueService): JsonResponse
    {
        try {
            $boutiqueService->updateBoutique($request);
        } catch (BoutiqueNotFoundException | \Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
            return response()->json(["error" => $er->getMessage()], 422);
        }
        return $this->returnSuccessMessage('Successfully update Boutique', 202);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @param BoutiqueService $boutiqueService
     * @return JsonResponse
     */
    public function destroy($id, BoutiqueService $boutiqueService): JsonResponse
    {
        try {
            $boutiqueService->deleteBoutique($id);
        } catch (\Exception | BoutiqueNotFoundException $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
            return response()->json(["error" => $er->getMessage()], 422);
        }
        return $this->returnSuccessMessage('Successfully delete Boutique And Command Associate', 204);
    }
}
