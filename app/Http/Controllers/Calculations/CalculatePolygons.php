<?php

namespace App\Http\Controllers\Calculations;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalculatePolygons extends Controller
{
    // public function getCalcAreaPolygons(): array
    // {
    //     $result = ['sucess' => true];
    //     $arrFull = [];
    //     $rectangle = Rectangle::all();  
    //     $triangle = Triangle::all();
    //     $value = 0;

    //     foreach ($rectangle as $item) {
    //         array_push($arrFull, $item->area);
    //     }

    //     foreach ($triangle as $item) {
    //         array_push($arrFull, $item->area);
    //     }

    //     foreach ($arrFull as $item) {
    //         $value += $item;
    //     }

    //     $result['fullSumArea'] = $value;
        
    //     return $result;
    // }

    public function getCalcAreaPolygonss()
    {
        $total = DB::table('rectangles as r')->sum('r.area + t.area')
        ->joinNoParams('triangles as t');
            
        var_dump($total);
    }
}
