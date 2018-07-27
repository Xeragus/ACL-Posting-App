<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getAccount() {
        return view('account');
    }

    public function getUsers(Request $request) {
        $company = $request['company'];
        $users = DB::select('select * from users where company = :company', ['company'=> $company]);
        foreach ($users as $user) {
            echo $user->name;
        }
    }

    public function getBooking() {
        return view('booking');
    }

    public function getGuest() {
        return view('guest');
    }

    public function getAdmin() {
        return view('admin', ['users' => User::all()]);
    }

    public function getAuthor() {
        return view('author');
    }

    public function logout() {
        Auth::logout();
        return redirect()->back();
    }

    public function assignRoles(Request $request) {
        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();
        if ($request['role_admin']) {
            $user->roles()->attach(Role::where('name', 'admin')->first());
        }
        if ($request['role_guest']) {
            $user->roles()->attach(Role::where('name', 'guest')->first());
        }
        if ($request['role_author']) {
            $user->roles()->attach(Role::where('name', 'author')->first());
        }
        return redirect()->back();
    }
}