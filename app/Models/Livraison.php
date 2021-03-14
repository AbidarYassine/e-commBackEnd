<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    protected $table = "livraisons";
    use HasFactory;

    protected $fillable = [
        'id',
        'livdate',
        'livdescription',
        'command_id',
        'modeliv_id',
        'boutique_id',
    ];

    public function command()
    {
        return $this->belongsTo(Command::class);
    }

    public function modeLivraison()
    {
        return $this->belongsTo(Modelivraison::class, 'modeliv_id', 'id');
    }

    public function boutique()
    {
        return $this->belongsTo(Boutique::class);
    }
}
