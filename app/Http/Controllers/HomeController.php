<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use Mail;
use Auth;
use App\Mail\DemoMail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pets = Pet::all();
        return view('home', ['pets' => $pets]);
    }

    public function demoMail(){
        $email = Auth::user()->email;
        Mail::to($email)->send(new DemoMail($email));
        return redirect('/');
    }
}
