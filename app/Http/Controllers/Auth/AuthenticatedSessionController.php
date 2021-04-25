<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('BackEnd.users.user-list',compact('users'));
    }

    public function up(Request $request,User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->update();

       /* $user->update([
           'name' => $request->name,
           'role' => $request->role,
           'email' => $request->email,
        ]);*/

        return back()->with('sms', 'User Updated');

    }

    public function del($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with('sms', 'User Destroyed');
    }


    /**
     * Display the login view.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
