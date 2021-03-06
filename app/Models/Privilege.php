<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    protected $table = "privileges";
    use HasFactory;

    protected $fillable = ['id', 'privLib', 'description'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
