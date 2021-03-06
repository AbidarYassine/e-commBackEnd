<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propriete extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'proplib', 'propvaleur'];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}

