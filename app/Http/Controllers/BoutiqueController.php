<?php

namespace App\Http\Controllers;

use App\Http\Resources\BoutiqueRessource;
use App\Models\Boutique;
use App\Service\BoutiqueService;
use App\Service\FactureService;
use Illuminate\Http\Request;

class BoutiqueController extends Controller
{
//    protected $user;
//
//
//    public function __construct()
//    {
//        $this->middleware('auth:api');
//        $this->user = $this->guard()->user();
//
//    }//end _

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(BoutiqueService $boutiqueService)
    {
        return BoutiqueRessource::collection($boutiqueService->getAllBoutique());
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
     * @return BoutiqueRessource
     */
    public function store(Request $request, BoutiqueService $boutiqueService)
    {
        $boutique = [
            "boutLib" => $request->boutLib,
            "botAdresse" => $request->botAdresse,
            "boutTel" => $request->boutTel,
            "boutFax" => $request->boutFax,
            "boutMail" => $request->boutMail,
            "boutDescription" => $request->boutDescription,
            "command_id" => $request->idCommande,
        ];
        return new BoutiqueRessource($boutiqueService->save($boutique));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Boutique $boutique
     * @return BoutiqueRessource
     */
    public function show($boutique, BoutiqueService $boutiqueService)
    {
        return new BoutiqueRessource($boutiqueService->findById($boutique));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Boutique $boutique
     * @return \Illuminate\Http\Response
     */
    public function edit(Boutique $boutique)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Boutique $boutique
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BoutiqueService $boutiqueService)
    {
        return $boutiqueService->updateBoutique($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Boutique $boutique
     * @return \Illuminate\Http\Response
     */
    public function destroy($boutique, BoutiqueService $boutiqueService)
    {
        return $boutiqueService->deleteBoutique($boutique);
    }
}
