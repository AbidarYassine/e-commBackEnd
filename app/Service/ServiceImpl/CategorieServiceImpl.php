<?php


namespace App\Service\ServiceImpl;


use App\Exceptions\Categorie\CategorieNotFoundException;
use App\Models\Boutique;
use App\Models\Categorie;

class CategorieServiceImpl implements \App\Service\CategorieService
{

    public function getAllCategories()
    {
        return Categorie::all();
    }

    public function save($categorie)
    {
        return Categorie::create($categorie);
    }

    public function findById($id)
    {
        $categorie = Categorie::find($id);
        if (is_null($categorie)) {
            throw new CategorieNotFoundException("Categorie not found By id " . $id);
        }
        return $categorie;
    }


    public function deleteCategorie($categorie)
    {
        $categorie = $this->findById($categorie);
        return $categorie->delete();
    }

/// done hhh by
    public function updateCategorie($categorie)
    {
        return Categorie::whereId($categorie->id)->update($categorie->all());

    }

}
