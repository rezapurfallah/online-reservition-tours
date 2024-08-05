<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminPanel extends Model
{
    use HasFactory;

    protected $table = 'tours';
    protected $fillable = [
        'name',
        'capacity',
        'departure_date',
        'is_best',
        'description',
        'category_id',
        'image',
        'reserved',
        'FullName',
        'email',
        'phone',
        'price'

    ];
}
