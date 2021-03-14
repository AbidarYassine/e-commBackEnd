<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelivraison extends Model
{
    protected $table = "modelivraisons";
    use HasFactory;

    protected $fillable = ['id', 'modlivLib', 'modelibDesc'];

    public function livraisons()
    {
        return $this->hasMany(Livraison::class);
    }
}
