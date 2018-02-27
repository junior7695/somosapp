<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OTPController extends Controller
{
    public function enviar(Request $request, $email)
    {

    	$otp = User::Where('email','=',$email)->get();

    	if(['password']==''){
    		//codigo para generar clave y enviar
    	}



    }
}
