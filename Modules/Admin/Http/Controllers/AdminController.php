<?php

namespace Modules\Admin\Http\Controllers;

use App\Notifications\ProductDelivered;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Traits\AdminTraits;
use Modules\Admin\Traits\SiteSettingsTraits;
use Modules\Cart\Entities\Order;
use Modules\Shop\Entities\Comment;
use Modules\Shop\Entities\CommentReport;
use Modules\Shop\Entities\Currency;
use Modules\Shop\Entities\Parameter;
use Modules\Shop\Entities\Product;
use Modules\Shop\Entities\ProductParameter;
use Modules\Shop\Entities\ProductReport;
use Modules\Shop\Entities\Tag;

class AdminController extends Controller
{
    use SiteSettingsTraits, AdminTraits;

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
        $menu = $this->get_dashboard_menu();
        return view('admin::index')->with(['menu' => $menu]);
    }

    public function orders()
    {
        return view('admin::orders');
    }

    public function stocks()
    {
        return view('admin::stocks');
    }

    public function users()
    {
        return view('admin::users.index');
    }

    public function settings()
    {
        return view('admin::settings');
    }

    public function settings_edit()
    {
        $currencies = Currency::all();
        return view('admin::settings_edit')->with(['currencies' => $currencies]);
    }

    public function settings_update()
    {
        $settings = request()->all();
        $this->update_site_settings($settings);
        return view('admin::settings')->with(['success' => 'Update Successful']);
    }

    public function order_show(Order $order)
    {
        return view('admin::single_order')->with(['order' => $order]);
    }

    public function update_order()
    {
        $message = 'No Update Done';
        $response = 'error';
        if (request()->has('id')) {
            $id = (int)request()->get('id');
            $confirm_transaction = custom_filter_var(request()->get('confirm_transaction'));
            $delivery_status = custom_filter_var(request()->get('delivery_status'));
            $order = Order::where('id', $id)->firstOrFail();
            if ($confirm_transaction || $delivery_status) {
                $order->transaction_confirmed = $confirm_transaction == "on" ? true : false;
                if ($confirm_transaction == "on" && $order->paid_at == null) {
                    $order->paid_at = now();
                }
                if ($delivery_status == 1) {
                    auth()->user()->notify(new ProductDelivered($order));
                }
                $order->delivery_status = (int)$delivery_status;
                $response = 'success';
                $message = 'Update Successful';
                $order->update();
            }
        }
        return back()->with([$response => $message]);
    }


    public function transactions()
    {
        return view('admin::transactions');
    }

    public function print_page($ref)
    {
        if ($ref) {
            $order = Order::with('buyer')->where('reference', $ref)->firstOrFail();
            return view('admin::pdf.order_print')->with(['order' => $order]);
        }

    }

    public function comments()
    {
        return view('admin::comments.comment');
    }

    public function comment_report()
    {
        return view('admin::comments.comment_report');
    }

    public function product_report()
    {
        return view('admin::comments.product_report');
    }

    public function tags()
    {
        return view('admin::tags');
    }

    public function promotions()
    {
        return view('admin::advertisement');
    }

    //////////////////////////// DELETE ///////////////////////////

    public function tags_delete()
    {
        $message = 'Error Cant locate item';
        $response = 'error';
        if (request()->has('id')) {
            $id = custom_filter_var(request()->get('id'));
            $tag_check = Tag::where('id', $id);
            if ($tag_check->count() > 0) {
                $tag_check->delete();
                $message = 'Tag Delete Successfully';
                $response = 'success';
            }
        }
        return response()->json(['response' => $response, 'message' => $message]);
    }

    public function comment_delete()
    {
        $message = 'Error Cant locate item';
        $response = 'error';
        if (request()->has('id')) {
            $id = custom_filter_var(request()->get('id'));
            $tag_check = Comment::where('id', $id);
            if ($tag_check->count() > 0) {
                $tag_check->delete();
                $message = 'Comment Deleted Successfully';
                $response = 'success';
            }
        }
        return response()->json(['response' => $response, 'message' => $message]);
    }

    public function comment_report_delete()
    {
        $message = 'Error Cant locate item';
        $response = 'error';
        if (request()->has('id')) {
            $id = custom_filter_var(request()->get('id'));
            $tag_check = CommentReport::where('id', $id);
            if ($tag_check->count() > 0) {
                $tag_check->delete();
                $message = 'Comment Deleted Successfully';
                $response = 'success';
            }
        }
        return response()->json(['response' => $response, 'message' => $message]);
    }

    public function product_report_delete()
    {
        $message = 'Error Cant locate item';
        $response = 'error';
        if (request()->has('id')) {
            $id = custom_filter_var(request()->get('id'));
            $tag_check = ProductReport::where('id', $id);
            if ($tag_check->count() > 0) {
                $tag_check->delete();
                $message = 'Report Deleted Successfully';
                $response = 'success';
            }
        }
        return response()->json(['response' => $response, 'message' => $message]);
    }

}
