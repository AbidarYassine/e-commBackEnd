<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class FournisseurController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseur = fournisseur::all();

        return $this->sendResponse($fornisseur->toArray(),'fournisseur read succesuflly');
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
    public function store(Request $request)
    {
        $fournisseur = new Fournisseur();

        $fournisseur->Email= $request->input('fourmail');
        $fournisseur->telephone= $request->input('fourtel');
        $fournisseur->Fax= $request->input('fourfax');
        $fournisseur->Adresse= $request->input('fouradresse');
        $fournisseur->descriptions= $request->input('fourdescription');

        $fournisseur->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $fournisseur = Fournisseur::find($id);

        if (is_null($fournisseur)) {
          return $this-> sendEror('fournisseur not found')
        }

        return $this-> sendResponse($fournisseur->toArray(),'fournisseur creted succefully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fournisseur = fournisseur::find($id);

        return view('Fournisseur.edit', ['fournisseur'=> $fournisseur]);
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
        $fournisseur = Fournisseur::find($id);
        $fournisseur->Email= $request->input('fourmail');
        $fournisseur->telephone= $request->input('fourtel');
        $fournisseur->Fax= $request->input('fourfax');
        $fournisseur->Adresse= $request->input('fouradresse');
        $fournisseur->descriptions= $request->input('fourdescription');
        $fournisseur->save();

        return redirect('fournisseurs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fournisseur->delete();
 
        return $this-> sendResponse($fournisseur->toArray(),'fournisseur deleted succefully');
    }
}
