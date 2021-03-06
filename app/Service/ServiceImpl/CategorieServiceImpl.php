<?php


namespace App\Service\ServiceImpl;


use App\Models\Boutique;
use App\Models\Categorie;

class CategorieServiceImpl implements \App\Service\CategorieService
{
  
    public function getAllCategories(){
        return Categorie::all();
    }

    public function save($categorie){
        return Categorie::create($categorie);
    }

    public function findById($id){
        return Categorie::findOrFail($id);
    }


    public function deleteCategorie($categorie){
        $categorie=$this->findById($categorie);
        return $categorie->delete();
    }

    public function updateCategorie($categorie){
        return Categorie::whereId($categorie->id)->update($categorie->all());

    }
    
}
