<?php


namespace App\Service\ServiceImpl;


use App\Models\Boutique;
use App\Models\Propriete;

class ProprieteServiceImpl implements \App\Service\ProprieteService
{
  
    public function getAllProprietes(){
        dd("1");
        return Propriete::all();
    }

    public function save($propriete){
        return Propriete::create($propriete);
    }

    public function findById($id){
        return Propriete::findOrFail($id);
    }


    public function deletePropriete($propriete){
        $propriete=$this->findById($propriete);
        return $propriete->delete();
    }
/// ????
    public function updatePropriete($propriete){
        return Propriete::whereId($propriete->id)->update($propriete->all());

    }
    
}
