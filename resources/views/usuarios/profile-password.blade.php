@extends('templates.base')
@section('title', 'Mudar Senha')
@section('h1', 'Mudar Senha')

@section('content')
<div class="row">
    <div class="col-4">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="post" action="{{ route('profile.password_edit') }}">
            @csrf
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="mb-3">
                <label for="password-confirm" class="form-label">Confirmar Senha</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Alterar</button>
            </div>
        </form>

    </div>
</div>
@endsection