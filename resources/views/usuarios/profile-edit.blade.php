@extends('templates.base')
@section('title', 'Editar Perfil de Usuário')
@section('h1', 'Editar Perfil')

@section('content')
<div class="row">
    <div class="col-4">

        <form method="post" action="{{ route('usuarios.update') }}">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" value="{{Auth::user()->name}}" name="name">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" value="{{Auth::user()->email}}" name="email">
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" value="{{Auth::user()->username}}" name="username">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Alterar</button>
            </div>
        </form>

    </div>
</div>
@endsection