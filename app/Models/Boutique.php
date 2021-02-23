<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boutique extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'boutLib', 'botAdresse', 'boutTel', 'boutFax', 'boutMail', 'boutDescription'];


    public function livraisons()
    {
        return $this->hasMany(Livraison::class);
    }
}
