<?php


namespace App\Service;


interface LivraisonService
{

    public function getAllLivraison();

    public function save($dateLivraison);

    public function findById($id);

    public function deleteLivraison($idLiv);

    public function updateLivraison($livraison);

    public function getALLivraisonByBoutique($boutique);
}
