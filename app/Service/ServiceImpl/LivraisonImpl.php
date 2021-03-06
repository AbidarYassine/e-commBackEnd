<?php


namespace App\Service\ServiceImpl;


use App\Models\Boutique;
use App\Models\Livraison;

class LivraisonImpl implements \App\Service\LivraisonService
{

    public function getAllLivraison()
    {
        return Livraison::all();
    }

    public function save($dateLivraison)
    {
        return Livraison::create($dateLivraison);
    }

    public function findById($id)
    {
        return Livraison::findOrFail($id);
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

    public function getALLivraisonByBoutique($boutique)
    {
        $boutique = Boutique::findOrFail($boutique);
        return $boutique->livraisons;
    }
}
