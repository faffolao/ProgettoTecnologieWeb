<?php

// In questo esempio, il middleware CheckLevel verifica se l’utente ha il livello 1. Se l’utente non ha il livello 1, viene reindirizzato alla pagina home.
// DA RIMODIFICARE

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLevel
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->level !== 1) {
            return redirect('homepage');
        }

        return $next($request);
    }
}