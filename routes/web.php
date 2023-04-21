<?php

use Illuminate\Support\Facades\Route;
use App\Models\Template;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/editor', function () { return view('editor'); });

Route::get('/css/grapesjs/grapes.min.css', function () {
    return response()->file(base_path('node_modules/grapesjs/dist/css/grapes.min.css'));
});

Route::get('/js/grapesjs/grapes.min.js', function () {
    return response()->file(base_path('node_modules/grapesjs/dist/grapes.min.js'));
});

Route::get('/js/grapesjs/grapesjs-preset-webpage/index.js', function () {
    return response()->file(base_path('node_modules/grapesjs/grapesjs-preset-webpage/dist/index.js'));
});

Route::get('/js/grapesjs/grapesjs-plugin-forms/index.js', function () {
    return response()->file(base_path('node_modules/grapesjs/grapesjs-plugin-forms/dist/index.js'));
});



Route::post('/guardar-template', function(Request $request) {
    $template = new Template;
    $template->name = $request->input('name');
    $template->html = $request->input('html');
    $template->css = $request->input('css');
    $template->js = $request->input('js') ?? '';
    $template->description = $request->input('description');
    $template->save();
    return response()->json(['message' => 'El template se ha guardado exitosamente.']);
 })->name('guardar-template');

 Route::get('/template/{id}', function($id) {
    $template = Template::findOrFail($id);
    return view('templates.show', compact('template'));
 });
