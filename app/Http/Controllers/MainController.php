<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MainController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Books=DB::table('Books')->get();
        // dd($Books);
        return view('welcome')->with('Books',$Books);
    }
}
