<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    public function handleLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // L'authentification a réussi
            $user = Auth::user();

            // Vérifier si l'utilisateur est un administrateur
            if ($user->is_admin && $user->is_admin === 1) {
                // Redirection vers la vue admin
                return view('admin.index');
            } else {
                // Redirection vers la page utilisateur normale
                return redirect()->route('dashboard');
            }
        }

        // L'authentification a échoué
        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}
