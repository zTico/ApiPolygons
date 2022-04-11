<?php
namespace App\Http\Controllers\Calculations;
use App\Http\Controllers\Controller;
use App\models\Rectangle;
use App\models\Triangle;

class CalculatePolygons extends Controller
{
    public function getCalcAreaPolygons(): array
    {
        try {
            $result = ['sucess' => true];
            $rectangle = Rectangle::all(['area'])->sum('area');  
            $triangle = Triangle::all(['area'])->sum('area');
            $result['fullSumAreaPolygons'] = $rectangle + $triangle;
            return $result;
        } catch (\Throwable $e) {
            return ['error' => $e];
        }
    }
}
