<?php

namespace App\Http\Controllers\Auth;

use Mail;
use App\User;
use App\Activation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ActivationController extends Controller
{
    public function create() {
        return view('auth.createAccount');
    }

    public function createAccount(Request $request) {
        # Add user to Admin group (Checkbox)
        $makeAdmin;

        $validate = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'other_name' => ['string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'designation' => ['required', 'string', 'max:255'],
            'msisdn' => ['required', 'digits_between:10,15', 'unique:users'],
        ]);

        if ($validate->fails()){
            return redirect()->back()->with('error', 'Failed to create Account');
        }

        # Random String for password
        $randomPwd = Str::random(15);

        # Create new user 
        $user = User::create([
            'first_name' => ($request['first_name']),
            'other_name' => ($request['other_name']),
            'last_name' => ($request['last_name']),
            'email' => $request['email'],
            'designation' => $request['designation'],
            'msisdn' => $request['msisdn'],
            'password' => Hash::make($randomPwd),
        ]);

        # Token for account activation and Expiry DateTime
        $token = hash('sha256', $user->email);
        $expire_at = Carbon::now()->addMinutes(360);

        Activation::create([
            'user_id' => $user->id,
            'token' => $token,
            'expire_at' => $expire_at
        ]);

        # Activation URL
        $activationURL = $this->activationUrl($user->id, $token);

        # Send Activation Mail
        $GLOBALS['emailTo'] = $request['email'];
        $GLOBALS['receiver'] = $request['first_name'] .' '. $request['last_name'];
        $activationMail = $this->activationMail($request, $activationURL);

        if ($activationMail) {
            # Notifiy user of account creation and mail send
            return redirect()->back()->with('AccountCreation', 'Account created successfully');
        }
    }

    protected function activationUrl($id, $hash)
    {
        return URL::temporarySignedRoute(
            'account.activation',
            Carbon::now()->addMinutes(360),
            [
                'id' => $id,
                'hash' => $hash,
            ]
        );
    }

    public function activationMail($input, $activationURL) {
        $emailTo = $input['email'];
        $receiver = $input['first_name'] .' '. $input['last_name'];

        $data = array(
            'name' => $receiver,
            'activationURL' => $activationURL,
        );

        try {
            Mail::send('emails.activation', $data, function($message) {
                $message->to($GLOBALS['emailTo'] , $GLOBALS['receiver'] )
                    ->subject(env('APP_NAME') .' Account Activation');
                $message->from('noreply@nyumbani.com','Nyumbani Team');
            }); 

            return true;
        } catch (\Throwable $ex) {
            return false;
        }
    }

    public function activate($id, $hash, Request $request) {
        # User's Details
        $user = User::where('id', $id)->first();

        if (! $request->hasValidSignature()) {
            $status = 401;

            if ($user->email_verified_at !== null) {
                # Account is activated
                return redirect('/login');
            }

            return view('auth.activate', compact('status'));
        } else {
            # Check if token is valid
            $validate = Activation::where('user_id', $id)->where('token', $hash)->first();

            if ($hash == $validate->token) {
                if ($user->email_verified_at !== null) {
                    # Account is activated
                    return redirect('/login');
                }
                
                if ($validate->is_valid == 'N') {
                    # Token is not valid
                    $status = 401;

                    return view('auth.activate', compact('status', 'user'));
                }

                $time = Carbon::now();
                $expires = new Carbon($validate->expire_at);

                if ($time > $expires) {
                    # Token Expired
                    $status = 401;

                    Activation::where('user_id', $id)->update([
                        'is_valid' => 'N'
                    ]);

                    return view('auth.activate', compact('status', 'user'));
                }

                $status = 200;
                return view('auth.activate', compact('status', 'user'));                
            } else {
                # Throw Error
                $status = 401;

                return view('auth.activate', compact('status', 'user'));
            }

        }
    }
}
