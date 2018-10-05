<?php

namespace Compras\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidoModel extends Model
{
    use SoftDeletes;

    protected $table = 'pedidos';
    protected $fillable = ['data_pedido'];
    protected $hidden = ['created_at', 'update_at', 'deleted_at'];
}
