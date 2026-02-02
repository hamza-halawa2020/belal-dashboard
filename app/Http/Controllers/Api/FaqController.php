<?php

namespace App\Http\Controllers\Api;

use App\Models\Faq;
use App\Http\Resources\Api\FaqResource;

class FaqController extends ApiController
{
    protected bool $paginate = false;

    public function __construct()
    {
        $this->model = Faq::class;
        $this->resource = FaqResource::class;
    }
}
