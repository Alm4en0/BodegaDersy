<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleDeuda extends Model
{
    use HasFactory;
    protected $fillable = [
        'venta_id'
    ];
}
