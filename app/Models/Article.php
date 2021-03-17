<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'ertdesignation', 'prix', 'qtestock', 'tauttva', 'tautremise', 'artimg', 'artdescription', 'marque_id', 'category_id', 'fournisseur_id'];

    public function marques()
    {
        return $this->belongsTo(Marque::class);
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function propriete()
    {
        return $this->belongsToMany(Propriete::class);
    }


    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }


    public function commands()
    {
        return $this->belongsToMany(Command::class);
    }

    public function proprietes()
    {
        return $this->belongsToMany(command::class);

        return $this->belongsToMany(Propriete::class);

    }

}
