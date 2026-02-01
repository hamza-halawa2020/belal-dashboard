<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $model;
    protected $resource;

    protected array $with = [];

    public function index(Request $request)
    {
        $query = $this->model::with($this->with);

        if (method_exists(new $this->model, 'scopeActive')) {
            $query->active();
        }

        $items = $query->latest()->paginate($request->get('limit', 10));

        return $this->resource::collection($items);
    }

    public function show($id)
    {
        $item = $this->model::with($this->with)->findOrFail($id);
        
        return new $this->resource($item);
    }

}
