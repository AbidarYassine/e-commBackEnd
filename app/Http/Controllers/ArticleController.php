<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = article::all(); // models khshom ibdaw b Majuscule

        return view('Article.index',['articles'->article]);
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
    public function store(Request $request)
    {
        $article = new Article();

        $article->designation= $request->input('ertdesignation');
        $article->prix= $request->input('prix');
        $article->quantite= $request->input('qtestock');
        $article->TVA= $request->input('tauttva');
        $article->Remise= $request->input('tautremise');
        $article->artimg= $request->input('artimg');
        $article->description= $request->input('artdescription');
        $article->marque= $request->input('marque_id');
        $article->categorie= $request->input('category_id');

        $article->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        if (is_null($article)) {
          return $this-> sendEror('article not found')
        }

        return $this-> sendResponse($categorie->toArray(),'article creted succefully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        return view('Article.edit', ['article'=> $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->lib= $request->input('catlib');
        $article->save();

        return redirect('articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article->delete();
 
        return $this-> sendResponse($article->toArray(),'article deleted succefully');
    }
}
