<?php

namespace App\Http\Controllers\settings;

use Auth;
use Datatables;
use Validator;
use App\EscalationTeam;
use App\EscalationType;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Region;
use App\TicketStatus;
use App\TicketTypes;
use App\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
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

    public function index() {
        return redirect()->route('settings.account');
    }

    public function account() {
        $descr = 'Account Settings';

        return view('settings.account_settings', compact('descr'));
    }

    public function tickets() {
        $descr = 'Ticket Settings';
        $allUsers = User::all();

        $ticketTypes = TicketTypes::where('deleted', 'N')->get();
        $ticketStatus = TicketStatus::where('deleted', 'N')->get();

        $ticket_code = TicketTypes::max('ticket_code');
        $ticket_code = $ticket_code + 1;
        
        $region_code = Region::max('region_code');
        $region_code = $region_code + 1;

        $status_code = TicketStatus::max('status_code');
        $status_code = $status_code + 1;

        $users = [];

        foreach ($allUsers as $one) {
            $exists = EscalationTeam::where('user_id', $one->id)->exists();

            if (!$exists) {
                array_push($users, $one);
            }
        }

        $escalationTickets = EscalationType::all();

        return view('settings.ticket_settings', compact('descr', 'ticketTypes', 'ticketStatus', 'users', 'ticket_code', 'region_code', 'status_code', 'escalationTickets'));
    }

    public function userManagement() {
        $descr = 'User Management';

        return view('settings.user_management', compact('descr'));
    }

    public function addType(Request $request) {
        $ticket_description = $request->ticket_description;
        $ticket_code = $request->ticket_code;
        
        $validate = Validator::make($request->all(), [
            'ticket_code' => ['required', 'string', 'max:4', 'unique:ticket_types'],
            'ticket_description' => ['required', 'string', 'max:255'],
        ]);

        if ($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();;
        }

        $user = Auth::user()->id;

        $tickectType = TicketTypes::create([
            'ticket_code' => $ticket_code,
            'description' => $ticket_description,
            'created_by'  => $user,
        ]);

        return redirect()->back()->with('success', 'New Ticket Type Added');
    }

    public function addRegion(Request $request) {
        $region_name = $request->region_name;
        $region_code = $request->region_code;
        
        $validate = Validator::make($request->all(), [
            'region_code' => ['required', 'string', 'max:4', 'unique:regions'],
            'region_name' => ['required', 'string', 'max:255'],
        ]);

        if ($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();;
        }

        $user = Auth::user()->id;

        $region = Region::create([
            'region_code' => $region_code,
            'region_name' => $region_name,
            'completed' => 'N',
            'created_by'  => $user,
        ]);

        return redirect()->back()->with('success', 'New FTTH Region Added');
    }

    public function getRegion() {
        $regions = Region::where('deleted', 'N')->get();

        return datatables()->of($regions)
        ->addColumn('action', function ($region) {
            if ($region->completed == 'Y') {
                return '<button class="btn btn-sm py-0 edit-region" disabled>
                    <span id="edit_region" class="fal fa-edit text-primary"></span>
                </button>';
            } else {
                return '<button class="btn btn-sm py-0 edit-region">
                    <span id="edit_region" class="fal fa-edit text-primary"></span>
                </button>';
            }
        })
        ->make(true);
    }

    public function addStatus(Request $request) {
        $description = $request->status_description;
        $status_code = $request->status_code;
        
        $validate = Validator::make($request->all(), [
            'status_code' => ['required', 'string', 'max:4', 'unique:ticket_statuses'],
            'status_description' => ['required', 'string', 'max:255'],
        ]);

        if ($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();;
        }

        $user = Auth::user()->id;

        $status = TicketStatus::create([
            'status_code' => $status_code,
            'description' => $description,
            'created_by'  => $user,
        ]);

        return redirect()->back()->with('success', 'New Ticket Status Added');
    }

    public function addToEscalation(Request $request) {
        $user_id = $request->all_users;

        # Get User Details
        $details = User::find($user_id);
        $name = $details->first_name .' '. $details->other_name . ' ' . $details->last_name;

        # dd to Esclation Team
        $EscalationTeam = EscalationTeam::create([
            'user_id' => $details->id,
            'name' => $name,
            'email' => $details->email,
            'designation' => $details->designation,
            'msisdn' => $details->msisdn,
        ]);

        return redirect()->back()->with('success',  $name. ' Added to Esclation Team');
    }

    public function editType(Request $request) {
        $ticket_code = $request->eticket_code;
        $ticket_desc = $request->eticket_description;
        $delete = $request->delete_type;

        if ($delete == 'on') {
            # 'Delete' the ticket type
            $typeDel = TicketTypes::where('ticket_code', $ticket_code)
                ->update([
                    'deleted' => 'Y'
                ]);

            return redirect()->back()->with('success',  'Ticket type ' . $ticket_desc .' deleted successfully');
        } else {
            # Update ticket type details
            $typeUp = TicketTypes::where('ticket_code', $ticket_code)
                ->update([
                    'description' => $ticket_desc
                ]);

            return redirect()->back()->with('success', 'Ticket type ' . $ticket_desc .' updated successfully');
        }
    }

    public function editStatus(Request $request) {
        $status_code = $request->estatus_code;
        $status_desc = $request->estatus_description;
        $delete = $request->delete_status;

        if ($delete == 'on') {
            # 'Delete' the ticket type
            $statusDel = TicketStatus::where('status_code', $status_code)
                ->update([
                    'deleted' => 'Y'
                ]);

            return redirect()->back()->with('success',  'Ticket status ' . $status_desc .' deleted successfully');
        } else {
            # Update ticket type details
            $statusUp = TicketStatus::where('status_code', $status_code)
                ->update([
                    'description' => $status_desc
                ]);

            return redirect()->back()->with('success', 'Ticket status ' . $status_desc .' updated successfully');
        }
    }

    public function editRegion(Request $request) {
        $region_code = $request->eregion_code;
        $region_desc = $request->eregion_name;
        $delete = $request->delete_region;
        $completed = $request->completed;

        if ($delete == 'on') {
            # 'Delete'
            $regionDel = Region::where('region_code', $region_code)
                ->update([
                    'deleted' => 'Y',
                    'completed' => 'Y'
                ]);

            return redirect()->back()->with('success', $region_desc .' region deleted from list');
        } else {
            # Update ticket type details
            if ($completed == 'on') {
                $comp = 'Y';
            } else {
                $comp = 'N';
            }

            $regionUpd = Region::where('region_code', $region_code)
                ->update([
                    'region_name' => $region_desc,
                    'completed' => $comp
                ]);

            if ($completed == 'on') {
                return redirect()->back()->with('success', $region_desc .' region marked as completed');
            } else {
                return redirect()->back()->with('success', $region_desc .' region updated successfully');
            }
        }
    }

    public function addToEscalationType(Request $request) {
        $ticket_code = $request->ticket_code;
        $ticketType = TicketTypes::where('ticket_code', $ticket_code)->first();

        try {
            $addEscalation = EscalationType::create([
                'ticket_description' => $ticketType->description,
                'ticket_code' => $ticket_code,
                'system_defined' => $ticketType->system_defined,
            ]);
    
            return '200';
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function removeFromEscalationType(Request $request) {
        $ticket_code = $request->ticket_code;

        try {
            $removeEscalation = EscalationType::where('ticket_code', $ticket_code)->delete();
            return '200';
        } catch (Exception $ex) {
            return $ex;
        }
    }

    public function getEscalationTeam() {
        $escalTeam = EscalationTeam::all();

        return datatables()->of($escalTeam)
        ->addColumn('action', function ($escalTeam) {
            if ($escalTeam->completed == 'Y') {
                return '<button class="btn btn-sm py-0 edit-escteam" disabled>
                    <span id="edit_escteamn" class="fal fa-edit text-primary"></span>
                </button>';
            } else {
                return '<button class="btn btn-sm py-0 edit-escteam">
                    <span id="edit_escteam" class="fal fa-edit text-primary"></span>
                </button>';
            }
        })
        ->make(true);
    }

    public function editEscalation(Request $request) {
        $email = $request->edit_email;
        $name = $request->escalation_user;

        $delUser = EscalationTeam::where('email', $email)->delete();

        return redirect()->back()->with('success',  $name. ' has been delete from the escalation team');
    }
}
