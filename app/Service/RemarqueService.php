<?php


namespace App\Service;


interface RemarqueService
{

    public function getAllRemarque();

    public function save($remarque);

    public function findById($id);


    public function deleteRemarque($idRemarque);

    public function updateRemarque($remarque);


}
