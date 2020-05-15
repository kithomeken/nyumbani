<?php

namespace App\Http\Controllers\tickets;

use Auth;
use App\Region;
use App\Comments;
use App\Activity;
use App\Tickets;
use App\TicketStatus;
use App\TicketTypes;
use App\SLAStatus;
use App\User;
use Carbon\Carbon;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketsController extends Controller
{
    public function createTicketView() {
        $regions = Region::orderBy('region_name', 'asc')->get();
        $ticketTypes = TicketTypes::all();
        $agents = User::where('designation', 'TCH')->get();

        return view ('tickets.new_ticket', compact('regions', 'ticketTypes', 'agents'));
    }

    public function createTicket(Request $request){
        $anotherOne = request('create-another');
        $status = 2101;
        $slaStatus = 9001;
        $creator = Auth::user()->id;

        $validate = Validator::make($request->all(), [
            'ticket_summary'   => 'required',
            'ticket_type'      => 'required',
            'region'           => 'required',
            'agent'            => 'required',
            'priority'         => 'required',
            'description'      => 'required',
        ]);

        if ($validate->fails()){
            return redirect()->back()->with('error', 'Failed to raise ticket');
        }

        $create = Tickets::create([
            'summary'       => $request->ticket_summary,
            'type'          => $request->ticket_type,
            'region_id'     => $request->region,
            'priority'      => $request->priority,
            'assigned_to'   => $request->agent,
            'content'       => $request->description,
            'created_by'    => $creator,
            'status'        => $status,
            'sla_status'    => $slaStatus,
        ]);

        # Create Activity Log
        Activity::create([
            'ticket_id' => $create->id,
            'action_by' => $creator,
            'action_type' => 'Create',
            'description' => Auth::user()->first_name ." " . Auth::user()->last_name . " created ticket.",
        ]);

        if ($anotherOne == 'Y') {
            return redirect()->back()->with('another', 'Raise another ticket');
        }

        return redirect('/u/default/tickets/view/'. $create->id);
    }

    public function viewTicket($id){
        $ticket = Tickets::find($id);

        $status = TicketStatus::where('status_code', $ticket->status)->first();
        $creator = User::where('id', $ticket->created_by)->first();
        $assigned_to = User::where('id', $ticket->assigned_to)->first();
        $ticketType = TicketTypes::where('ticket_code', $ticket->type)->first();

        $region = Region::where('region_code', $ticket->region_id)->first();
        $slaStatus = SLAStatus::where('status_code', $ticket->sla_status)->first();

        $activities = Activity::where('ticket_id', $id)
        ->orderBy('created_at', 'desc')
        ->get();

        $comments = Comments::where('ticket_id', $id)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('tickets.view_ticket', [
            'ticket' => $ticket,
            'status' => $status,
            'creator' => $creator,
            'assigned_to' => $assigned_to,
            'ticketType' => $ticketType,
            'region' => $region,
            'slaStatus' => $slaStatus,
            'activities' => $activities,
            'comments' => $comments,
        ]);
    }
}
