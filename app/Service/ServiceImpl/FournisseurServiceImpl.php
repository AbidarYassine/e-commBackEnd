<?php


namespace App\Service\ServiceImpl;


use App\Models\Fournisseur;

class FournisseurServiceImpl implements \App\Service\FournisseurService
{

    public function getAllFournisseurs()
    {
        return Fournisseur::all();
    }

    public function save($fournisseur)
    {
        return Fournisseur::create($fournisseur);
    }

    public function findById($id)
    {
        return Fournisseur::findOrFail($id);
    }

    public function deleteFournisseur($fournisseurId)
    {
        $fournisseur = $this->findById($fournisseurId);
        return $fournisseur->delete();
    }

    public function updateFournisseur($fournisseur)
    {
        return Fournisseur::whereId($fournisseur->id)->update($fournisseur->all());
    }
}
