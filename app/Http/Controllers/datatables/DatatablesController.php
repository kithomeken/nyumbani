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
        ->where('status', '<>', 2102)
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

    public function todayTable(Request $request) {
        $dueToday = Tickets::where('sla_status', '9001')
        ->where('status', '<>', 2102)
        ->get();

        return Datatables::of($dueToday)
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

    public function scheduledTable(Request $request) {
        $scheduled = Tickets::where('sla_status', '9003')
        ->where('status', '<>', 2102)
        ->get();

        return Datatables::of($scheduled)
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

    public function getTicketType() {
        $ticketType = TicketTypes::where('deleted', 'N')->get();

        return datatables()->of($ticketType)
        ->addColumn('action', function ($ticketType) {
            return '<button class="btn btn-sm py-0 edit-type">
                <span id="edit_type" class="fal fa-edit text-primary"></span>
            </button>';
        })
        ->make(true);
    }
}
