<?php


namespace App\Service\ServiceImpl;


use App\Models\Modelivraison;
use App\Service\ModeLivraisonService;

class ModeLivraisonServiceImpl implements ModeLivraisonService
{

    public function getAllMode()
    {
        return Modelivraison::all();
    }

    public function save($modeLivraison)
    {
        return Modelivraison::create($modeLivraison);
    }

    public function findById($id)
    {
        return Modelivraison::findOrFail($id);
    }

    public function deleteModeLivraison($idModeLivra)
    {
        $fmodeLivraison = $this->findById($idModeLivra);
        return $fmodeLivraison->delete();
    }

    public function updateModeLivraison($modeLivraison)
    {
        return Modelivraison::whereId($modeLivraison->id)->update($modeLivraison->all());
    }
}
