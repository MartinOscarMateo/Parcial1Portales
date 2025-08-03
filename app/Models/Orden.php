<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'ordenes';

    protected $fillable = [
        'user_id',
        'status',
        'total', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function itemsOrden()
    {
        return $this->hasMany(ItemOrden::class, 'orden_id');
    }
}
