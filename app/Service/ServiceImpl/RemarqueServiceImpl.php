<?php


namespace App\Service\ServiceImpl;


use App\Models\Remarque;

class RemarqueServiceImpl implements \App\Service\RemarqueService
{

    public function getAllRemarque()
    {
        return Remarque::all();
    }

    public function save($remarque)
    {
        return Remarque::create($remarque);
    }

    public function findById($id)
    {
        return Remarque::findOrFail($id);
    }

    public function deleteRemarque($idRemarque)
    {
        $remarque = $this->findById($idRemarque);
        return $remarque->delete();
    }

    public function updateRemarque($privillege)
    {
        return Remarque::whereId($privillege->id)->update($privillege->all());
    }

}
