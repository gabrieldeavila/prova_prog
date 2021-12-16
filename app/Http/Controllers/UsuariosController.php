<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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

        $usuario->name = $form->name;
        $usuario->email = $form->email;
        $usuario->username = $form->username;
        $usuario->password = Hash::make($form->password);

        $usuario->save();

        // gambiarra, provavelmente
        Auth::attempt(
            ['username' => $form->username, 'password' => $form->password],
            $form->remember
        );
        session()->regenerate();

        // provavelmente tem q usar isso, mas to com mt preguiça kek
        // $this->login($form);

        event(new Registered($usuario));

        return redirect()->route('verification.notice');

        // return redirect()->route('usuarios.index');
    }

    public function profile()
    {
        return view('usuarios.profile', ['pagina' => 'perfil']);
    }

    public function update(Request $form)
    {
        DB::table('usuarios')
            ->where('id', Auth::user()->id)
            ->update([
                'email' => $form->email,
                'username' => $form->username,
                'name' => $form->name,
            ]);
        // dd('mudou, será?');
        return view('usuarios.profile', ['pagina' => 'perfil']);
    }

    public function profile_edit()
    {
        return view('usuarios.profile-edit', ['pagina' => 'perfil']);
    }

    // Ações de login
    public function login(Request $form)
    {
        // Está enviando o formulário
        if ($form->isMethod('POST')) {
            // Tenta o login
            if (
                Auth::attempt(
                    [
                        'username' => $form->username,
                        'password' => $form->password,
                    ],
                    $form->remember
                )
            ) {
                session()->regenerate();
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
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('home');
    }
}
