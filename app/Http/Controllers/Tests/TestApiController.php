<?php

namespace App\Http\Controllers\Tests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestApiController extends Controller
{
    public function pingPong(): array
    {   
        try {
            return ['pong' => true];
        } catch (\Throwable $e) {
            return ['error' => $e];
        }
    }
}
