<?php


namespace App\Service;


interface ProprieteService
{
    public function getAllProprietes();

    public function save($propriete);

    public function findById($id);


    public function deletePropriete($propriete);

    public function updatePropriete($propriete);
}
