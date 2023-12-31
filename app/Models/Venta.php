<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = [
        'montoTotal',
        'metodoPago'
    ];

    public function detalleventas(){
        return $this->hasMany(DetalleVenta::class);
    }
}
