<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;

class AdminAuthController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/admin-dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('CheckUserType');
        $this->middleware('guest')->except('logout');
    }


    public function loginPage()
    {
        return view('auth.Admin.login');
    }


    public function registerPage()
    {
        return view('auth.Admin.register');
    }


    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'email' => 'required|max:30|email',
                'password' => 'required|max:30|min:8',
            ]);
            $credentials = $request->only(['email', 'password']);
            $user = User::where('email', $request->email)->first();
            if ($user->type == 'admin') {
                if (Auth::attempt($credentials)) {
                    return redirect()->intended('admin-dashboard');
                }
            }
            return redirect()->back();
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|max:30|min:10',
                'email' => 'required|max:30|unique:users|email',
                'password' => 'required|max:30|min:8',
            ]);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->type = 'admin';
            $user->save();
        }
//        return view('AdminDashboard.home');
        return redirect('../admin-dashboard');
    }
    public function logout()
    {
        \Session::flush();
        Auth::logout();
        return  Redirect::to("../admin-dashboard/login")->with('message', array('type' => 'success', 'text' => 'You have successfully logged out'));
    }
}