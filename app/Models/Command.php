<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'cmdDate',
        'toatlcmd',
        'cmdDescription'
    ];

    public function livraison()
    {
        return $this->hasOne(Livraison::class);
    }
    public function facture()
    {
        return $this->hasOne(Facture::class);
    }
    public function etatCommand()
    {
        return $this->belongsTo(EtatCommand::class);
    }
}
