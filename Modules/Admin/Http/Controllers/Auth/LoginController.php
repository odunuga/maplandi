<?php


namespace Modules\Admin\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Modules\Admin\Traits\AuthenticatesAdmin;

class LoginController extends Controller
{
    use AuthenticatesAdmin;

    public function showLogin()
    {
        return view('admin::auth.login');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
