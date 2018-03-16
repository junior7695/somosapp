<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{

	public function index()
    {
        $sessions = DB::table('sessions')->get();
		$users = User::orderBy('id', 'ASC')->paginate(5);

        return view('sessions.index', compact('users','sessions'));  
    }

    public function endsession($id)
    {
        $user = User::findOrFail($id);
        DB::table('sessions')->where('user_id',$user->id)->delete();
        return back()->with('info', 'Usuario Desloqueado con exito!');
    }

}
