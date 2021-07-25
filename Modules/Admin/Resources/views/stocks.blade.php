<x-master-layout>
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6 mb-3">
                        <h4 class="page-title">Stocks</h4>
                    </div>




                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Maplandi</a></li>
                            <li class="breadcrumb-item active">Stocks</li>
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
                                    <b class="h5 mt-0  mb-5 text-small">All Stocks</b>

                                </div>



                            </div>

                            <div class="table-responsive" style="margin-top:20px;">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col"> Price</th>
                                        <th scope="col">Condition</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Model</th>
                                        <th scope="col" >Images</th>
                                        <th scope="col" colspan="3">Status</th>


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
                                                <img src="../assets/images/item-1.jpg" alt="" class="thumb-md rounded-circle mr-2 ">
                                            </div>
                                        </td>

                                        <td><span class="badge badge-danger">Out of Stock</span></td>
                                        </td>

                                        <td>
                                            <button class="btn btn-outline-danger btn-sm">Out of Stock</button>
                                        </td>

                                        <td>
                                            <button class="btn btn-outline-secondary btn-sm">In-Stock</button>
                                        </td>
                                    </tr>
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
