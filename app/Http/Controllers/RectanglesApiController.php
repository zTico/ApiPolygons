<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\models\Rectangle;

class RectanglesApiController extends Controller
{
    public function createRectangle(Request $request) {
        $result = ['sucess' => true];

        // As regras dos parâmetros, são obrigatorios do tipo inteiro e tem que possuir ao menos 1 caracteres  
        $rules = [
            'base' => 'required|integer|min:1',
            'height' => 'required|integer|min:1'
        ];

        $validator = Validator::make($request->all(), $rules);

        //Verifica se algum parametro foje das regras passadas
        if($validator->fails()) {
            $result = ['error' => $validator->errors()];
            return $result; 
        }

        if($request->input('base') == $request->input('height')) {
            $result = ['error' => 'A base e a altura não podem ser iguais'];
            return $result;
        }

        $base = $request->input('base');
        $height = $request->input('height');
        $area = $base * $height;
        $date = date('Y-m-d H:i:s');

        //Faz a inserção dos dados no banco através do Eloquent ORM
        $rectangle = new Rectangle();
        $rectangle->base = $base;
        $rectangle->height = $height;
        $rectangle->area = $area;
        $rectangle->created_at = $date;
        $rectangle->updated_at = null;
        $rectangle->save();

        return $result;
    }

    public function readAllRectangles() {
        $result = ['sucess' => true];

        //Retorna todos os dados da tabela retângulos através do Eloquent ORM  
        $rectangle = Rectangle::all();

        //Verifica se retorna algo
        if(count($rectangle) == 0) {
            $result['list'] = 'Não possui dados na lista';
            return $result;
        }
        $result['list'] = $rectangle;

        return $result;
    }
    
    public function readRectangle(Request $request) {
        $result = ['sucess' => true];

        //Retorna todos os dados da tabela retângulos filtrado por ID através do Eloquent ORM  
        $rectangle = Rectangle::find($request->id);

        if($rectangle) {
            $result['rectangle'] = $rectangle;
        } else {
            $result = ['error' => 'O ID '.$request->id.' não existe'];
            return $result;
        }

        return $result;
    }

    public function updateRectangle(Request $request) {
        $result = ['sucess' => true];

        //Faz novamente uma validação das regras, dessa vez sendo obrigatório apenas o valor ser inteiro
        $rules = [
            'base' => 'integer',
            'height' => 'integer'
        ];

        $validator = Validator::make($request->all(), $rules);

        //Verifica se algum parâmetro foje da regra passada
        if($validator->fails()) {
            $result = ['error' => $validator->errors()];
            return $result; 
        }

        //Verifica se algum dos parâmetro foi preenchido com 0
        if($request->base === 0 || $request->height === 0) {
            $result = ['error' => 'Os valores dos parâmetros não podem ser 0'];
            return $result; 
        }

        $rectangle = Rectangle::find($request->id);

        $base = $request->input('base') ?? $rectangle->base;
        $height = $request->input('height') ?? $rectangle->height;
        $area = $base * $height;
        $date = date('Y-m-d H:i:s');
        
        //Faz o preenchimento dos parâmetros no banco
        if($rectangle) {
            if($base) {
                $rectangle->base = $base;
            }
            if($height) {
                $rectangle->height = $height;
            }
            if($area) {
                $rectangle->area = $area;
            }
            if($date) {
                $rectangle->updated_at = $date;
            }

            $rectangle->save();

        } else {
            $result = ['error' => 'O ID '.$request->id.' não existe'];
            return $result;
        }

        return $result;
    }

    public function deleteRectangle(request $request) {
        $result = ['sucess' => true];

        $rectangle = Rectangle::find($request->id);

        if($rectangle) {
            $rectangle->delete();
        } else {
            $result = ['error' => 'O ID '.$request->id.' não existe'];
            return $result;
        }

        return $result;
    }
}
