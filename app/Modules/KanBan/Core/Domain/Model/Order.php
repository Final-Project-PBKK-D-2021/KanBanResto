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
        'id_product',
        'qty'
    ];

    protected $casts = [
        'id_product' => 'array',
        'qty' => 'array'
    ];

    protected $guarded = [
        'id'
    ];

}
