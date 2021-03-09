<?php


namespace App\Service;


interface MarqueService
{
    public function getAllMarques();

    public function save($marque);

    public function findById($id);


    public function deleteMarque($marque);

    public function updateMarque($marque);
}
