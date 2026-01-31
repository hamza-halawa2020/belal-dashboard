<?php

namespace App\Http\Controllers\Api;

use App\Models\FeasibilityStudyRequest;
use App\Http\Resources\Api\FeasibilityStudyRequestResource;
use App\Http\Requests\Api\FeasibilityStudyRequestStoreRequest;

class FeasibilityStudyRequestController extends ApiController
{
    public function __construct()
    {
        $this->model = FeasibilityStudyRequest::class;
        $this->resource = FeasibilityStudyRequestResource::class;
    }

    public function store(FeasibilityStudyRequestStoreRequest $request)
    {
        $item = $this->model::create($request->validated());

        return new $this->resource($item);
    }
}
