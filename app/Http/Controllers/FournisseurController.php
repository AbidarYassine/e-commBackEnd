<?php

namespace App\Http\Controllers;
use App\Http\Controllers\FournisseurService;
use App\Http\Resources\FournisseurResource;
use App\Models\Fournisseur;
use App\Service\ServiceImpl\FournisseurServiceImpl;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class FournisseurController extends BaseController
{
    /**
     * Display a listing of the resource.s
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FournisseurServiceImpl $fournisseurService) : JsonResponse
    {
        return $this->returnData(FournisseurResource::collection($fournisseurService->getAllFournisseurs()), '200');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('Fournisseur.create');

    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , FournisseurService $fournisseurService)
    {
        try {
            $fournisseur = [

                "fourmail"=>$request->fourmail,
                "fourtel"=>$request->fourtel,
                "fourfax"=>$request->fourfax,
                "fouradresse"=>$request->fouradresse,
                "fourdescription"=>$request->fourdescription,
            ];

            $fournisseurSaved = $fournisseurService->save($fournisseur);

        }
        catch (FournisseurAlreadyExistException | \Exception $ex) {
     return response()->json(["error" => $ex->getMessage()], 422);
   } catch (\Error $er) {
    return response()->json(["error" => $er->getMessage()], 422);
}
        return $this->returnData(new FactureResource($fournisseurSaved), '201');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id , FournisseurService $fournisseurService)
    {
        try {
            $fournisseur = $fournisseurService->findById($id);

        }
        catch (FournisseurNotFoundException $ex) {
        return response()->json(["error" => $ex->getMessage()], 422);
    }
        return $this->returnData(new FournisseurResource($fournisseur), '200');

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
    public function update(Request $request , FournisseurService $fournisseurService)
    {
        try {
             $fournisseurService->updateFournisseurs($request);

        }

    catch (FournisseurNotFoundException | \Exception $ex) {
        return response()->json(["error" => $ex->getMessage()], 422);
    } catch (\Error $er) {
        return response()->json(["error" => $er->getMessage()], 422);
    }
        return $this->returnSuccessMessage('Successfully update Fournisseur', 202);
    }

    /**
     * Remove the specified resource frosm storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,  FournisseurService $fournisseurService)
    {
        try {
            $fournisseurService->deleteFournisseur($id);

        }

    catch (FournisseurNotFoundException $ex) {
        return response()->json(["error" => $ex->getMessage()], 404);
    }
        return $this->returnSuccessMessage('Successfully delete Fournisseur ', 204);
    }

    public function findByFournisseur($idFournisseur,  FournisseurService $fournisseurService)
    {
        return new FournisseurResource($fournisseurService->findByIdFournisseur($idFournisseur));
    }
}

