<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\Rectangle;
use App\models\Triangle;

class ApiController extends Controller
{
    public function pingPong() {
        return ['pong' => true];
    }

    public function getCalcAreaPolygons() {
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
    }

}
