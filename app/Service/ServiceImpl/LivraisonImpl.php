<?php


namespace App\Service\ServiceImpl;


use App\Exceptions\Boutique\BoutiqueNotFoundException;
use App\Exceptions\Livraison\LivraisonAlreadyCreatedException;
use App\Exceptions\Livraison\LivraisonNotFoundException;
use App\Models\Boutique;
use App\Models\Livraison;
use App\Service\BoutiqueService;
use Illuminate\Support\Facades\DB;

class LivraisonImpl implements \App\Service\LivraisonService
{

    public function getAllLivraison()
    {
        return Livraison::all();
    }

    public function save($dataLivraison)
    {
        $liv = DB::table('livraisons')->where('command_id', '=', $dataLivraison["command_id"])->first();
        if ($liv == null) {
            return Livraison::create($dataLivraison);
        } else {
            throw new LivraisonAlreadyCreatedException("Livraison with command numero " . $dataLivraison["command_id"] . " Already Created");
        }

    }

    public function findById($id)
    {
        $liv = Livraison::find($id);
        if (is_null($liv)) {
            throw new LivraisonNotFoundException("Livraison not found by id " . $id);
        }
        return $liv;
    }

    public function deleteLivraison($idLiv)
    {
        $livraison = $this->findById($idLiv);
        return $livraison->delete();
    }

    public function updateLivraison($livraison)
    {
        return Livraison::whereId($livraison->id)->update($livraison->all());
    }

    public function getALLivraisonByBoutique($id)
    {
        $boutique = Boutique::find($id);
        if (is_null($boutique)) {
            throw new BoutiqueNotFoundException("Boutique not found by id " . $id);
        }
        return $boutique->livraisons;
    }
}
