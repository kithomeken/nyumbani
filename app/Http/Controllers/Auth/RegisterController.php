<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Activation;
use Illuminate\Support\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        # Check if email exists
        $checkEmail = User::where('email', $data['email'])->whereNull('email_verified_at')->count();

        if ($checkEmail != 1) {
            # Do not create user
            # Set Token Validity to N
            Activation::where('user_id', $user->id)->update([
                'is_valid' => 'N'
            ]);

            return redirect()->back()->with('ActivationFailed', 'Account activation failed');
        }

        $user = User::where('email', $data['email'])->first();

        $validate = Activation::where('user_id', $user->id)->first();
        if ($validate->is_valid == 'N') {
            # Token is not valid
            $status = 401;

            return redirect()->back()->with('ActivationFailed', 'Account activation failed');
        }

        # Set Token Validity to N
        Activation::where('user_id', $user->id)->update([
            'is_valid' => 'N'
        ]);

        # Complete Account Setup
        $userVerified = User::where('email', $data['email'])->update([
            'password' => Hash::make($data['password']),
            'email_verified_at' => Carbon::now(),
            'is_active' => 'Y'
        ]);

        $user = User::where('email', $data['email'])->first();

        return $user;
    }
}
