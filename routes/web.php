<?php

use App\Http\Controllers\CropperController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

/*
/
/
/
// rotas galeria de produtos
/
/
/
 */
// fazendo com que a home do site seja a galeria de produtos, sempre que acessada
Route::get('/', [ProductsController::class, 'index'])->name('home');

// rota para exibir a página de galeria de produtos
Route::get('/produtos-galeria', [ProductsController::class, 'index'])
    ->name('galeria');

// rota para exibir formulário de adição de produtos
Route::get('/produtos-galeria/add', [ProductsController::class, 'create'])
    ->name('galeria.create');

// rota para adicionar dados do produto que veio do formulário
Route::post('/produtos-galeria/add', [ProductsController::class, 'store'])
    ->name('galeria.store');

// rota para mostrar dados de um produto específico
Route::get('/produtos-galeria/{product}', [ProductsController::class, 'show'])
    ->name('galeria.show');

/*
/
/
/
// rotas criadas na disciplina
/
/
/
 */

Route::get('/email/verify', function () {
    return view('auth.verify-email', ['pagina' => 'verify-email']);
})
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/profile', [UsuariosController::class, 'profile'])
    ->middleware('auth')
    ->name('profile');

Route::get('/profile/edit', [UsuariosController::class, 'profile_edit'])
    ->middleware('auth')
    ->name('profile.edit');

Route::get('/profile/password', [UsuariosController::class, 'profile_password'])
    ->middleware('auth')
    ->name('profile.password');

Route::post('/profile/password', [UsuariosController::class, 'update_password'])
    ->middleware('auth')
    ->name('profile.password_edit');

Route::get('/email/verify/{id}/{hash}', function (
    EmailVerificationRequest $request
) {
    $request->fulfill();
    return redirect()->route('home');
})
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');

Route::post('/profile/edit', [UsuariosController::class, 'update'])->name(
    'usuarios.update'
);

Route::get('produtos', [ProdutosController::class, 'index'])->name('produtos');

Route::get('/produtos/inserir', [ProdutosController::class, 'create'])->name(
    'produtos.inserir'
);

Route::post('/produtos/inserir', [ProdutosController::class, 'insert'])->name(
    'produtos.gravar'
);

Route::get('/produtos/{prod}', [ProdutosController::class, 'show'])->name(
    'produtos.show'
);

Route::get('/produtos/{prod}/editar', [
    ProdutosController::class,
    'edit',
])->name('produtos.edit');

Route::put('/produtos/{prod}/editar', [
    ProdutosController::class,
    'update',
])->name('produtos.update');

Route::get('/produtos/{prod}/apagar', [
    ProdutosController::class,
    'remove',
])->name('produtos.remove');

Route::delete('/produtos/{prod}/apagar', [
    ProdutosController::class,
    'delete',
])->name('produtos.delete');

Route::get('usuarios', [UsuariosController::class, 'index'])->name(
    'usuarios.index'
);

Route::prefix('usuarios')->group(function () {
    Route::get('/inserir', [UsuariosController::class, 'create'])->name(
        'usuarios.inserir'
    );
    Route::post('/inserir', [UsuariosController::class, 'insert'])->name(
        'usuarios.gravar'
    );
});

Route::get('/login', [UsuariosController::class, 'login'])->name('login');
Route::post('/login', [UsuariosController::class, 'login']);

Route::get('/logout', [UsuariosController::class, 'logout'])->name('logout');

Route::get('/imagem/{id}', [CropperController::class, 'show'])->name(
    'image.show'
);

Route::post('/imagem', [CropperController::class, 'store'])->name(
    'image.store'
);
