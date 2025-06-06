<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'ordenes';

    protected $fillable = [
        'user_id',
        'total',
        'estado',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(ItemOrden::class);
    }

    public function pago()
    {
        return $this->hasOne(Pago::class);
    }

    public function itemOrdenes()
    {
        return $this->hasMany(ItemOrden::class, 'orden_id');
    }
}
