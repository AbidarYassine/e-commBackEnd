<?php


namespace App\Service;


use App\Models\Fournisseur;

interface FournisseurService
{
    public function getAllFournisseurs();

    public function save($fournisseur);

    public function findById($id);


    //public function findByIdFournisseur($id);

    public function deleteFournisseur($idFournisseur);

    public function updateFournisseur($fournisseur);
}
