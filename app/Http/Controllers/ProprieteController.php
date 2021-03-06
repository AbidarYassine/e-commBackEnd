<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProprieteController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proriete = proriete::all();

        return view('Proriete.index',['prorietes'->$categorie]);
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
    public function store(Request $request)
    {
        $proriete = new Proriete();

        $proriete->lib= $request->input('proriete');
        $proriete->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proriete = Proriete::find($id);

        if (is_null($proriete)) {
          return $this-> sendEror('proriete not found')
        }

        return $this-> sendResponse($proriete->toArray(),'proriete creted succefully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proriete = Proriete::find($id);

        return view('Proriete.edit', ['proriete'=> $proriete]);
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
        $proriete = Proriete::find($id);
        $proriete->lib= $request->input('proplib');
        $proriete->valeur= $request->input('propvaleur');
        $proriete->save();

        return redirect('proriete');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proriete->delete();
 
        return $this-> sendResponse($proriete->toArray(),'proriete deleted succefully');
    }
}
