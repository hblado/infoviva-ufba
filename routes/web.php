<?php

use Illuminate\Support\Facades\Route;

/* ======== HomePage ======== */
Route::get('/', function () {
    return view('home', ['title' => 'Início']);
});

/* ======== Sobre ======== */
Route::get('/pesquisa', function () {
    return view('sobre/pesquisa', ['title' => 'A Pesquisa']);
});

Route::get('/objetivos', function () {
    return view('sobre/objetivos', ['title' => 'Objetivos']);
});

/* ======== Quem Somos ======== */
Route::get('/quem-somos', function () {
    $jsonPath = resource_path('data/who_we_are.json');
    if (!File::exists($jsonPath)) {
        abort(404, 'Arquivo JSON não encontrado.');
    }
    $whoWeAre = json_decode(File::get($jsonPath), true);
    return view('quemsomos', [
        'whoWeAre' => $whoWeAre,
        'title' => 'Quem Somos',
    ]);
});

/* ======== FAQ ======== */
Route::get('/faq', function () {
    $jsonPath = resource_path('data/faq.json');
    if (!File::exists($jsonPath)) {
        abort(404, 'Arquivo JSON não encontrado.');
    }
    $faq = json_decode(File::get($jsonPath), true);
    return view('faq', [
        'faq' => $faq,
        'title' => 'FAQ'
    ]);
});

/* ======== Rede de Atenção à Mulher ======== */
Route::get('/ram/sobre', function () {
    return view('ram/about', ['title' => 'Sobre a RAM']);
});

Route::get('/ram/nossa-pesquisa', function () {
    return view('ram/research', ['title' => 'Nossa Pesquisa']);
});

Route::get('/ram/violencia', function () {
    return view('ram/violencia', ['title' => 'O que é Violência']);
});

Route::get('/ram/dados', function () {
    return view('ram/dados', ['title' => 'Dados']);
});

Route::get('/ram/violencia-informativa', function () {
    return view('ram/info-violence', ['title' => 'Violência Informativa']);
});

/* ======== Fontes ======== */
Route::get('/fontes', function () {
    $jsonPath = resource_path('data/sources.json');
    if (!File::exists($jsonPath)) {
        abort(404, 'Arquivo JSON não encontrado.');
    }
    $sources = json_decode(File::get($jsonPath), true);
    return view('/fontes', [
        'sources' => $sources,
        'title' => 'Fontes'
    ]);
});

Route::get('/redecris', function() {
    return view('redecris', ['title' => 'Rede Cris']);
});

Route::get('/contato', function () {
    return view('contact', ['title' => 'Contato']);
});

