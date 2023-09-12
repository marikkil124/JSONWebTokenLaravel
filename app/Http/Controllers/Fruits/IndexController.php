<?php

namespace App\Http\Controllers\Fruits;

use App\Http\Controllers\Controller;
use App\Http\Resources\FruitResource;
use App\Models\fruit;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $fruits = fruit::all();
        return FruitResource::collection($fruits);
    }
}
