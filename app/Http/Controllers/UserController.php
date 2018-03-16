<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $entidad = Auth::user()->entidad;
        $sessions = DB::table('sessions')->get();

        // Solo los Usuarios de CANTV podran observar todos los usuarios, de loc ontrario solo podra observar usuarios de su propia entidad
        if($entidad == 'CANTV'){
            $users = User::orderBy('id', 'ASC')->paginate(5);
            return view('users.index', compact('users','sessions'));
            }else{
        $users = User::orderBy('id', 'ASC')->where('entidad',$entidad)->paginate(5);
        return view('users.index', compact('users', 'sessions'));
        }
    }

    public function create()
    {
        $roles = Role::get();
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'tlf' => 'required',    
        ]);
        $id_auth = Auth::user()->id;
        $auth =  User::findOrFail($id_auth);
        
        //Comparamos si el usuario es de CANTV guardamos en la DB la entidad que se escoja en el formulario
        if('CANTV' === $auth->entidad){

        //Subimos el reporte a la DB
            DB::table('reportes')->insert([
            'reporte' => $auth->name . " (".$auth->email.")      ha CREADO en el sistema al usuario:      ". $request->name. " (". $request->email.")",
            'fecha' => Carbon::now()
            ]);

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

        // De no pertenecer a CANTV se cargara en la DB la entidad que posee el usuario que lo esta creando
        }else{

        DB::table('reportes')->insert([
            'reporte' => $auth->name . " (".$auth->email.")      ha CREADO en el sistema al usuario:      ". $request->name. " (". $request->email.")",
            'fecha' => now()
            ]);

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

    public function show($id)
    {
        $user = User::findOrFail($id);
        $roles = $user->roles;
        return view('users.show', compact('user','roles'));
    }
    
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

    public function update(Request $request, $id)
    {

        // Cargamos el Reporte a la DB
        $id_auth = Auth::user()->id;
        $auth =  User::findOrFail($id_auth);
        DB::table('reportes')->insert([

            'reporte' => $auth->name . " (".$auth->email.")      ha EDITADO en el sistema al usuario:      ". $request->name. " (". $request->email.")",
            'fecha' => now()
        ]);
        $user = User::findOrFail($id);
        $user->update($request->all());

        $user->roles()->sync($request->get('roles'));

        return redirect()->route('users.index', $user->id)
            ->with('info', 'Usuario "'.$user->name.'" guardado con éxito.');
    }

     public function updatePerfil(Request $request, $id)
    {
        User::findOrFail($id)->update($request->only('name','email','tlf'));
        return back()->with('info', 'Editado!!');  
    }
    
    public function destroy($id)
    {
         $user = User::findOrFail($id);
         $id_auth = Auth::user()->id;
         $auth =  User::findOrFail($id_auth);
         DB::table('reportes')->insert([

            'reporte' => $auth->name . " (".$auth->email.")      ha ELIMINADO del sistema al usuario:      ". $user->name. " (". $user->email.")",
            'fecha' => now()

        ]);
         $user->delete();

         return back()->with('info', 'Usuario Eliminado!');
    }

    public function endsession($id)
    {
        $user = User::findOrFail($id);
        DB::table('sessions')->where('user_id',$user->id)->delete();
        return back()->with('info', 'Usuario Desloqueado con exito!');
    }

}
