<?php
use App\Http\Controllers\Calculations\CalculatePolygons;
use App\Http\Controllers\Polygons\RectanglesApiController;
use App\Http\Controllers\Polygons\TrianglesApiController;
use App\Http\Controllers\Tests\TestApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//A rota verifica se a API está retornando
Route::get('/ping', [TestApiController::class, 'pingPong']);

//Rotas dos Retângulos
Route::post('/rectangle', [RectanglesApiController::class, 'createRectangle']); //Cadastra um retangulo 
Route::get('/rectangles', [RectanglesApiController::class, 'readAllRectangles']); //Retorna todos os retangulos cadastrados
Route::get('/rectangle/{id}', [RectanglesApiController::class, 'readRectangle']); //Retorna o retangulo por ID
Route::put('/rectangle/{id}', [RectanglesApiController::class, 'updateRectangle']); //Atualiza os dados do retangulo por ID
Route::delete('/rectangle/{id}', [RectanglesApiController::class, 'deleteRectangle']); //Deleta os dados do retangulo por ID

//Rotas dos Triângulos
Route::post('/triangle', [TrianglesApiController::class, 'createTriangle']); //Cadastra um triângulo 
Route::get('/triangles', [TrianglesApiController::class, 'readAllTriangles']); //Retorna todos os triângulos cadastrados
Route::get('/triangle/{id}', [TrianglesApiController::class, 'readTriangle']); //Retorna o triângulo por ID
Route::put('/triangle/{id}', [TrianglesApiController::class, 'updateTriangle']); //Atualiza os dados do triângulo por ID
Route::delete('/triangle/{id}', [TrianglesApiController::class, 'deleteTriangle']); //Deleta os dados do triângulo por ID

//Rota que retorne o valor da soma das áreas de todos os polígonos cadastrados
Route::get('/polygonssumarea', [CalculatePolygons::class, 'getCalcAreaPolygonss']);





