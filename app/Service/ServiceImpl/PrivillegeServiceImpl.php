<?php


namespace App\Service\ServiceImpl;


use App\Exceptions\Privilege\PrivilegeAlreadyExistException;
use App\Exceptions\Privilege\PrivilegeNotFoundException;
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
//        dd($privillege["privLib"]);
        if ($this->findByLibelle($privillege["privLib"], false) == null) {
            return Privilege::create($privillege);
        } else {
            throw new PrivilegeAlreadyExistException("Privilege " . strtoupper($privillege["privLib"]) . " Already exist !!");
        }

    }

    public function findById($id)
    {
        $privilege = Privilege::find($id);
        if (is_null($privilege)) {
            throw new PrivilegeNotFoundException('Privilege not found by ID ' . $id, 422);
        }
        return $privilege;
    }

    public function deletePrivillege($idPrivillege)
    {
        $privil = $this->findById($idPrivillege);
        return $privil->delete();
    }

    public function updatePrivillege($privillege)
    {
        $privilege = Privilege::whereId($privillege->id)->update($privillege->all());
        if ($privilege === 0) {
            throw new PrivilegeNotFoundException("Privilege not found by " . $privillege->id);
        }
        return $privilege;
    }

    public function findByLibelle($libelle, bool $throwExcption)
    {
        $result = DB::table('privileges')->where('privLib', strtoupper($libelle))->first();
        if ($result == null) {
            if ($throwExcption) {
                throw new PrivilegeNotFoundException('Privilege not found by libelle ' . strtoupper($libelle), 404);
            }
        }
        return $result;
    }
}
