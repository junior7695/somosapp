<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class CrearUsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$creart = DB::table('users')->get();
        $creart = User::all();
        return view('crear.index',compact('creart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crear.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'nombre' => 'required|string',
            'correo' => 'required|email',
            'entidad' => 'required|string'

        ]);

       /* Metodo Insertar sin modelos 
       DB::table('users')->insert([

            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'entidad' => $request->entidad,
            'created_at' => now(),
            'updated_at' => now()

        ]);*/

        /* Metodo 1 insertar usando modelos
        User::create([
            'nombre' => $request->nombre,;
            'correo' => $request->correo;
            'entidad' => $request->entidad;

        ]);
        */
// Metodo 2 Insertar usando modelos
        $crear = new User;

        $crear->nombre = $request->nombre;
        $crear->correo = $request->correo;
        $crear->entidad = $request->entidad;

        $crear->save();

        return back()->with('status','El usuario ha sido creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$crear = DB::table('users')->where('id',$id)->first();
        $crear = User::findOrFail($id);
        return view('crear.edit', compact('crear'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            DB::table('users')->where('id',$id)->update([

            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'entidad' => $request->entidad,
            'updated_at' => now()

        ]);
           return back()->with('status','El usuario #'.$id. ' ha sido editado con exito'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //DB::table('users')->where('id', $id)->delete();
        User::findOrFail($id)->delete();
        return back()->with('status','El usuario #'.$id. ' ha sido eliminado con exito');
    }
}
