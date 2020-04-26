<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketsController extends Controller
{
    public function createTicket() {
        $disable = 'Y';

        return view ('tickets.new_ticket', compact('disable'));
    }

    public function viewTicket($id){
        // $ticket = Tickets::find($id);

        return view('tickets.view_ticket', compact('ticket'));
    }
}
