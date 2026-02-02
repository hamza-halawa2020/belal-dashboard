<?php

namespace App\Http\Controllers\Api;

use App\Models\Staff;
use App\Http\Resources\Api\StaffResource;

class StaffController extends ApiController
{
    protected bool $paginate = false;

    public function __construct()
    {
        $this->model = Staff::class;
        $this->resource = StaffResource::class;
    }
}
