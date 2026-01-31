<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuccessPartner extends Model
{
    protected $table = 'success_partners';
    protected $fillable = [
        'name',
        'link',
        'image',
        'status',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
