<x-master-layout>
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6 mb-3">
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Maplandi</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- end page-title -->

                <div class="row">

                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-cube-outline bg-dark text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16">Total Items</h5>
                                </div>
                                <h3 class="mt-4">43,225</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-briefcase-check bg-success text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16">Total Revenue</h5>
                                </div>
                                <h3 class="mt-4">$73,265</h3>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-tag-text-outline bg-warning text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16">Items In-Stock</h5>
                                </div>
                                <h3 class="mt-4">447</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="card">
                            <div class="card-heading p-4">
                                <div class="mini-stat-icon float-right">
                                    <i class="mdi mdi-buffer bg-danger text-white"></i>
                                </div>
                                <div>
                                    <h5 class="font-16">Sold items</h5>
                                </div>
                                <h3 class="mt-4">8699</h3>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- START ROW -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10 ">
                                        <b class="h5 mt-0  mb-5 text-small">Newly Posted Items</b>

                                    </div>

                                    <div class="col-md-2 mb-3" style="margin-top:20px">
                                        <a href="items-menu.html" class="btn btn-primary" href="">See all</a>

                                    </div>

                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col"> Price</th>
                                            <th scope="col">Condition</th>
                                            <th scope="col">Brand</th>
                                            <th scope="col">Model</th>
                                            <th scope="col" colspan="2">Images</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>HOT 10</td>
                                            <td>4,120,000</td>
                                            <td>New</td>
                                            <td>Infinix</td>
                                            <td>XEFEGE</td>

                                            <td>
                                                <div>
                                                    <img src="{{ asset('vendor/admin/images/item-1.jpg') }}" alt=""
                                                         class="thumb-md rounded-circle mr-2">

                                                </div>
                                            </td>


                                        </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- END ROW -->

            </div>
            <!-- container-fluid -->
        </div>
        <!-- content -->
</x-master-layout>

