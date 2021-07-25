<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Traits\AdminTraits;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin_web')->except('showLogin');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('admin::index');
    }

    public function orders()
    {
        return view('admin::orders');
    }

    public function stocks()
    {
        return view('admin::stocks');
    }

    public function items()
    {
        return view('admin::item.index');
    }

    public function transactions()
    {
        return view('admin::transactions');
    }

    public function users()
    {
        return view('admin::users');
    }

    public function print_page()
    {
        return view('admin::pdf.order_print');
    }

}
