<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $table = "utenti";

    protected $fillable = ['username, nome, cognome,
    data_nascita, sesso, livello, password, telefono, email'];

}
