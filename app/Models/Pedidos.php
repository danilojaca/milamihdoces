<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;
    protected $fillable = [

        'cliente_id',
        'produtos',
        'data',
        'valor',
        'custo',
        'lucro',
        'desconto',
        'entrega',
        'observacao',
        'status'
    ];

    public function cliente(){

        return $this->belongsTo('App\Models\Clientes');

     }
}

