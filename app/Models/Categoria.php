<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;
    protected $fillable = ['nome'];

    public function filmes(): BelongsToMany
    {
        return $this->belongsToMany(Filme::class, 'categorias_filmes');
    }
}
