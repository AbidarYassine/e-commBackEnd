<?php


namespace App\Service;


interface CommandService
{
    public function getAllCommands();

    public function save($command);

    public function findById($id);


    public function deleteCommand($command);

    public function updateCommand($command);
}
