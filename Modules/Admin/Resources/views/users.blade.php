<x-master-layout>
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6 mb-3">
                        <h4 class="page-title">Users</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Maplandi</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end page-title -->


            <!-- START ROW -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10 ">
                                    <b class="h5 mt-0  mb-5 text-small">Orders</b>
                                </div>


                            </div>


                            <div class="table-responsive" style="margin-top:10px">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Item</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Date</th>
                                        <th scope="col" colspan="2">Status</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Daniel Daneil</td>

                                        <td>
                                            <div>
                                                <img src="../assets/images/item-1.jpg" alt=""
                                                     class="thumb-md rounded-circle mr-2">
                                                Iphone 11
                                            </div>

                                        </td>

                                        <td>
                                            $9,420,000

                                        </td>

                                        <td>Lagos,Nigeria</td>
                                        <td>15/1/2018</td>

                                        <td><span class="badge badge-warning">Pending</span></td>


                                        <td>
                                            <div>
                                                <button class="btn btn-primary btn-sm">Mark As Completed</button>
                                            </div>
                                        </td>
                                    </tr>


                                    <tr>
                                        <td>Daniel Daneil</td>

                                        <td>
                                            <div>
                                                <img src="../assets/images/item-1.jpg" alt=""
                                                     class="thumb-md rounded-circle mr-2">
                                                Iphone 11
                                            </div>

                                        </td>

                                        <td>
                                            $9,420,000

                                        </td>

                                        <td>Lagos,Nigeria</td>
                                        <td>15/1/2018</td>

                                        <td><span class="badge badge-success">Delivered</span></td>


                                    </tr>


                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- END ROW -->


            <!--PAGINATION-->
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-end">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>

        </div>


        <!-- container-fluid -->

    </div>
    <!-- content -->
</x-master-layout>

