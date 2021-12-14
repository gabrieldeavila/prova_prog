<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::orderBy('id', 'asc')->get();

        return view('usuarios.index', [
            'usuarios' => $usuarios,
            'pagina' => 'usuarios',
        ]);
    }

    public function create()
    {
        return view('usuarios.create', ['pagina' => 'usuarios']);
    }

    public function insert(Request $form)
    {
        $usuario = new Usuario();

        $usuario->name = $form->nome;
        $usuario->email = $form->email;
        $usuario->username = $form->usuario;
        $usuario->password = Hash::make($form->senha);

        $usuario->save();
        event(new Registered($usuario));

        // return redirect()->route('usuarios.index');
        return redirect()->route('verification.notice');
    }

    // Ações de login
    public function login(Request $form)
    {
        // Está enviando o formulário

        if ($form->isMethod('POST')) {
            // Se um dos campos não for preenchidos, nem tenta o logine volta
            // para a página anterior
            $credenciais = $form->validate([
                'username' => ['required'],
                'password' => ['required'],
            ]);
            // Tenta o login
            if (Auth::attempt($credenciais)) {
                session()->regenerate();
                // Usuario::getRememberTokenName();
                // dd(Auth::user());
                session()->put('usuario', Auth::user());
                // Usuario::getRememberToken();
                // dd($form->remember, $c);
                return redirect()->route('home');
            } else {
                // Login deu errado (usuário ou senha inválidos)
                return redirect()
                    ->route('login')
                    ->with('erro', 'Usuário ou senha inválidos.');
            }
        }
        return view('usuarios.login');
    }

    public function logout()
    {
        // ini_set('memory_limit', '-1');
        // Auth::logout();
        session()->forget('usuario');
        return redirect()->route('home');
    }
}
