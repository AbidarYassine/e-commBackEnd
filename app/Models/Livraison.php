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
        'livdescription'
    ];

    public function command()
    {
        return $this->belongsTo(Command::class);
    }
}
