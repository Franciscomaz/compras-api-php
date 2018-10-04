<?php

namespace Compras\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidoHasProdutos extends Model
{
    use SoftDeletes;

    protected $table = 'pedidos_has_produtos';
    protected $fillable = ['id', 'id_produto', 'id_pedido', 'data_pedido'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
