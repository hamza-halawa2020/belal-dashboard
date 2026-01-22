<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
 protected $table = 'faqs';

    protected $fillable = [
        'question',
        'answer',
        'status',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }
    
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

}

