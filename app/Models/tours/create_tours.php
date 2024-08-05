<?php

namespace App\Models\tours;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class create_tours extends Model
{
    use HasFactory;

    protected $table = 'tours';

    protected $fillable = [
        'name',
        'capacity',
        'departure_date',
        'description',
        'category_id',
        'image',
        'reserved',
        'slug',
        'price'
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            if (empty($query->slug)) {
                $query->slug = Str::slug($query->name);
            }
        });
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value, '-');
    }
}
