<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'fourmail', 'fourtel', 'fourfax', 'fouradresse', 'fourdescription'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
<<<<<<< HEAD

=======
>>>>>>> cd6acc1fe8a9ce0b849840b0bc3e17fe6b4ed54f
