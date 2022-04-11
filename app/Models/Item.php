<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    use HasFactory;

    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'descricao',
        'peso',
        'unidade_id',
        'fornecedor_id'
    ];

    /**
     * @return HasOne
     */
    public function itemDetalhe(): HasOne
    {
        return $this->hasOne(ItemDetalhe::class, 'produto_id', 'id');
        // se não especificamos o nome da fk, ele procura por item_id
    }

    /**
     * @return BelongsTo
     */
    public function fornecedor(): BelongsTo
    {
        return $this->belongsTo(Fornecedor::class);
    }

    /**
     * @return BelongsToMany
     */
    public function pedidos(): BelongsToMany
    {
        //usando nomes padronizados
//        return $this->belongsToMany(Pedido::class, 'pedidos_produtos');
        // juntamente com o model, passamos a tabela auxiliar

        //usando nomes não padronizados
        return $this->belongsToMany(Pedido::class, 'pedidos_produtos', 'produto_id', 'pedido_id');
        /*
            1 - Modelo do relacionamento NxN em relação o Modelo que estamos implementando
            2 - É a tabela auxiliar que armazena os registros de relacionamento
            3 - Representa o nome da FK da tabela mapeada pelo modelo na tabela de relacionamento
            4 - Representa o nome da FK da tabela mapeada pelo modelo utilizado no relacionamento que estamos implementando
        */
    }
}
