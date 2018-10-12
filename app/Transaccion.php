<?php

namespace App;

use App\Comprador;
use App\Producto;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaccion extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'cantidad',
        'comprador_id',
        'producto_id',
    ];

    public function comprador()
    {
        return $this->belongsTo(Comprador::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
