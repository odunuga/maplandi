<?php


namespace Modules\Admin\Http\Controllers\Auth;


use Modules\Admin\Traits\SendsPasswordResetAdminEmails;

class ForgotPasswordController
{
    use SendsPasswordResetAdminEmails;
}
