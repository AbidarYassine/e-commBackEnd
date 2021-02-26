<?php


namespace App\Service\ServiceImpl;


use App\Models\Facture;
use App\Service\FactureService;

class FactureServiceImpl implements FactureService
{

    public function save($facture)
    {
        return Facture::create($facture);
    }

    public function findById($id)
    {
        return Facture::findOrFail($id);
    }

    public function deleteFacture($idFacture)
    {
        $facture = $this->findById($idFacture);
        return $facture->delete();
    }

    public function getAllFacture()
    {
        return Facture::all();
    }
}
