<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'descripcion', 'precio', 'imagen', 'stock',
    ];

    public function carrito()
    {
        return $this->hasMany(Carrito::class, 'producto_id');
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'producto_id');
    }
}
