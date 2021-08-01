<?php


namespace Modules\Admin\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Http\Middleware\Admin;
use Modules\Admin\Traits\SendsPasswordResetAdminEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetAdminEmails;


}
