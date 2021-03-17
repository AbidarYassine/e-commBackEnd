<?php

namespace App\Http\Controllers;

use App\Marque;
use App\Http\Resources\MarqueResource;
//use App\Models\Marque as ModelsMarque;
use App\Service\MarqueService;

use Illuminate\Http\JsonResponse;
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
        return MarqueResource::collection($marqueService->getAllMarques());

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
        try {
            $marque = [
                "libelle"=>$request->marqlib,
            ];
            return new MarqueResource($marqueService->save($marque));

        }



        catch (MarqueAlreadyExistException | \Exception $ex) {
        return response()->json(["error" => $ex->getMessage()], 422);
    } catch (\Error $er) {
        return response()->json(["error" => $er->getMessage()], 422);
    }
        return $this->returnData(new MarqueResource($marqueSaved), '201');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id , MarqueService $marqueService): JsonResponse
    {
        try {
            $marque= $marqueService->findById($id);
        }
catch (FactureNotFoundException $ex) {
        return response()->json(["error" => $ex->getMessage()], 422);
    }
        return $this->returnData(new MarqueResource($marque), '200');

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
        try {
            $marqueService->updateMarque($request);
        }
        catch (MarqueNotFoundException | \Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
            return response()->json(["error" => $er->getMessage()], 422);
        }
        return $this->returnSuccessMessage('Successfully update Marque', 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,  MarqueService $marqueService)
    {
        try {
            $marqueService->deleteMarque($id);

        }

    catch (MarqueNotFoundException $ex) {
        return response()->json(["error" => $ex->getMessage()], 404);
    }
        return $this->returnSuccessMessage('Successfully delete Marque ', 204);
    }

    public function findByMarque($idMarque,  MarqueService $marqueService)
    {
        return new MarqueResource($marqueService->findByIdMarque($idMarque));
    }
}


