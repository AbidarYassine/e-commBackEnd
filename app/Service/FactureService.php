<?php


namespace App\Service;


use App\Models\Facture;

interface FactureService
{
    public function getAllFacture();

    public function save($facture);

    public function findById($id);


    public function findByIdCommande($id);

    public function deleteFacture($idFacture);

    public function updateFactures($facture);
}
