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
        'outlet_id'
    ];

    protected $guarded = [
        'id'
    ];

    public function products()
    {
        // dd($this);
        return $this->belongsToMany(Product::class, 'order_product')->withPivot('jumlah');
    }
}
