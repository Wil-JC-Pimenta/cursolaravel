<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Cia a rota '/empresa' e retorna uma view 'empresa'

//**
//Route::get('/empresa', function () {
//    return view('site/empresa');
//});

//Renderizar uma view baseado na rota
Route::view('/empresa' , 'site/empresa');


// Cria uma rota do tipo any - permite todo tipo de acesso HTTP (PUT, DELETE, GET, POST)
Route::any('/any', function (){
    return "Permite todo tipo de acesso HTTP";

});

//Cria uma rota do tipo Match - permite apenas acessos definidos

Route::match(['get', 'post'] ,'/match', function (){
    return "Permite apenas acessos definidos";
});

Route::get('/produto/{id}/{cat?}', function($id,$cat=''){
    return "O id do produto é:". $id . "<br>" . "A categoria é:" . $cat;
});
   
Route::redirect('/sobre', '/empresa'); 

Route::get('/news', function(){
    return view('/news');
})->name('noticias');

Route::get('/novidades',function(){
    return redirect()->route('noticias');
});