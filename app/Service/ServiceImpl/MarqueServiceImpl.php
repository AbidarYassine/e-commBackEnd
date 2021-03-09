<?php


namespace App\Service\ServiceImpl;


use App\Models\Marque;

class MarqueServiceImpl implements \App\Service\MarqueService
{

    public function getAllMarques()
    {
        return Marque::all();
    }

    public function save($marque)
    {
        return Marque::create($marque);
    }

    public function findById($id)
    {
        return Marque::findOrFail($id);
    }

    public function deleteMarque($marqueId)
    {
        $marque = $this->findById($marqueId);
        return $marque->delete();
    }

    public function updateMarque($marque)
    {
        return Marque::whereId($marque->id)->update($marque->all());
    }
}
