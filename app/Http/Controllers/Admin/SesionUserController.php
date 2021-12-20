<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesionUserController extends Controller
{
    
    public function login()
    {
        return view('AdminSite.index');
    }


    public function autenticacion(Request $request)
    {
        $credenciales = $request->validate([
            'email' => ['required', 'email','exists:users'],
            'password' => ['required']
        ]);
        $usuario = User::where('email',$credenciales['email'])->first();   
        if ($usuario && $usuario->rol == 'Administrador') {     
            if (Auth::attempt($credenciales)) {
                $request->session()->regenerate();
                return redirect()->route('main-page');
            }
        }
        if ($usuario && $usuario->rol == 'Usuario') {     
            if (Auth::attempt($credenciales)) {
                $request->session()->regenerate();
                return redirect()->route('index');
            }
        }
        return back()->withErrors([
            'email' => 'Usuario y Contraseña proporcionadas no coinciden con nuestros registros de cuentas Administrativas.'
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('index');
    }


}
