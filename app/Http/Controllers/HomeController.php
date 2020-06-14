<?php

namespace App\Http\Controllers;

use Mail;
use App\Tickets;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $overdueCount = Tickets::where('sla_status', '9002')
        ->where('status', '<>', 2102)
        ->count();

        $dueCount = Tickets::where('sla_status', '9001')
        ->where('status', '<>', 2102)
        ->count();

        $scheduledCount = Tickets::where('sla_status', '9003')
        ->where('status', '<>', 2102)
        ->count();

        return view('home', [
            'overdueCount' => $overdueCount,
            'dueCount' => $dueCount,
            'scheduledCount' => $scheduledCount
        ]);
    }

    public function attachment_email() {
        $data = array('name'=>"Virat Gandhi");
        Mail::send('mail', $data, function($message) {
           $message->to('kithomeken@gmail.com', 'Kennedy Kithome')->subject
              ('Laravel Testing Mail with Attachment');
           $message->embed('C:\wamp64\www\stock\public\img\icons\5511031TOqFD1502285018.jpg');
        //    $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
           $message->from('xyz@gmail.com','Virat Gandhi');
        });
        echo "Email Sent with attachment. Check your inbox.";
    }
}
