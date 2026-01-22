<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Http\Resources\Api\CategoryResource;

class CategoryController extends ApiController
{
    public function __construct()
    {
        $this->model = Category::class;
        $this->resource = CategoryResource::class;
    }
}
