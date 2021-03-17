<?php

namespace App\Http\Controllers;
use App\Http\Resources\ProprieteResource;
use App\Models\Propriete;
use App\Service\ProprieteService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProprieteController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProprieteService $proprieteService): JsonResponse
    {
        //dd($proprieteService->getAllProprietes());
        return $this->returnData(ProprieteResource::collection($proprieteService->getAllProprietes()), '200');

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
    public function store(Request $request , ProprieteService $proprieteService): JsonRespons
    {
        try {
            $proriete = [
                "lib" => $request->lib,
                "propvaleur" => $request->propvaleur,

            ];
            $proprieteSaved= $proprieteService->save($proriete);
        }

        catch (ProprieteAlreadyExistException | \Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
            return response()->json(["error" => $er->getMessage()], 422);
        }
        return $this->returnData(new ProprieteResource($proprieteSaved), '201');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, ProprieteService $proprieteService)
    {
        try {
            $propriete = $proprieteService->findById($id);

        }
        catch (ProprieteNotFoundException $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        }
        return $this->returnData(new ProprieteResource(propriete), '200');

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
        try {
            $proprieteService->updatePropriete($request);
        }
        catch (ProprieteNotFoundException | \Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
            return response()->json(["error" => $er->getMessage()], 422);
        }
        return $this->returnSuccessMessage('Successfully update Propriete', 202);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($propriete , ProprieteService $proprieteService)
    {
        try {
            $proprieteService->deletePropriete($propriete);
        }
        catch (ProprieteNotFoundException $ex) {
            return response()->json(["error" => $ex->getMessage()], 404);
        }
        return $this->returnSuccessMessage('Successfully delete Propriete', 204);
    }


}
