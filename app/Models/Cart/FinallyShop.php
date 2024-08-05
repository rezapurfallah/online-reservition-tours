<?php

namespace App\Models\Cart;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinallyShop extends Model
{
    use HasFactory;

    protected $table = 'finally_shop';

    protected $fillable = [
        'tour_id',
        'user_id',
        'tour_name',
        'quantity',
        'price',
        'user_full_name',
        'user_phone_number'
    ];
}
