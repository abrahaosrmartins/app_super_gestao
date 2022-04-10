<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pedido extends Model
{
    use HasFactory;

    public function produtos()
    {
        //usando nomes padronizados
        // return $this->belongsToMany(Produto::class, 'pedidos_produtos');
        // juntamente com o model, passamos a tabela auxiliar

        //usando nomes não padronizados
        return $this->belongsToMany(Item::class, 'pedidos_produtos', 'pedido_id', 'produto_id');
        /*
            1 - Modelo do relacionamento NxN em relação o Modelo que estamos implementando
            2 - É a tabela auxiliar que armazena os registros de relacionamento
            3 - Representa o nome da FK da tabela mapeada pelo modelo na tabela de relacionamento
            4 - Representa o nome da FK da tabela mapeada pelo modelo utilizado no relacionamento que estamos implementando
        */
    }
}
