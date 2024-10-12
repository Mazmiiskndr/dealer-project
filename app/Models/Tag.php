<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\UseUuid as Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';
    protected $guarded = [];
    protected $fillable = [
        'id',
        'slug',
        'name',
    ];

    protected static function booted()
    {
        static::creating(function ($tag) {
            $tag->slug = str()->slug($tag->name);
        });
    }
}
