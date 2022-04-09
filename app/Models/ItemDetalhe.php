<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemDetalhe extends Model
{
    use HasFactory;

    protected $table = 'produto_detalhes';
    protected $fillable = [
        'produto_id',
        'comprimento',
        'largura',
        'altura',
        'unidade_id'
    ];

    /**
     * @return BelongsTo
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'produto_id', 'id');
        // se não especificamos o nome da fk, ele procura por item_id
    }
}
