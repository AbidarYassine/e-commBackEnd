<?php


namespace App\Service;


interface BoutiqueService
{
    public function getAllBoutique();

    public function save($boutique);

    public function findById($id);


    public function deleteBoutique($boutique);

    public function updateBoutique($boutique);
}
