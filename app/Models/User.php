<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Auth\Passwords\HasRememberToken;

class User extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    public $table = "utenti";
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'email',
        'password',
        'username',
        'cognome',
        'eta',
        'genere',
        'telefono',
        'livello',
    ];

    const LIVELLO_1 = 1;
    const LIVELLO_2 = 2;
    const LIVELLO_3 = 3;

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->getAuthIdentifierName()};
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

}
