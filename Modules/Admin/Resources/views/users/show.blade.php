<x-master-layout>
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6 mb-3">
                        <h4 class="page-title">User</h4>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Maplandi</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10 ">
                                    <b class="h5 mt-0  mb-5 text-small">User Information</b>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>
                                                        Full Name:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>
                                                        {{ isset($user->name)?$user->name:'' }}
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>
                                                        Email:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>
                                                        {{ isset($user->email)?$user->email:'' }}
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>
                                                        Email Verified:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>
                                                        {{ isset($user->email_verified_at)?$user->email_verified_at:'' }}
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>
                                                        Phone:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>
                                                        {{ isset($user->phone)?$user->phone:'' }}
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>
                                                        Address:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>
                                                        {{ isset($user->address)?$user->address:'' }} <br/>
                                                        {{ isset($user->state)?$user->state:'' }}, <br/>
                                                        {{ isset($user->country)?$user->country:'' }} <br/>
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h3 class="text-uppercase">
                                                        Shipping Information
                                                    </h3>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>

                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>
                                                        Full Name:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>
                                                        {{ isset($user->shipping_address->first_name)?$user->shipping_address->first_name:'' }} {{ isset($user->shipping_address->last_name)?$user->shipping_address->last_name:'' }}
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>
                                                        Shipping Email:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>
                                                        {{ isset($user->shipping_address->email)?$user->shipping_address->email:'' }}
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>
                                                        Shipping Phone:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>
                                                        {{ isset($user->shipping_address->phone)?$user->shipping_address->phone:'' }}
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>
                                                        Shipping Address:
                                                    </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>
                                                        {{ isset($user->shipping_address->address)?$user->shipping_address->address:'' }}
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <a href="{{ route("control.users") }}" class="btn btn-sm btn-secondary">
                                                Back</a>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- content -->


</x-master-layout>
