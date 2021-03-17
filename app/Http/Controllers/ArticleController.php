<?php

namespace App\Http\Controllers;

use App\Exceptions\Facture\FactureAlreadyExistException;
use App\Exceptions\Facture\FactureNotFoundException;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\FactureResource;
use App\Service\ArticleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ArticleService $ArticleService): JsonResponse
    {

       return returnData(ArticleResource::collection($ArticleService->getAllArticles()), '200');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('Article.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,ArticleService $ArticleService): JsonResponse
    {
        $article = [
            "libelle" => $request->lib,
        ];

    try{
    $articleSaved = $ArticleService->save($article);
    }
    catch (ArticleNotFoundException  | \Exception $ex) {
        return response()->json(["error" => $ex->getMessage()], 422);
    } catch (\Error $er) {
        return response()->json(["error" => $er->getMessage()], 422);
    }


        return $this->returnData(new ArticleResource($articleSaved), '201');


    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,ArticleService $ArticleService): JsonResponse
    {


        try {
            $article = $ArticleService->findById($id);
        } catch (FactureNotFoundException $ex) {
            return response()->json(["error" => $ex->getMessage()], 422);
        }
        return $this->returnData(new ArticleResource($article), '200');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,ArticleService $ArticleService): JsonResponse
    {
        return $ArticleService->updateArticle($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,ArticleService $ArticleService): JsonResponse
    {

        try {
            $ArticleService->deleteArticle($id);
        } catch (ArticleNotFoundException $ex) {
            return response()->json(["error" => $ex->getMessage()], 404);
        }
        return $this->returnSuccessMessage('Successfully delete article', 204);
    }


}
