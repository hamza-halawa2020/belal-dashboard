<?php

namespace App\Http\Controllers\Api;

use App\Models\Service;
use App\Http\Resources\Api\ServiceResource;

class ServiceController extends ApiController
{
    public function __construct()
    {
        $this->model = Service::class;
        $this->resource = ServiceResource::class;
    }
}
