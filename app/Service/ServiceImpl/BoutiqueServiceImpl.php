<?php


namespace App\Service\ServiceImpl;


use App\Exceptions\Boutique\BoutiqueNotFoundException;
use App\Models\Boutique;
use function PHPUnit\Framework\isNull;

class BoutiqueServiceImpl implements \App\Service\BoutiqueService
{

    public function getAllBoutique()
    {
        return Boutique::all();
    }

    public function save($boutique)
    {
        return Boutique::create($boutique);
    }

    public function findById($id)
    {
        $boutique = Boutique::find($id);
        if (is_null($boutique)) {
            throw new BoutiqueNotFoundException('Boutique not found by ID ' . $id, 422);
        }
        return $boutique;
    }

    public function deleteBoutique($boutiqueId)
    {
        $boutique = $this->findById($boutiqueId);
        return $boutique->delete();
    }

    public function updateBoutique($boutique)
    {
        $updated = Boutique::whereId($boutique->id)->update($boutique->all());
        if ($updated == 0) {
            throw new BoutiqueNotFoundException('Boutique not found by ID ' . $boutique->id, 404);
        }
        return $boutique->all();
    }
}
