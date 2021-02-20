<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'datefact',
        'baseht',
        'tva',
        'remise',
        'totalht',
        'totalttc'
    ];


    public function command()
    {
        return $this->belongsTo(Command::class);
    }
}
