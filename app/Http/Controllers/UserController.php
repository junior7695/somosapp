<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Support\Facades\Auth;

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
        $entidad = Auth::user()->entidad;
        if($entidad == 'CANTV'){
            $users = User::orderBy('id', 'ASC')->paginate(5);
            $dato = Auth::user()->entidad;
            return view('users.index', compact('users'));
            }else{
        $users = User::orderBy('id', 'ASC')->where('entidad',$entidad)->paginate(5);
        $dato = Auth::user()->entidad;
        return view('users.index', compact('users'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('users.create', compact('roles'));
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
        
        $entidad = Auth::user()->entidad;
        //$user = User::findOrFail($id);
        //$role = $user->roles;
        //$nombre_rol = $role->name;
        if('CANTV' === $entidad){

            $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->tlf = $request->tlf;
        $user->entidad = $request->entidad;
        $user->password = "";

        $user->save();

        $user->roles()->sync($request->get('roles'));


        return redirect()->route('users.index', $user->id)
            ->with('info', 'Usuario guardado con éxito');

        }else{

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->tlf = $request->tlf;
        $user->entidad = $user->entidad;
        $user->password = "";

        $user->save();

        $user->roles()->sync($request->get('roles'));


        return redirect()->route('users.index', $user->id)
            ->with('info', 'Usuario guardado con éxito');  
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $roles = $user->roles;
        return view('users.show', compact('user','roles'));
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
        $roles = Role::get();

        return view('users.edit', compact('user','roles'));
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
        $user = User::findOrFail($id);
        $user->update($request->all());

        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.index', $user->id)
            ->with('info', 'Usuario "'.$user->name.'" guardado con éxito.');
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


