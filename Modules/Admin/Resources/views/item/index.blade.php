<x-master-layout>
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6 mb-3">
                        <h4 class="page-title">Items Menu</h4>
                    </div>

                    <div class="alert alert-success" role="alert">
                        <strong>Well done!</strong> You successfully Posted an Item.
                    </div>


                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Maplandi</a></li>
                            <li class="breadcrumb-item active">Items Menu</li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="row">

                <div class="col">
                    <div class="card">
                        <div class="card-heading p-4">
                            <div class="mini-stat-icon float-right">
                                <i class="mdi mdi-cube-outline bg-dark text-white"></i>
                            </div>
                            <div>
                                <h5 class="font-16">Total Items</h5>
                            </div>
                            <h3 class="mt-4 ">225</h3>
                        </div>
                    </div>

                    <!--CATEGORY SECTION-->

                    <b class="h5 mt-0  mb text-small">Categories</b>
                    <ul class="list-group" style="margin-top:12px;">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Mobile
                            <button class="btn btn-primary btn-sm" href="">Delete</button>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Gadgets
                            <button class="btn btn-primary btn-sm" href="">Delete</button>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Speaker
                            <button class="btn btn-primary btn-sm" href="">Delete</button>
                        </li>
                    </ul>

                </div>
            </div>


            <!-- ADD NEW CATEGORY Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Category name" required>
                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                    <form>
                </div>
            </div>



            <!--END OF CATEGORY SECTION-->







            <!-- START ROW -->
            <div class="row" style="margin-top:20px">
                <div class="col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10 ">
                                    <b class="h5 mt-0  mb-5 text-small">All Items</b>

                                </div>

                                <div class="col-md-2 mb-3" style="margin-top:20px">
                                    <a href="addnew-item.html" class="btn btn-primary" href="">Add New </a>

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
                                        <th scope="col" colspan="3">Images</th>

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


                                        <td>
                                            <a href="edit-item.html" class="btn btn-primary btn-sm" >Edit</button>
                            </div>
                            </td>

                            <!--DELETE ITEM POST MODAL TRIGGGER BTN-->
                            <td>
                                <button data-bs-toggle="modal" data-bs-target="#DM"  class="btn btn-light btn-sm" >
                                    <i class="fas fa-trash text-danger"></i>
                                </button>
                        </div>
                        </td>



                        </tr>

                        </tr>
                        </tbody>
                        </table>
                    </div>


                    <!--DELETE ITEM Modal -->
                    <div class="modal fade" id="DM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <i class=" fas fa-exclamation-circle text-warning" style="font-size:70px;"></i>
                                    <h5> Are you sure?You won't be able to revert this! </h5>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!--PAGINATION-->
                    <nav aria-label="Page navigation example" style="margin-top:40px">
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
            </div>
        </div>

    </div>
    <!-- content -->
</x-master-layout>
