<?php
namespace App\Http\Controllers\Tests;
use App\Http\Controllers\Controller;

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
