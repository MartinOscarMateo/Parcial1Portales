<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'orden_id',
        'metodo',
        'estado',
        'referencia',
    ];

    public function orden()
    {
        return $this->belongsTo(Orden::class);
    }
}
