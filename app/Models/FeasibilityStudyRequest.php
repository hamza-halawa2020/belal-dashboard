<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeasibilityStudyRequest extends Model
{
    protected $table = 'feasibility_study_requests';

    protected $fillable = [
        'name',
        'phone',
        'message',
    ];
    
}
