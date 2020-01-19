<?php

namespace App\Http\Controllers\settings;

use Auth;
use Datatables;
use Validator;
use App\Region;
use App\TicketStatus;
use App\TicketTypes;
use App\Http\Controllers\Controller;
use App\Http\Requests;
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
        $ticketTypes = TicketTypes::where('deleted', 'N')->get();
        $ticketStatus = TicketStatus::where('deleted', 'N')->get();

        return view('settings.ticket_settings', compact('descr', 'ticketTypes', 'ticketStatus'));
    }

    public function userManagement() {
        $descr = 'User Management';

        return view('settings.user_management', compact('descr'));
    }

    public function addType(Request $request) {
        $description = $request->t_description;
        $short_code = $request->short_code;
        
        $validate = Validator::make($request->all(), [
            'short_code' => ['required', 'string', 'max:4', 'unique:ticket_types'],
            't_description' => ['required', 'string', 'max:255'],
        ]);

        if ($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();;
        }

        $user = Auth::user()->id;

        $tickectType = TicketTypes::create([
            'short_code' => $short_code,
            'description' => $description,
            'created_by'  => $user,
        ]);

        return redirect()->back()->with('success', 'New Ticket Type Added');
    }

    public function addRegion(Request $request) {
        $region_name = $request->region_name;
        $region_short = $request->region_short;
        
        $validate = Validator::make($request->all(), [
            'region_short' => ['required', 'string', 'max:4', 'unique:regions'],
            'region_name' => ['required', 'string', 'max:255'],
        ]);

        if ($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();;
        }

        $user = Auth::user()->id;

        $region = Region::create([
            'region_short' => $region_short,
            'name' => $region_name,
            'completed' => 'N',
            'created_by'  => $user,
        ]);

        return redirect()->back()->with('success', 'New FTTH Region Added');
    }

    public function getRegion() {
        $regions = Region::where('deleted', 'N')->where('completed', 'N')->get();

        return datatables()->of($regions)
        ->addColumn('action', function ($region) {
            return '<span id="edit_region" class="fal fa-edit edit-region text-primary"></span>
                <span id="delete_region" class="fal fa-trash-alt delete-region ml-3 text-danger"></span>';
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

    public function getStatus(Request $request) {

    }
}
