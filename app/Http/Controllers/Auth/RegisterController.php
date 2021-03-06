<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\UserProfile;
use App\Models\UserRole;
use App\User;
use DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Session;

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
    protected $redirectTo = '/dashboard';

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
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {

        if (Session::get('locale') === "sa") {
            $url = "http://elmuster.com/Terms-Conditions";
        } else {
            $url = "http://elmuster.com/Terms-Conditions-en";
        }
        return view('frontend.default.user_sign_up', compact('url'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
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

        //  dd($data);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'user_name' => Str::slug($data['name'], '-') . date('Ymd-his'),
            'password' => Hash::make($data['password']),
        ]);

        if (in_array('freelancer', $data['user_types'])) {
            //  dd($data['phone']);
            DB::table('addresses')
                ->where('addressable_id', $user->id)
                ->update([
                    'phone' => $data['phone'],
                ]);
            $role = Role::where('name', 'Freelancer')->first();
            $user_role = new UserRole;
            $user_role->user_id = $user->id;
            $user_role->role_id = $role->id;
            $user_role->save();

            DB::table('addresses')->insert([
                'addressable_id' => $user->id,
                'addressable_type' => "App\User",
                'phone' => $data['phone'],
            ]);
            Session::put('role_id', $role->id);
            $user_profile = new UserProfile;
            $user_profile->user_id = $user->id;
            $user_profile->user_role_id = Session::get('role_id');
            $user_profile->save();
            return $user;

        }
        if (in_array('client', $data['user_types'])) {
            $role = Role::where('name', 'Client')->first();
            $user_role = new UserRole;
            $user_role->user_id = $user->id;
            $user_role->role_id = $role->id;
            $user_role->save();
            DB::table('addresses')->insert([
                'addressable_id' => $user->id,
                'addressable_type' => "App\User",
                'phone' => $data['phone'],
            ]);
            Session::put('role_id', $role->id);
            $user_profile = new UserProfile;
            $user_profile->user_id = $user->id;
            $user_profile->user_role_id = Session::get('role_id');
            $user_profile->save();
            return $user;
            DB::table('addresses')
                ->where('addressable_id', $user->id)
                ->update([
                    'phone' => $data['phone'],
                ]);
        }

        if (in_array('comprehensive', $data['user_types'])) {
            $role = Role::where('name', 'Client')->first();
            $user_role = new UserRole;
            $user_role->user_id = $user->id;
            $user_role->role_id = $role->id;
            $user_role->save();

            DB::table('users')
                ->where('id', $user->id)
                ->update([
                    'comprehensive' => 1,
                ]);
            DB::table('addresses')->insert([
                'addressable_id' => $user->id,
                'addressable_type' => "App\User",
                'phone' => $data['phone'],
            ]);
            Session::put('role_id', $role->id);
            $user_profile = new UserProfile;
            $user_profile->user_id = $user->id;
            $user_profile->user_role_id = Session::get('role_id');
            $user_profile->save();
            return $user;
            DB::table('addresses')
                ->where('addressable_id', $user->id)
                ->update([
                    'phone' => $data['phone'],
                ]);

        }

    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */

}
