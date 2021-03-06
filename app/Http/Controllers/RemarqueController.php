<?php

namespace App\Http\Controllers;

use App\Http\Resources\RemarqueRessource;
use App\Models\Remarque;
use App\Service\RemarqueService;
use Illuminate\Http\Request;

class RemarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(RemarqueService $remarqueService)
    {
        return RemarqueRessource::collection($remarqueService->getAllRemarque());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return RemarqueRessource
     */
    public function store(Request $request, RemarqueService $remarqueService)
    {
        $remarque = [
            "title" => $request->title,
            "description" => $request->description,
            "user_id" => $request->user_id,
        ];
        return new RemarqueRessource($remarqueService->save($remarque));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Remarque $remarque
     * @return RemarqueRessource
     */
    public function show($remarque, RemarqueService $remarqueService)
    {
        return new RemarqueRessource($remarqueService->findById($remarque));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Remarque $remarque
     * @return \Illuminate\Http\Response
     */
    public function edit(Remarque $remarque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Remarque $remarque
     * @return RemarqueRessource
     */
    public function update(Request $request, RemarqueService $remarqueService)
    {
        return $remarqueService->updateRemarque($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $remarque
     * @return \Illuminate\Http\Response
     */
    public function destroy($remarque, RemarqueService $remarqueService)
    {
        return $remarqueService->deleteRemarque($remarque);
    }
}
