<?php


namespace App\Service\ServiceImpl;


use App\Exception\CommandNotFountException;
use App\Exception\FactureNotFoundException;
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
        $facture = Facture::find($id);
        if (is_null($facture)) {
            throw new FactureNotFoundException('Facture not found by ID ' . $id, 404);
        }
        return $facture;

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
        if (is_null($commande)) {
            throw new CommandNotFountException('Commande not found by ID ' . $id, 404);
        }
        $facture = $commande->facture;
        return $facture;
    }

    public function updateFactures($facture)
    {
        $updated = Facture::whereId($facture->id)->update($facture->all());
        if ($updated === 0) {
            throw new FactureNotFoundException('Facture not found by ID ' . $facture->id, 404);
        }
        return $facture->all();

    }
}
