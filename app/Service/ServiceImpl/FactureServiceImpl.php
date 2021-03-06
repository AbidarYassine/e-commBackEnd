<?php


namespace App\Service\ServiceImpl;


use App\Models\Command;
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
        $facture->command->delete();
        return $facture->delete();
    }

    public function getAllFacture()
    {
        return Facture::all();
    }

    public function findByIdCommande($id)
    {
        $commande = Command::find($id);
        $facture = $commande->facture;
        return $facture;
    }

    public function updateFactures($facture)
    {
        return Facture::whereId($facture->id)->update($facture->all());

    }
}
