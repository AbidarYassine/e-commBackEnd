<?php


namespace App\Service\ServiceImpl;


use App\Models\Boutique;

class BoutiqueServiceImpl implements \App\Service\BoutiqueService
{

    public function getAllBoutique()
    {
        return Boutique::all();
    }

    public function save($boutique)
    {
        return Boutique::create($boutique);
    }

    public function findById($id)
    {
        return Boutique::findOrFail($id);
    }

    public function deleteBoutique($boutiqueId)
    {
        $boutique = $this->findById($boutiqueId);
        return $boutique->delete();
    }

    public function updateBoutique($boutique)
    {
        return Boutique::whereId($boutique->id)->update($boutique->all());
    }
}
