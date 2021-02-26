
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marque extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'marqlib'];

    public function article()
    {
        return $this->hasMany(Article::class);
    }
}
