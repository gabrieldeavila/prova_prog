<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class Usuario extends Model implements Authenticatable
{
    use HasFactory;
    public function getAuthIdentifierName()
    {
        return Auth::user()->username;
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
        return 'remember me';
    }

    public function getRememberTokenName()
    {
        return;
    }

    public function setRememberToken($value)
    {
    }

    public $timestamps = false;
    protected $hidden = ['password'];
}
