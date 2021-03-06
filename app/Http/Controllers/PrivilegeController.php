<?php

namespace App\Http\Controllers;

use App\Http\Resources\PrivilegeRessource;
use App\Models\Privilege;
use App\Service\PrivillegeService;
use Illuminate\Http\Request;

class PrivilegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(PrivillegeService $privilService)
    {
        return PrivilegeRessource::collection($privilService->getAllPrevillege());
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
     * @return PrivilegeRessource
     */
    public function store(Request $request, PrivillegeService $privilService)
    {
        $privillege = [
            "privLib" => strtoupper($request->privLib),
            "description" => $request->description,
        ];
        return new PrivilegeRessource($privilService->save($privillege));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Privilege $privilege
     * @return PrivilegeRessource
     */
    public function show($privilege, PrivillegeService $privilService)
    {
        return new PrivilegeRessource($privilService->findById($privilege));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Privilege $privilege
     * @return \Illuminate\Http\Response
     */
    public function edit(Privilege $privilege)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Privilege $privilege
     * @return PrivilegeRessource
     */
    public function update(Request $request, PrivillegeService $privilService)
    {
        return $privilService->updatePrivillege($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Privilege $privilege
     * @return PrivilegeRessource
     */
    public function destroy($privilege, PrivillegeService $privilService)
    {
        return $privilService->deletePrivillege($privilege);
    }

    public function findByLibelle($lib, PrivillegeService $privilService)
    {
        return $privilService->findByLibelle($lib);
    }
}
