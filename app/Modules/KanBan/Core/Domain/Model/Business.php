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
        'owner_name'
    ];

    protected $guarded = [
        'id'
    ];
}
