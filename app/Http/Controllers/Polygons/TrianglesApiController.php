<?php

namespace App\Http\Controllers\Polygons;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\models\Triangle;

class TrianglesApiController extends Controller
{
    public function createTriangle(Request $request): array
    {   
        try {
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

            $base = $request->input('base');
            $height = $request->input('height');
            $area = ($base*$height)/2;
            $date = date('Y-m-d H:i:s');

            //Faz a inserção dos dados no banco através do Eloquent ORM
            $triangle = new Triangle();
            $triangle->base = $base;
            $triangle->height = $height;
            $triangle->area = $area;
            $triangle->created_at = $date;
            $triangle->updated_at = null;
            $triangle->save();

            return $result;
        } catch (\Throwable $e) {
            return ['error' => $e];
        }
        
    }
    public function readAllTriangles(): array
    {
        try {
            $result = ['sucess' => true];

            //Retorna todos os dados da tabela retângulos através do Eloquent ORM  
            $triangle = Triangle::all();

            //Verifica se retorna algo
            if(count($triangle) == 0) {
                $result['list'] = 'Não possui dados na lista';
                return $result;
            }
            $result['list'] = $triangle;
            return $result;
        } catch (\Throwable $e) {
            return ['error' => $e];
        }
    }
    public function readTriangle(Request $request): array
    {
        $result = ['sucess' => true];

        //Retorna todos os dados da tabela retângulos filtrado por ID através do Eloquent ORM  
        $triangle = Triangle::find($request->id);

        if($triangle) {
            $result['rectangle'] = $triangle;
        } else {
            $result = ['error' => 'O ID '.$request->id.' não existe'];
            return $result;
        }

        return $result;
    }
    public function updateTriangle(Request $request): array
    {
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

        $triangle = Triangle::find($request->id);

        $base = $request->input('base') ?? $triangle->base;
        $height = $request->input('height') ?? $triangle->height;
        $area = ($base*$height)/2;
        $date = date('Y-m-d H:i:s');
        
        //Faz o preenchimento dos parâmetros no banco através do Eloquent ORM  
        if($triangle) {
            if($base) {
                $triangle->base = $base;
            }
            if($height) {
                $triangle->height = $height;
            }
            if($area) {
                $triangle->area = $area;
            }
            if($date) {
                $triangle->updated_at = $date;
            }

            $triangle->save();

        } else {
            $result = ['error' => 'O ID '.$request->id.' não existe'];
            return $result;
        }

        return $result;
    }
    public function deleteTriangle(request $request): array
    {
        $result = ['sucess' => true];

        $triangle = Triangle::find($request->id);

        if($triangle) {
            $triangle->delete();
        } else {
            $result = ['error' => 'O ID '.$request->id.' não existe'];
            return $result;
        }

        return $result;
    }
}
