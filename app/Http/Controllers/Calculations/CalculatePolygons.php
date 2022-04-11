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
            $arrFull = [];
            $rectangle = Rectangle::all();  
            $triangle = Triangle::all();
            $value = 0;
            foreach ($rectangle as $item) {
                array_push($arrFull, $item->area);
            }
            foreach ($triangle as $item) {
                array_push($arrFull, $item->area);
            }
            foreach ($arrFull as $item) {
                $value += $item;
            }
            $result['fullSumArea'] = $value;
            return $result;
        } catch (\Throwable $e) {
            return ['error' => $e];
        }
    }
}
