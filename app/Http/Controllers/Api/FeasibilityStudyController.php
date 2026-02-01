<?php

namespace App\Http\Controllers\Api;

use App\Models\FeasibilityStudy;
use App\Http\Resources\Api\FeasibilityStudyResource;

class FeasibilityStudyController extends ApiController
{
    protected array $with = ['category'];

    public function __construct()
    {
        $this->model = FeasibilityStudy::class;
        $this->resource = FeasibilityStudyResource::class;
    }
}
