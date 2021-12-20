<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function create()
    {
        return view('JetgamesSite.usuario_cli');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);


        $usuarionuevo = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'rol' => 'Usuario',
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($usuarionuevo));
        return redirect()->route('nuevouser')->with('mensajeinsert', 'Se creo un nuevo Usuario');
    }





}
