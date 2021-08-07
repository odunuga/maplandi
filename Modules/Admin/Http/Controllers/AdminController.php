<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use App\Notifications\AdminPaymentConfirmation;
use App\Notifications\ProductDelivered;
use App\Notifications\RequestTestimony;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Testimony;
use Modules\Admin\Entities\TestimonyRequest;
use Modules\Admin\Traits\AdminTraits;
use Modules\Admin\Traits\SiteSettingsTraits;
use Modules\Cart\Entities\Order;
use Modules\Shop\Entities\Category;
use Modules\Shop\Entities\Comment;
use Modules\Shop\Entities\CommentReport;
use Modules\Shop\Entities\Currency;
use Modules\Shop\Entities\Image;
use Modules\Shop\Entities\Parameter;
use Modules\Shop\Entities\Product;
use Modules\Shop\Entities\ProductParameter;
use Modules\Shop\Entities\ProductReport;
use Modules\Shop\Entities\Promotion;
use Modules\Shop\Entities\Tag;
use PHPUnit\Util\Test;

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
            $user = User::where('id', $order->user_id)->first();
            if ($confirm_transaction || $delivery_status) {
                $order->transaction_confirmed = ($confirm_transaction === 1 || $confirm_transaction) === '1' ? true : false;
                if (($confirm_transaction === 1 || $confirm_transaction === '1') && $order->paid_at == null) {
                    $order->paid_at = now();
                    $user->notify(new AdminPaymentConfirmation($order));
                }
                if ($delivery_status === 2 || $delivery_status === '2') {
                    $user->notify(new ProductDelivered($order));
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

    public function testimonies()
    {
        return view('admin::testimonies');
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

    public function category_edit($id)
    {
        $check = Category::with('category')->where('id', $id);
        if ($check->count() > 0) {
            $category = $check->first();
            $categories = Category::all();
            return view('admin::category_edit', compact('category', 'categories'));
        }
        session()->flash('error', 'Unable to find Category');
        return back();

    }

    public function user_show($id)
    {
        $check = User::with(['shipping_address'])->where('id', $id);
        if ($check->count() > 0) {
            $user = $check->first();
            return view('admin::users.show', compact('user'));
        }
        session()->flash('error', 'Unable to find User');
        return back();
    }

    public function testimony_request($id)
    {

        $check = User::where('id', $id);
        if ($check->count() > 0) {
            $user = $check->first();
            // generate token
            $token = $this->generate_token();
            $this->clear_user_token($user);
            $set_token = new  TestimonyRequest();
            $set_token->user_id = $user->id;
            $set_token->token = $token;
            $set_token->save();

            $user->notify(new RequestTestimony($user, $token));
            session()->flash('success', 'Testimony Request Sent!');
            return back();
        }
        session()->flash('error', 'Unable to find User');
        return back();
    }

    ///////////////////////////// UPDATE /////////////////////////////

    public function category_update()
    {
        $message = 'Error Cant locate item';
        $response = 'error';
        if (request()->has('id')) {
            $id = custom_filter_var(request()->get('id'));
            $title = custom_filter_var(request()->get('title'));
            $cat_check = Category::where('id', $id);
            if ($cat_check->count() > 0) {
                $cat = $cat_check->first();
                $cat->title = $title;
                if (request()->hasFile('icon')) {
                    $icon = 'vendor/images/' . request()->icon->store('category');
                    if (isset($icon)) {
                        $cat->image()->delete();
                        $img = new Image();
                        $img->url = $icon;
                        $cat->image()->save($img);
                    }
                }
                $cat->update();
                session()->flash('success', 'Category Updated Successfully');
                return redirect(route('control.items'));
            }
        }
        session()->flash('error', 'Unable to find Category');
        return back();
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
                $message = 'Tag Deleted Successfully';
                $response = 'success';
            }
        }
        return response()->json(['response' => $response, 'message' => $message]);
    }

    public function testimony_delete()
    {
        $message = 'Error Cant locate item';
        $response = 'error';
        if (request()->has('id')) {
            $id = custom_filter_var(request()->get('id'));
            $tag_check = Testimony::where('id', $id);
            if ($tag_check->count() > 0) {
                $tag_check->delete();
                $message = 'Testimony Deleted Successfully';
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

            $product_check = ProductReport::where('id', $id);
            if ($product_check->count() > 0) {
                $product_check->delete();
                $message = 'Report Deleted Successfully';
                $response = 'success';
            }
        }
        return response()->json(['response' => $response, 'message' => $message]);
    }

    public function promotion_delete()
    {
        $message = 'Error Cant locate item';
        $response = 'error';
        if (request()->has('id')) {
            $id = custom_filter_var(request()->get('id'));
            $promo_check = Promotion::where('id', $id);
            if ($promo_check->count() > 0) {
                $promo_check->delete();
                $message = 'Advert Deleted Successfully';
                $response = 'success';
            }
        }
        return response()->json(['response' => $response, 'message' => $message]);
    }

}
