<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkSample extends Model
{
        protected $table = 'work_samples';

    protected $fillable = [
        'title',
        'description',
        'image',
        'money_capital',
        'rate_of_return',
        'services',
        'study_content',
        'financial_metrics',
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
