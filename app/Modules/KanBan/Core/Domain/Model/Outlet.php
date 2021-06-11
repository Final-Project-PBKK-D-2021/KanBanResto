<?php

namespace App\Modules\KanBan\Core\Domain\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $table = 'outlets';

    protected $fillable = ['nama_outlet', 'alamat_outlet', 'no_telepon_outlet', 'business_id'];

    public function staffS()
    {
        return $this->hasMany(Staff::class, 'outlet_id');
    }

    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id');
    }
}
