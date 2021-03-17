<?php

namespace App\Http\Controllers;

use App\Exceptions\Categorie\CategorieNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Categorie;
use App\Http\Resources\CategorieResource;
use App\Models\Categorie as ModelsCategorie;
use App\Service\CategorieService;
use App\Traits\GeneralTrait;
use Validator;

class CategorieController extends Controller
{
    use GeneralTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(CategorieService $categorieService): JsonResponse
    {

        return returnData(CategorieResource::collection($categorieService->getAllCategories()), '200');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('Categorie.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, CategorieService $categorieService) : JsonResponse
    {
        $categorie = [
            "catlib" => $request->lib
        ];
        try {
            $catSaved = $categorieService->save($categorie);
        } catch (\Exception $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        } catch (\Error $er) {
            return response()->json(["error" => $er->getMessage()], 422);
        }
        return $this->returnData(new CategorieResource($catSaved), '201');
        //return new CategorieResource($catSaved);

        //$categorie->Date= $request->input('');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id, CategorieService $categorieService)
    {
        try {
            $result = $categorieService->findById($id);



        } catch (CategorieNotFoundException $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        }
        return $this->returnData(new CategorieResource($result), '200');
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     * /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, CategorieService $categorieService)
    {

        try {
            $categorieService->updateCategorie($request);
        }
        catch (CategorieNotFoundException  | \Exception $ex) {
                return response()->json(["error" => $ex->getMessage()], 422);
            } catch (\Error $er) {
                return response()->json(["error" => $er->getMessage()], 422);
            }

        return $this->returnSuccessMessage('Successfully update Categorie', 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, CategorieService $categorieService)
    {
       return  $categorieService->deleteCategorie($id);
    }
}
