<?php


namespace App\Service;


interface PrivillegeService
{


    public function getAllPrevillege();

    public function save($privillege);

    public function findById($id);


    public function deletePrivillege($idPrivillege);

    public function updatePrivillege($privillege);

    public function findByLibelle($libelle);
}
