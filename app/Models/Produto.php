<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'peso',
        'unidade_id'
    ];

    /**
     * @return HasOne
     */
    public function produtoDetalhe(): HasOne
    {
        return $this->hasOne(ProdutoDetalhe::class);
    }

    public function pedidos()
    {
        //usando nomes padronizados
         return $this->belongsToMany(Pedido::class, 'pedidos_produtos');
        // juntamente com o model, passamos a tabela auxiliar
    }
}
