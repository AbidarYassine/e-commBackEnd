<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
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

    public function modelivraison()
    {
        return $this->belongsTo(Modelivraison::class);
    }

    public function boutique()
    {
        return $this->belongsTo(Boutique::class);
    }
}
