<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Categorie;
use App\Models\Categorie as ModelsCategorie;
use App\Service\CategorieService;
use Validator;

class CategorieController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategorieService $categorieService)
    {
       return $categorieService->getAllCategories();

        //return view('categorie.index', ['categories'->$categorie]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,CategorieService $categorieService)
    {
        $categorie = [
            "lib"=>$request->lib,
        ];
        $categorieService->save($categorie);
    
        //$categorie->Date= $request->input('');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,CategorieService $categorieService)
    {
        $categorie = $categorieService->findById($id);

        if (is_null($categorie)) {
            return $this->sendEror('categorie not found');
        }

        return $this->sendResponse($categorie->toArray(), 'categorie creted succefully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = ModelsCategorie::find($id);

        return view('Categorie.edit', ['categorie' => $categorie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,CategorieService $categorieService)
    {
        return $categorieService->updateCategorie($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,CategorieService $categorieService)
    {
        $categorieService->deleteCategorie($id);
    }
}
