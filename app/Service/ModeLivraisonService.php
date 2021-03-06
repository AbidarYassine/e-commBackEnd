<?php


namespace App\Service;


interface ModeLivraisonService
{
    public function getAllMode();

    public function save($modeLivraison);

    public function findById($id);


    public function deleteModeLivraison($idModeLivra);

    public function updateModeLivraison($modeLivraison);
}
