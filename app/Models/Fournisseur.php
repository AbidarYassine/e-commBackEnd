<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'fourmail', 'fourtel','fourfax', 'fouradresse', 'fourdescription'];

    public function article()
    {
        return $this->hasMany(Article::class);
    }
}
}
