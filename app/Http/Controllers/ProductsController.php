<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Mostrar uma lista dos produtos já cadastrados.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ordenando produtos pelo name em ordem alfabética
        $products = Product::orderBy('name', 'ASC')->get();

        return view('galeria.index', [
            'products' => $products,
            'pagina' => 'galeria',
        ]);
    }

    /**
     * Mostrar o formulário para adicionar um novo produto.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('galeria.create', [
            'pagina' => 'galeria',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // salvando imagem no disk galeria
        $path = $request->file('imagem')->store('', 'galeria');

        // criando novo produto
        $product = new Product();

        // colocando dados no produto
        $product->name = $request->nome;
        $product->price = $request->preco;
        $product->imagem = $path;
        $product->description = $request->descricao;

        // salvando dados
        $product->save();

        // redirecionando para rota de galeria de produtos
        return redirect()->route("galeria");
    }

    /**
     * Retornado valor do produto que usuário clicou
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('galeria.show', [
            'product' => $product,
            'pagina' => 'galeria',
        ]);
    }
}
