<?php


namespace Modules\Admin\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Modules\Admin\Traits\SendsPasswordResetAdminEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetAdminEmails;
}
