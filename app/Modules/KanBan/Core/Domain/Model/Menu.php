<?php

namespace App\Modules\KanBan\Core\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'business_id',
        'list_products'
    ];

    protected $guarded = [
        'id'
    ];

    protected $casts = [
        'list_products' => 'array'
    ];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
