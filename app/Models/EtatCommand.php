<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtatCommand extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'etatComLib'
    ];
    public function commands()
    {
        return $this->hasMany(Command::class);
    }
}
