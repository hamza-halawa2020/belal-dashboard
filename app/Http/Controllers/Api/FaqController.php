<?php

namespace App\Http\Controllers\Api;

use App\Models\Faq;
use App\Http\Resources\Api\FaqResource;

class FaqController extends ApiController
{
    public function __construct()
    {
        $this->model = Faq::class;
        $this->resource = FaqResource::class;
    }
}
