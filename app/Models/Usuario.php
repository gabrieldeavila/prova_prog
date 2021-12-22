<?php
namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Usuario extends Authenticatable implements MustVerifyEmail
{
    use HasFactory;
    use Notifiable;

    public $timestamps = false;

    protected $hidden = ['password'];

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($token)
    {
        DB::table('usuarios')
            ->where('id', $this->id)
            ->update(['remember_token' => $token]);
        return;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
