<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JuegosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['productos'] = Productos::paginate(100);
        return view('JetgamesSite.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ps4()
    {
        $datos['productos'] = Productos::paginate(100);
        return view('JetgamesSite.juegos_ps4', $datos);
    }

    public function ps3()
    {
        $datos['productos'] = Productos::paginate(100);
        return view('JetgamesSite.juegos_ps3', $datos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function xbox_360()
    {
        $datos['productos'] = Productos::paginate(100);
        return view('JetgamesSite.juegos_360', $datos);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switch()
    {
        $datos['productos'] = Productos::paginate(100);
        return view('JetgamesSite.juegos_switch', $datos);
    }

    public function wii()
    {
        $datos['productos'] = Productos::paginate(100);
        return view('JetgamesSite.juegos_wii', $datos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pc()
    {
        $datos['productos'] = Productos::paginate(100);
        return view('JetgamesSite.juegos_pc', $datos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function xbox_one()
    {
        $datos['productos'] = Productos::paginate(100);
        return view('JetgamesSite.juegos_one', $datos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
