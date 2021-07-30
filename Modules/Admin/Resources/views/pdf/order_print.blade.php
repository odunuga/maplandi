<x-master-layout>
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Invoice</h4>
                    </div>
                    <div class="col-sm-6  d-print-none">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Maplandi</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                            <li class="breadcrumb-item active">Invoice</li>
                        </ol>
                    </div>
                </div> <!-- end row -->
            </div>
            <!-- end page-title -->
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="invoice-title">
                                        <h3 class="m-t-0">
                                            <img src="{{ asset('vendor/images/logo1.png') }}" alt="logo"
                                                 height="24"/>
                                        </h3>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">
                                            <address>
                                                <strong>Billed To:</strong> {{ $order->buyer->name }}<br>
                                                <br>
                                                {{ $order->buyer->address }}<br>
                                                {{ $order->buyer->state }}<br>
                                                {{ $order->buyer->country }}
                                            </address>
                                        </div>
                                        <div class="col-6 text-right">
                                            <address>
                                                <strong>Shipped To:</strong><br>
                                                {{ $order->first_name .' '.$order->last_name }} <br>
                                                {{ $order->phone }}<br>
                                                {{ $order->email }}<br>
                                                {{ $order->address }}<br>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 m-t-30">
                                            <address>
                                                <b>E-mail</b>:<br>
                                                {{ $order->buyer->email }}
                                            </address>
                                        </div>
                                        <div class="col-6 m-t-30 text-right">
                                            <address>
                                                <strong>Order Date:</strong><br>
                                                {{ $order->created_at->format('M d Y') }}<br><br>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="panel panel-default">
                                        <div class="p-2">
                                            <h3 class="panel-title font-20"><strong>Order summary</strong></h3>
                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <td><strong>Item</strong></td>
                                                        <td class="text-center"><strong></strong></td>
                                                        <td class="text-center"><strong>Quantity</strong>
                                                        </td>
                                                        <td class="text-right"><strong>Totals</strong></td>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                    @foreach($order->cart as $item)
                                                        <tr>
                                                            <td>{{ $item['name'] }}</td>
                                                            <td class="text-center"></td>
                                                            <td class="text-center">{{ $item['quantity'] }}</td>
                                                            <td class="text-right">{{ currency_with_price($item['attributes']['amount'], isset($item['attributes']['converted_code']) ?$item['attributes']['converted_code']:$item['attributes']['symbol']) }}</td>
                                                        </tr>

                                                    @endforeach
                                                    <tr>
                                                        <td class="thick-line"></td>
                                                        <td class="thick-line"></td>
                                                        <td class="thick-line text-center">
                                                            <strong>Subtotal</strong></td>
                                                        <td class="thick-line text-right">{{ currency_with_price($order->sub_total, isset($item['attributes']['converted_code']) ?$item['attributes']['converted_code']:$item['attributes']['symbol']) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line text-center">
                                                            <strong>Tax</strong></td>
                                                        <td class="no-line text-right">{{currency_with_price($order->tax_added, isset($item['attributes']['converted_code']) ?$item['attributes']['converted_code']:$item['attributes']['symbol'])}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line text-center">
                                                            <strong>Total</strong></td>
                                                        <td class="no-line text-right"><h4
                                                                class="m-0">{{ currency_with_price($order->amount, isset($item['attributes']['converted_code']) ?$item['attributes']['converted_code']:$item['attributes']['symbol']) }}</h4>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="d-print-none mo-mt-2">
                                                <div class="float-right">
                                                    <a href="javascript:window.print()"
                                                       class="btn btn-success waves-effect waves-light"><i
                                                            class="fa fa-print"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div> <!-- end row -->
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
</x-master-layout>


