<x-master-layout>
    <style>

        body {
            margin-top: 20px;
            background: #eee;
        }

        .hidden {
            display: none;
        }

        h3 {
            font-size: 16px;
        }

        .text-navy {
            color: #1ab394;
        }

        .cart-product-imitation {
            text-align: center;
            padding-top: 30px;
            height: 80px;
            width: 80px;
            background-color: #f8f8f9;
        }

        .product-imitation.xl {
            padding: 120px 0;
        }

        .product-desc {
            padding: 20px;
            position: relative;
        }

        .ecommerce .tag-list {
            padding: 0;
        }

        .ecommerce .fa-star {
            color: #d1dade;
        }

        .ecommerce .fa-star.active {
            color: #f8ac59;
        }

        .ecommerce .note-editor {
            border: 1px solid #e7eaec;
        }

        table.shoping-cart-table {
            margin-bottom: 0;
        }

        table.shoping-cart-table tr td {
            border: none;
            text-align: right;
        }

        table.shoping-cart-table tr td.desc,
        table.shoping-cart-table tr td:first-child {
            text-align: left;
        }

        table.shoping-cart-table tr td:last-child {
            width: 80px;
        }

        .ibox {
            clear: both;
            margin-bottom: 25px;
            margin-top: 0;
            padding: 0;
        }

        .ibox.collapsed .ibox-content {
            display: none;
        }

        .ibox:after,
        .ibox:before {
            display: table;
        }

        .ibox-title {
            -moz-border-bottom-colors: none;
            -moz-border-left-colors: none;
            -moz-border-right-colors: none;
            -moz-border-top-colors: none;
            background-color: #ffffff;
            border-color: #e7eaec;
            border-image: none;
            border-style: solid solid none;
            border-width: 3px 0 0;
            color: inherit;
            margin-bottom: 0;
            padding: 14px 15px 7px;
            min-height: 48px;
        }

        .ibox-content {
            background-color: #ffffff;
            color: inherit;
            padding: 15px 20px 20px 20px;
            border-color: #e7eaec;
            border-image: none;
            border-style: solid solid none;
            border-width: 1px 0;
        }

        .ibox-footer {
            color: inherit;
            border-top: 1px solid #e7eaec;
            font-size: 90%;
            background: #ffffff;
            padding: 10px 15px;
        }

    </style>


    <!-- Start content -->
    <div class="content pb-5">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6 mb-3">
                        <h4 class="page-title">Order #{{ $order->reference }}</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Maplandi</a></li>
                            <li class="breadcrumb-item active">Order</li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="main-content">
                            <div class="dashboard-block mt-0">
                                <h3 class="block-title"> {{ __('orders.single_order.title') }}
                                    <strong>#{{ $order->reference }}</strong></h3>
                                <div class="container">
                                    <div class="single-list mt-5">

                                        <div class="single-item-list">
                                            <strong>Payment Type:</strong> <span
                                                class="font-semibold">{{$order->payment_type}}</span>
                                        </div>

                                        <div class="single-item-list">
                                            <strong>Buyer: </strong><span
                                                class="font-semibold">{{ isset($order->buyer)?$order->buyer->name:''  }}</span>
                                        </div>
                                        <div class="single-item-list"><strong>Status:</strong> <span
                                                class="font-semibold">{{ $order->status==true?'Successful' : 'Failed' }}</span>
                                        </div>
                                        <div class="single-item-list"><strong>Message: </strong> <span
                                                class="font-semibold">{{ $order->message }}</span></div>
                                        <div class="single-item-list"><strong>Transaction ID:</strong> <span
                                                class="font-semibold">{{ $order->transaction_id }}</span></div>
                                        <div class="single-item-list"><strong>Amount:</strong> <span
                                                class="font-semibold">{{ currency_with_price($order->amount,$order->currency) }}</span>
                                        </div>
                                        <div class="single-item-list"><strong>Payment Message:</strong> <span
                                                class="font-semibold">{{ $order->payment_message }}</span></div>
                                        <div class="single-item-list">
                                            <strong>Gateway Response:</strong> <span
                                                class="font-semibold">{{ $order->gateway_response }}</span>
                                        </div>
                                        <div class="single-item-list">
                                            <strong>Paid At:</strong> <span
                                                class="font-semibold">{{ isset($order->paid_at)?$order->paid_at->format('d D M Y'):'Pending' }}</span>
                                        </div>
                                        <div class="single-item-list">
                                            <strong>Channel:</strong> <span
                                                class="font-semibold">{{ $order->channel }}</span></div>

                                        <div class="single-item-list"><strong>Sub Total:</strong> <span
                                                class="font-semibold">{{ currency_with_price($order->sub_total,$order->currency) }}</span>
                                        </div>
                                        <div class="single-item-list"><strong>Tax Added:</strong> <span
                                                class="font-semibold">{{ currency_with_price($order->tax_added,$order->currency) }}</span>
                                        </div>
                                        <div class="single-item-list"><strong>Shipping Name:</strong> <span
                                                class="font-semibold">{{ $order->first_name.' '.$order->last_name }}</span>
                                        </div>
                                        <div class="single-item-list"><strong>Phone:</strong> <span
                                                class="font-semibold">{{ $order->phone }}</span></div>
                                        <div class="single-item-list"><strong>Email:</strong> <span
                                                class="font-semibold">{{ $order->email }}</span></div>
                                        <div class="single-item-list"><strong>Address:</strong> <span
                                                class="font-semibold">{{ $order->address }}</span></div>
                                        <div class="single-item-list"><strong>Gateway Fees:</strong> <span
                                                class="font-semibold">{{ currency_with_price($order->fees,$order->currency) }}</span>
                                        </div>
                                        <div class="single-item-list"><strong>Customer Code:</strong> <span
                                                class="font-semibold">{{ $order->customer_code }}</span></div>
                                        <div class="single-item-list"><strong>Transaction Status:</strong> <span
                                                class="font-semibold">{{ $order->transaction_confirmed==1||$order->transaction_confirmed==true?'Yes':'No'  }}</span>
                                            <div class="single-item-list"><strong>Order Delivered:</strong> <span
                                                    class="font-semibold">{{ $order->is_delivered }}</span>
                                            </div>
                                            <div class="single-item-list"><h3>Cart</h3></div>
                                            <div class="my-items">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>Category</th>
                                                        <th>Quantity</th>
                                                        <th>Cost</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($order->cart as $item)
                                                        <tr>
                                                            <td class="single-item-list">

                                                                <img src="{{ asset($item['attributes']['image']) }}"
                                                                     class="img-thumbnail h-25 rounded-2"
                                                                     alt="#">
                                                            </td>
                                                            <td>
                                                                <h3 class="title"><a href="javascript:void(0)">
                                                                        {{ $item['name'] }}
                                                                    </a></h3>
                                                            </td>

                                                            <td>
                                                                <p>{{ $item['attributes']['category'] }}</p>
                                                            </td>

                                                            <td>
                                                                {{ $item['quantity'] }}
                                                            </td>

                                                            <td>
                                                                {{ currency_with_price($item['price'],$item['attributes']['buying_symbol']) }}
                                                            </td>


                                                        </tr>
                                                    @endforeach

                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="dt-buttons">
                    <a href="{{ route('control.orders') }}" class="btn btn-secondary"><i class="fa fa-backward"></i>
                        Back</a>
                    <button class="btn btn-primary" onclick="editOrderStatus()"><i class="fa fa-pencil-alt"></i> Edit
                    </button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title" id="exampleModalLabel">
                            <i class="lni lni-cart-full" style="color:red; font-size:25px;"></i>
                            Update Order Status</h6>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"><i
                                class="fa fa-times"></i></button>
                    </div>
                    <form action="{{ route('admin.order.update') }}" method="post">
                        @csrf
                        <input hidden name="id" value="{{ $order->id }}"/>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <ol class="list-group list-group-numbered">

                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto">
                                                <label for="confirmT" class="label">Confirm Transaction</label>
                                                <input type="checkbox" id="confirmT" name="confirm_transaction"
                                                       @if($order->transaction_confirmed==1) checked @endif />

                                            </div>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-start">
                                            <div class="ms-2 me-auto">
                                                <label for="delivery_status" class="delivery_status">Confirm
                                                    Delivery</label>
                                                <select id="delivery_status" name="delivery_status" class="form-select">
                                                    <option>Select</option>
                                                    <option value="0">Pending</option>
                                                    <option value="1">On Transit</option>
                                                    <option value="2">Delivered</option>
                                                    <option value="3">Cancelled</option>
                                                </select>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-sm btn-danger">
                                Update
                            </button>

                        </div>
                    </form>

                </div>
            </div>
        </div>

        @push('scripts')
            <script>
                let editOrderStatus = () => {
                    $('#orderModal').modal('show');
                }
            </script>
    @endpush
</x-master-layout>
