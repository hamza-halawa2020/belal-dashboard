<?php

namespace App\Http\Controllers\Api;

use App\Models\InvestmentOpportunity;
use App\Http\Resources\Api\InvestmentOpportunityResource;

class InvestmentOpportunityController extends ApiController
{
    public function __construct()
    {
        $this->model = InvestmentOpportunity::class;
        $this->resource = InvestmentOpportunityResource::class;
    }
}
