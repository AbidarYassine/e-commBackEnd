<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarqueController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marque = marque::all();

        return view('Marque.index',['$marque'->$categorie]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('Marque.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $marque = new Marque();

        $marque->lib= $request->input('marqlib');
        $marque->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marque = marque::find($id);

          if (is_null($marque)) {
            return $this-> sendEror('marque not found')
          }

          return $this-> sendResponse($marque->toArray(),'marque creted succefully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marque = marque::find($id);

        return view('Marque.edit', ['marque'=> $marque]);
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
        $marque = Marque::find($id);
        $marque->lib= $request->input('marqlib');
        $marque->save();

        return redirect('marques');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marque->delete();
 
        return $this-> sendResponse($marque->toArray(),'marque deleted succefully');
    }
}
