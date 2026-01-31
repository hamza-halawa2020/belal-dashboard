<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'title',
        'image',
        'status',
        'created_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }

      public function feasibilityStudies()
    {
        return $this->hasMany(FeasibilityStudy::class,'category_id');
    }
    
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}
