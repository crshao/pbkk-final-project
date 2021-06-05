<?php

namespace App\Http\Controllers;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function mail()
    {
        $to_name = "test";
        $to_email = "calvindon08gmail.com"
        $data = array('name' => "sender name 1", "body" => "test test test");


        Mail::send('mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject("Subject 1");

            $message->from("calvin.wijaya.0000@gmail.com");
        });

        return 'Email sent successfully';
    }
}
