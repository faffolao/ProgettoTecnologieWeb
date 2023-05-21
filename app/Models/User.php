<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $table = "utenti";
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'nome',
        'cognome',
        'eta',
        'genere',
        'telefono',
        'livello',
    ];

}
