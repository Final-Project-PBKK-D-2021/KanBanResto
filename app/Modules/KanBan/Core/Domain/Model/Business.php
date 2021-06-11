<?php

namespace App\Modules\KanBan\Core\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $table = 'businesss';

    protected $fillable = [
        'name',
        'description',
        'since',
        'owner_name',
        'owner_id'
    ];

    protected $guarded = [
        'id'
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    public function outlets()
    {
        return $this->hasMany(Outlet::class, 'business_id');
    }

    public function menus()
    {
        return $this->hasMany(Menu::class, 'business_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'business_id');
    }
}
