<?php

namespace App\Modules\KanBan\Core\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'name',
        'total_price',
        'payment_status',
        'payment_method'
    ];

    protected $guarded = [
        'id'
    ];

    public function product()
    {
        return $this->hasMany(Product::Class, 'product_id');
    }
}
