@extends('templates.base')
@section('title', 'Galeria')
@section('h1', 'Galeria')

@section('content')
    <div style="gap: 1rem" class="d-flex justify-content-center pb-4 bd-highlight flex-wrap">

        @foreach ($products as $product)
            <div>
                <div class="card" style="width: 18rem;">
                    {{-- pegando imagem que está contida na pasta galeria, com base no caminho salvo no banco --}}
                    <img height="286" class="card-img-top" src="{{ asset('glr/' . $product->imagem) }}"
                        alt="{{ $product->name }}">
                    <div class="card-body">
                        <a href="{{ route('galeria.show', $product->id) }}">
                            <h5 class="card-title">{{ $product->name }}</h5>
                        </a>
                        <h5 class="card-title">Preço: {{ $product->price }}</h5>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a class="btn btn-outline-dark mb-3" href={{ route('galeria.create') }}>Adicionar Produto</a>
@endsection
