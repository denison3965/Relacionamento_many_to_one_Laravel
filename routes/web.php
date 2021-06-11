<?php

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Support\Facades\Route;

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

Route::get('/categorias', function () {
    $categorias = Categoria::all();
    if (count($categorias) == 0)
        echo "<h4>Voce não possui nenhuma categotia cadastrada</h4>";
    else
        foreach ($categorias as $categoria) {
            echo "<p>$categoria->id - $categoria->nome<p>";
        }
});

Route::get('/produtos', function () {
    $produtos = Produto::all();
    if(count($produtos) == 0)
        echo "<h4>Voce não possui nenhu produto cadastrada</h4>";
    else
        echo "<table>";
        echo "<thead> <tr> <td>Nome</td> <td>Estoque</td> <td>Preço</td> <td>Categoria</td> </tr> </thead>";
        echo "<tbody>";
        foreach ($produtos as $produto) {
            echo "<tr>";
            echo "<td> $produto->nome <td>";
            echo "<td> $produto->estoque <td>";
            echo "<td> $produto->preco <td>";
            echo "<td>" . $produto->categoria->nome ."<td>";
            echo "</tr>";
        };
        echo '</tbody>';
        echo '</table>';
});

Route::get('/categoriasprodutos', function () {
    $categorias = Categoria::all();

    if (count($categorias) === 0 )
        echo "Voce não possui nenhuma categoria cadastrada";
    else
        foreach ($categorias as $categoria) {
            echo "<p> $categoria->id - $categoria->nome";
            $produtos = $categoria->produtos;
            
            echo "<ul>"; 
            foreach ($produtos as $produto) {
                echo "<li>". $produto->nome ."</li>";
            }
            echo "</ul>";
        }
});

Route::get('/categoriasprodutos/json', function() {
    $categorias =  Categoria::with('produtos')->get();
    return $categorias->toJson();

});

Route::get('/adicionarproduto/{cat_id}', function ($cat_id) {
    $categoria = Categoria::with('produtos')->find($cat_id);

    $produto = new Produto();
    $produto->nome = "Meu novo produto";
    $produto->estoque = 30;
    $produto->preco = 200;

    if (isset($categoria))
        $categoria->produtos()->save($produto);
    
    $categoria->load('produtos');
    return $categoria->toJson();

});