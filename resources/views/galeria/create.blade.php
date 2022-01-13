@extends('templates.base')
@section('title', 'Galeria - Cadastro')
@section('h1', 'Cadastro de Produto')

@section('content')
    <div>
        {{-- formulário para adição de um novo produto --}}
        <form method="post" action="{{ route('galeria.store') }}" enctype="multipart/form-data">
            {{-- saber que o usuário autenticado é quem está fazendo as requisições para a aplicação --}}
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input required type="text" class="form-control" id="nome" name="nome">
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="preco" class="form-label">Preço</label>
                <input required type="number" class="form-control" id="preco" name="preco">
            </div>

            <p>Imagem: <input required type="file" name="imagem"></p>

            <div class="mb-3">
                <button type="submit" class="btn btn-outline-primary">Salvar</button>
            </div>
        </form>
    </div>
@endsection
