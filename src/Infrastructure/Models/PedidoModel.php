<?php

namespace Compras\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidoModel extends Model
{
    use SoftDeletes;

    protected $table = 'lista_de_compras';
    protected $fillable = ['id', 'data_compra'];
    protected $hidden = ['created_at', 'update_at', 'deleted_at'];
}
