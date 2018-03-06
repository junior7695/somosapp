<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;
use App\User;
use Validator;

class SolicitarClaveController extends Controller
{
    
    function index(){
      return view('key');
          }


     //Funcion que genera el codigo //
         function generarCodigo($longitud) {
          $key = '';
          $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
          $max = strlen($pattern)-1;
          for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
          return $key;
     }
     //Fin de la funcion//
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(Request $request)
    {
      $email = $request->email;
      $code = $this->generarCodigo(6);
      $user = User::where('email',$email)->update([
              'password' => bcrypt($code)
      ]);
      $dates = array('name'=> $request['name'],'code' => $code);
      $this->Email($dates,$email);
        return redirect()->route('login')->with('info','Tu clave fue enviada al corredo ' . $email);
    }
    function Email($dates,$email){
      Mail::send('emails.plantilla',$dates, function($message) use ($email){
        $message->subject('Bienvenido a la plataforma');
        $message->to($email);
        $message->from('no-repply@prueba.com.ve','prueba');
      });
      
    }
}
