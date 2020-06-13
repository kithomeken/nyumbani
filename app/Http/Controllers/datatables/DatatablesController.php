<?php

namespace App\Http\Controllers\datatables;

use App\User;
use App\Region;
use App\Tickets;
use App\SlaStatus;
use App\TicketTypes;
use App\TicketStatus;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;

class DatatablesController extends Controller
{
    public function overdueTable(Request $request) {
        $overdue = Tickets::where('sla_status', '9002')
        ->where('status', 2102)
        ->get();

        return Datatables::of($overdue)
        ->editColumn('agent', function($ticket) {
            $user = User::where('id', $ticket->assigned_to)->first();
            return $user->first_name . ' ' . $user->last_name;
        })
        ->editColumn('type', function($ticket) {
            $ticketType = TicketTypes::where('ticket_code', $ticket->type)->first();
            return $ticketType->description;
        })
        ->editColumn('region', function($ticket) {
            $region = Region::where('region_code', $ticket->region_id)->first();
            return $region->region_name;
        })
        ->editColumn('priority', function($ticket) {
            if ($ticket->priotity == 1) {
                return 'Low Priority';
            } elseif ($ticket->priority == 2) {
                return 'Medium Priority';
            } else {
                return 'High Priority';
            }
        })
        ->editColumn('created_at', function($ticket) {
            return $ticket->created_at->diffForHumans();
        })
        ->make(true);
    }
}
