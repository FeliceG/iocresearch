<?php

namespace ioc\Http\Controllers;

use DB;
use Auth;
use Session;

use ioc\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
     {
        return view('home');
     }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


}
