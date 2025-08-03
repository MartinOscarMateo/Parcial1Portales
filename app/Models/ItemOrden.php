<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemOrden extends Model
{
    use HasFactory;

    protected $table = 'items_orden';
    protected $fillable = [
        'orden_id',
        'product_id',
        'quantity',
        'price',
        'size',
    ];
    public function orden()
    {
        return $this->belongsTo(Orden::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
