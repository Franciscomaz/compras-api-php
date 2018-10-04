<?php

namespace Compras\Infrastructure\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdutoModel extends Model
{
    use SoftDeletes;

    protected $table = 'produtos';
    protected $fillable = ['id', 'nome', 'descricao', 'valor', 'categoria'];
    protected $hidden = ['created_at', 'update_at', 'deleted_at'];
}
