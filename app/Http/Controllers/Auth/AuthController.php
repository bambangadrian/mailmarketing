<?php

namespace MailMarketing\Http\Controllers\Auth;

use Illuminate\Http\Request;
use MailMarketing\Http\Controllers\Controller;
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

    /**
     * Redirect path if authentication successful.
     *
     * @var string $redirectPath
     */
    protected $redirectPath;

    /**
     * Create a new authentication controller instance.
     *
     */
    public function __construct()
    {
        $this->redirectPath = 'admin/dashboard';
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get login page.
     *
     * @return string
     */
    public function getLogin()
    {
        return view('admin.login');
    }

    public function doAuth(Request $request)
    {
        $this->validate($request, ['Usr_Email' => 'required|email', 'password' => 'required']);
        $credentials = $request->only('Usr_Email', 'password');
        $remember = ($request->has('remember')) ? true : false;
        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended($this->redirectPath());
        }
        return redirect('/admin/login')
            ->withInput($request->only('Usr_Email'))
            ->withErrors(['email' => 'Your credentials data do not match our records']);
    }

}
