<?php

namespace App\Modules\KanBan\Core\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
        'description',
        'badge',
        'business_id'
    ];

    protected $guarded = [
        'id'
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function order()
    {
        return $this->belongsToMany(
            Order::class, 
            'product_order',
            'product_id',
            'order_id');
    }
}
