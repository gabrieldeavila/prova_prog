@extends('templates.base')
@section('title', 'Perfil de Usuário')
@section('h1') Página de {{Auth::user()->name}} @endsection

@section('content')
<ul>
    <li><strong>Nome: </strong>{{Auth::user()->name}}</li>
    <li><strong>Usuário: </strong>{{Auth::user()->username}}</li>
    <li><strong>Email: </strong>{{Auth::user()->email}}</li>
    <li><strong>Email verificado em: </strong>{{Auth::user()->email_verified_at ?? "nunca"}}</li>
    <li><strong>Admin: </strong>{{Auth::user()->admin ? "sim" : "não"  }}</li>
</ul>

<a href="{{ route('profile.edit') }}" role="button" class="btn btn-outline-secondary ">Alterar dados do perfil</a>
<a href="{{ route('profile.password') }}" role="button" class="btn btn-outline-secondary ">Alterar senha</a>
@endsection