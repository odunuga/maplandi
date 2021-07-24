<?php


namespace Modules\Admin\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Modules\Admin\Traits\ConfirmsAdminPasswords;

class ConfirmPasswordController extends Controller
{
    use ConfirmsAdminPasswords;

    /**
     * Where to redirect users when the intended url fails.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
}
