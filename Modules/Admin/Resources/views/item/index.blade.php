<x-master-layout>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>
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
                        <h3 class="mt-4 ">{{ format_number($total) }}</h3>
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
    <div class="row my-5" style="margin-top:20px">
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
                                        <td>{{ $item->title }}</td>
                                        <td>{{ currency_with_price($item->price,isset($item->currency)?$item->currency->symbol:'') }}</td>
                                        <td>
                                            <div>
                                                <img src="{{ isset($item->image)?asset($item->image->url):'' }}" alt=""
                                                     class="thumb-md rounded-circle mr-2 ">
                                            </div>
                                        </td>


                                        <td>
                                            <a href="{{ url('control-room/product/'.$item->sku.'/edit') }}"
                                               class="btn btn-primary btn-sm">Edit</a>

                                        </td>

                                        <!--DELETE ITEM POST MODAL TRIGGGER BTN-->
                                        <td>
                                            <button onclick="deleteItem('{{$item->sku}}','{{$item->title}}')"
                                                    class="btn  btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                            <button onclick="addTag('{{$item->sku}}')"
                                                    class="btn btn-light btn-sm btn-dark">
                                                <i class="fas fa-tags"></i>
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

                    <!--DELETE ITEM Modal -->
                    <div class="modal fade" id="DM" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <i class=" fas fa-exclamation-circle text-warning" style="font-size:70px;"></i>
                                    <h4>Delete <span id="title"></span></h4>
                                    <input hidden id="deleteId" name="deleteId"/>
                                    <p> Are you sure? You won't be able to revert this! </p>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close
                                    </button>
                                    <button onclick="confirmDelete()" type="submit" class="btn btn-danger">Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


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
    <div class="modal fade" id="addTag" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">x
                    </button>
                </div>
                @livewire('admin.tag-to-product')
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <script>
            let deleteItem = (id, title) => {
                $('#title').text(title);
                $('#DM').modal('show');
                $('#deleteId').val(id);
            };
            let addTag = (sku) => {
                let tagModal = $('#addTag');
                window.livewire.emit('setProductTag', sku);
                tagModal.modal('show');
                setTimeout(showSelect, 2000);
            };

            let showSelect = () => {
                $(document).ready(function () {
                    $('#selectTags').select2({
                        tags: true,
                    });
                })
            };

            window.livewire.on('close_product_tag', function () {
                $('#addTag').modal('close');
            });
            let emitUpdate = () => {
                window.livewire.emit('tagUpdate', $('#selectTags').val());
            };
            let confirmDelete = () => {
                let id = $('#deleteId').val();
                // console.log(id);
                let url = '{{ route('control.product.delete') }}';
                let data = {'sku': id};
                $.ajax({
                    'url': url,
                    'type': 'post',
                    'data': data,
                    success: function (data) {
                        if (data.response == 'success') {
                            $('#title').text('');
                            $('#deleteId').val('');
                            $('#DM').modal('hide');
                            window.location.href = '{{ url() ->current()}}';
                        }
                        Livewire.emit('alert', [data.response, data.response]);
                    }
                });

            }
        </script>
    @endpush
</x-master-layout>
