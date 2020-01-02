<?php

use App\Produto;
use App\Categoria;

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

Route::get('/categorias', function () {
    $cat = Categoria::all();
    if(count($cat) === 0)
        echo "<h4>Você não possui nenhuma categoria cadastrada.";
    else
        foreach($cat as $c) {
            echo "<p>" . $c->id . " - " . $c->nome . "</p>";
        
    }    
});

Route::get('/produtos', function () {
    $prod = Produto::all();
    if(count($prod) === 0)
        echo "<h4>Você não possui nenhum produto cadastrado.";
    else
        echo "<table>";
        echo "<thead><tr><td>Nome</td><td>Estoque</td><td>Preço</td><td>Categoria</td></tr></thead>";
        foreach($prod as $p) {
            echo "<tr>";

            echo "<td>" . $p->nome . "</td>";
            echo "<td>" . $p->estoque . "</td>";
            echo "<td>" . $p->preco . "</td>";
            echo "<td>" . $p->categoria->nome . "</td>";

            echo "</tr>";
    }    
});

Route::get('/categoriasprodutos', function () {
    $cat = Categoria::all();
    if(count($cat) === 0)
        echo "<h4>Você não possui nenhuma categoria cadastrada.";
    else
        foreach($cat as $c) {
            echo "<p>" . $c->id . " - " . $c->nome . "</p>";
            $produtos = $c->produtos;

            if (count($produtos) > 0 ) {
                echo "<ul>";
                foreach($produtos as $p){
                    echo "<li>" . $p->nome . "</li>";
                }
                echo "</ul>";
            }
    }    
});

Route::get('/categoriasprodutos/json', function () {
    $cats = Categoria::with('produtos')->get();
    return $cats->toJson();
});

Route::get('/adicionarproduto', function () {
    $cat = Categoria::find(1);
    $p = new Produto();
    $p->nome = "Meu novo produto";
    $p->estoque = 10;
    $p->preco = 100;
    $p->categoria()->associate($cat);
    $p->save();
    return $p->toJson();
});

Route::get('/removerprodutocategoria', function () {
    $p = Produto::find(9);
    if(isset($p)){
        $p->categoria()->dissociate();
        $p->save();
        return $p->toJson();
    }
    return 'Nothing';
});

Route::get('/adicionarproduto/{catid}', function ($catid) {
    $cat = Categoria::with('produtos')->find($catid);

    $p = new Produto();
    $p->nome = "Meu novo produto adicionado 2";
    $p->estoque = 40;
    $p->preco = 780;

    if(isset($cat)){
        $cat->produtos()->save($p);
    }
    $cat->load('produtos');
    return $cat->toJson();
});
