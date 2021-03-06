@extends('templates.base')
@section('title', 'Inserir Usuário')
@section('h1', 'Inserir Usuário')

@section('content')
    <div class="row">
        <div class="col-4">

            <form method="post" action="{{ route('usuarios.gravar') }}">
                @csrf
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuário</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>

                <div class="mb-3">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="senha" name="password">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Gravar</button>
                </div>
            </form>

        </div>
    </div>
@endsection
