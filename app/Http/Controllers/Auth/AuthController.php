<?php

namespace ioc\Http\Controllers\Auth;

use ioc\User;
use DB;
use Auth;
use Session;

use Validator;
use ioc\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

      #Where should the user be redirected to if their login succeeds?
      protected $redirectPath = '/research/add';

      #Where should the user be redirected if their login fails?
      protected $loginPath = '/login';

      #Where should the user be redirected to after logging out?
      protected $redirectAfterLogout = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }

    public function index()
     {
        return view('home');
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
            'first' => 'required|max:255',
            'last' => 'required|max:255',
            'organization' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first' => $data['first'],
            'last' => $data['last'],
            'organization' => $data['organization'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
