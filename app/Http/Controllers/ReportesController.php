<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class ReportesController extends Controller
{
    public function index()
    {
    	$reportes = DB::table('reportes')->paginate();
        return view('reports', compact('reportes'));
    }
}
