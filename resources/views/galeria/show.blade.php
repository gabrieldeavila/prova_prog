@extends('templates.base')
@section('title', 'Mostrando Produto')
@section('h1') Mostrando Produto {{ $product->name }} @endsection

@section('content')
    <div class="d-flex flex-wrap justify-content-center">
        <figure class="figure">
            <img width="800" src="{{ asset('glr/' . $product->imagem) }}" class="figure-img img-fluid rounded"
                alt="{{ $product->name }}">
            <figcaption class="figure-caption">
                <h3><strong>Descrição: </strong>{{ $product->description }}</h3>
                <h3><strong>Preço: </strong>{{ $product->price }}</h3>
            </figcaption>
        </figure>
    </div>
    {{-- Retornar a página anterior --}}
    <a class="btn btn-outline-primary mb-4" href="{{ URL::previous() }}">Voltar à galeria</a>
@endsection
