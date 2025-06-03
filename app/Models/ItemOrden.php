<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ItemOrden extends Model
{
    use HasFactory;

    protected $table = 'items_orden';

    protected $fillable = [
        'orden_id',
        'product_id',
        'size',
        'quantity',
        'price',
    ];

    public function orden()
    {
        return $this->belongsTo(Orden::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
