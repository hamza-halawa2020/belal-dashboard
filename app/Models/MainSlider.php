<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainSlider extends Model
{
    protected $fillable = [
        'title',
        'description',
        'link',
        'image',
        'status',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
