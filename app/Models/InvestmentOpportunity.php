<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestmentOpportunity extends Model
{
  protected $table = 'investment_opportunities';

    protected $fillable = [
        'title',
        'description',
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
        return $query->where('status', 'active');
    }

}