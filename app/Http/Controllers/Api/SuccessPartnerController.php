<?php

namespace App\Http\Controllers\Api;

use App\Models\SuccessPartner;
use App\Http\Resources\Api\SuccessPartnerResource;

class SuccessPartnerController extends ApiController
{
    public function __construct()
    {
        $this->model = SuccessPartner::class;
        $this->resource = SuccessPartnerResource::class;
    }
}
