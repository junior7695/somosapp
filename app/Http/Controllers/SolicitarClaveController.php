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

      // Funcion que genera el codigo aleatorio para la plantilla
      function plantilla($longitud) {
          $key = '';
          $pattern = '12345';
          $max = strlen($pattern)-1;
          for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
          return $key;
     }
     //** Fin funcion plantilla

     //Funcion que genera el codigo para el email //
         function generarCodigo($longitud) {
          $key = '';
          $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
          $max = strlen($pattern)-1;
          for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
          return $key;
     }
     //Fin de la funcion email
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
      
      if (User::where('email',$email)->exists()) {

        $code = $this->generarCodigo(6);
      $user = User::where('email',$email);
      $user->update([
              'password' => bcrypt($code)
      ]);
      
      // ** Elimina la sesion si la seccion esta activa **
      $user_id = User::where('email',$email)->first();
      DB::table('sessions')->where('user_id',$user_id->id)->delete();



      // ** Correo ** 
      $dates = array('name'=> $request['name'],'code' => $code);
      $this->Email($dates,$email);
        return redirect()->route('login', compact('user'))->with('info','Tu clave fue enviada al corredo ' . $email.' '.$code);

      }else{

        return back()->with('status','El correo '.$email. ' no esta resgistrado, por favor contacte a su administrador encargado');
      }

      
    }
    function Email($dates,$email){
      Mail::send('emails.plantilla',$dates, function($message) use ($email){
        $message->subject('Bienvenido a la plataforma');
        $message->to($email);
        $message->from('no-repply@SomosVenezuela.com.ve','SomosVenezuela');
      });
      
    }
}
