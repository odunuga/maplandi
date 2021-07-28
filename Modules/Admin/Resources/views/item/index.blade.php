<x-master-layout>
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6 mb-3">
                        <h4 class="page-title">Items Menu</h4>
                    </div>

                    {{--                    <div class="alert alert-success" role="alert">--}}
                    {{--                        <strong>Well done!</strong> You successfully Posted an Item.--}}
                    {{--                    </div>--}}


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

            <div class="col">
                <div class="card">
                    <div class="card-heading p-4">
                        <div class="mini-stat-icon float-right">
                            <i class="mdi mdi-cube-outline bg-dark text-white"></i>
                        </div>
                        <div>
                            <h5 class="font-16">Total Items</h5>
                        </div>
                        <h3 class="mt-4 ">{{ $total }}</h3>
                    </div>
                </div>

                <!--CATEGORY SECTION-->

                <b class="h5 mt-0  mb text-small">Categories</b>
                <a class="btn btn-primary align-right" href="javascript:void(0)"
                   onclick="$('#addCategory').modal('show')">Add Category </a>
                <ul class="list-group" style="margin-top:12px;">
                    @if($categories)
                        @foreach($categories as $cat)
                            @livewire('admin.category',['category'=>$cat])
                        @endforeach
                    @else
                        <li class="text-center text-danger">Unable to Find Categories</li>
                    @endif
                </ul>
            </div>
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
                            <a class="btn btn-primary" href="javascript:void(0)"
                               onclick="$('#addProduct').modal('show')">Add Item </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col"> Price</th>
                                <th scope="col" colspan="3">Images</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($products))
                                @foreach($products as $item)
                                    <tr>
                                        <td>HOT 10</td>
                                        <td>4,120,000</td>
                                        <td>New</td>
                                        <td>Infinix</td>
                                        <td>XEFEGE</td>

                                        <td>
                                            <div>
                                                <img src="../assets/images/item-1.jpg" alt=""
                                                     class="thumb-md rounded-circle mr-2 ">
                                            </div>
                                        </td>


                                        <td>
                                            <a href="edit-item.html" class="btn btn-primary btn-sm">Edit</a>

                                        </td>

                                        <!--DELETE ITEM POST MODAL TRIGGGER BTN-->
                                        <td>
                                            <button data-bs-toggle="modal" data-bs-target="#DM"
                                                    class="btn btn-light btn-sm">
                                                <i class="fas fa-trash text-danger"></i>
                                            </button>

                                        </td>


                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center">No Product Yet</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>


                {{--                        <!--DELETE ITEM Modal -->--}}
                {{--                        <div class="modal fade" id="DM" tabindex="-1" aria-labelledby="exampleModalLabel"--}}
                {{--                             aria-hidden="true">--}}
                {{--                            <div class="modal-dialog">--}}
                {{--                                <div class="modal-content">--}}
                {{--                                    <div class="modal-body">--}}
                {{--                                        <i class=" fas fa-exclamation-circle text-warning" style="font-size:70px;"></i>--}}
                {{--                                        <h5> Are you sure?You won't be able to revert this! </h5>--}}

                {{--                                    </div>--}}
                {{--                                    <div class="modal-footer">--}}
                {{--                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close--}}
                {{--                                        </button>--}}
                {{--                                        <button type="submit" class="btn btn-primary">Delete</button>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}


                <!--PAGINATION-->
                    @if(isset($products))
                        {{ $products->links() }}
                    @endif
                    {{--                        <nav aria-label="Page navigation example" style="margin-top:40px">--}}
                    {{--                            <ul class="pagination justify-content-end">--}}
                    {{--                                <li class="page-item disabled">--}}
                    {{--                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>--}}
                    {{--                                </li>--}}
                    {{--                                <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
                    {{--                                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                    {{--                                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                    {{--                                <li class="page-item">--}}
                    {{--                                    <a class="page-link" href="#">Next</a>--}}
                    {{--                                </li>--}}
                    {{--                            </ul>--}}
                    {{--                        </nav>--}}


                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">x
                    </button>
                </div>
                @livewire('admin.add-category')
            </div>
        </div>
    </div>
    <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">x
                    </button>
                </div>
                @livewire('admin.add-product')
            </div>
        </div>
    </div>
    </div>
</x-master-layout>
