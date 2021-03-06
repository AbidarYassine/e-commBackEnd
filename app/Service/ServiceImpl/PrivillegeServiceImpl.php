<?php


namespace App\Service\ServiceImpl;


use App\Models\Privilege;
use App\Service\PrivillegeService;
use Illuminate\Support\Facades\DB;

class PrivillegeServiceImpl implements PrivillegeService
{

    public function getAllPrevillege()
    {
        return Privilege::all();
    }

    public function save($privillege)
    {
        return Privilege::create($privillege);
    }

    public function findById($id)
    {
        return Privilege::findOrFail($id);
    }

    public function deletePrivillege($idPrivillege)
    {
        $privil = $this->findById($idPrivillege);
        return $privil->delete();
    }

    public function updatePrivillege($privillege)
    {
        return Privilege::whereId($privillege->id)->update($privillege->all());
    }

    public function findByLibelle($libelle)
    {
        return DB::table('privileges')->where('privLib', strtoupper($libelle))->first();
    }
}
