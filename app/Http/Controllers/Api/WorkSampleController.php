<?php

namespace App\Http\Controllers\Api;

use App\Models\WorkSample;
use App\Http\Resources\Api\WorkSampleResource;

class WorkSampleController extends ApiController
{
    public function __construct()
    {
        $this->model = WorkSample::class;
        $this->resource = WorkSampleResource::class;
    }
}
