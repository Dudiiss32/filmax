<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Filme extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['nome', 'sinopse', 'ano', 'imagem', 'link'];

    public function categorias(): BelongsToMany
    {
        return $this->belongsToMany(Categoria::class, 'categoria_filmes');
    }

    public function favoritadoPor(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favoritos');
    }
}
