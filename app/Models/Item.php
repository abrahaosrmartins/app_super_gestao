<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'descricao',
        'peso',
        'unidade_id'
    ];

    /**
     * @return HasOne
     */
    public function itemDetalhe(): HasOne
    {
        return $this->hasOne(ItemDetalhe::class, 'produto_id', 'id');
    }
}