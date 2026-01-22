<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeasibilityStudy extends Model
{
    protected $table = 'feasibility_studies';

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
        'category_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}

