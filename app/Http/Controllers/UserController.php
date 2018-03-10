<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       // $users = DB::table('users')->paginate();
        $users = User::orderBy('id', 'DESC')->paginate(5);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
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
            'name' => 'required',
            'email' => 'required',
            'tlf' => 'required',
            
        ]);
    
        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->tlf = $request->tlf;
        $user->password = "";

        $user->save();


        return back()->with('status', 'Usuario Creado con Exito!');  

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::active()->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }

    public function perfil($id){

         $user = User::findOrFail($id);
         return view('users.perfil', compact('user'));
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
        User::findOrFail($id)->update($request->only('name','email','tlf'));
        return back()->with('status', 'Editado!!');  
    }

     public function updatePerfil(Request $request, $id)
    {
        User::findOrFail($id)->update($request->only('name','email','tlf'));
        return back()->with('status', 'Editado!!');  
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         User::findOrFail($id)->delete();

         return back()->with('status', 'Usuario Eliminado!');
    }

    


}


