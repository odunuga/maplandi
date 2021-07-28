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
                                <table id="stock" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Parameters</th>
                                        <th scope="col">Hot</th>
                                        <th scope="col">Featured</th>
                                        <th scope="col">Published</th>
                                        <th scope="col">Product Type</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- END ROW -->

            {{--            <!--PAGINATION-->--}}
            {{--            <nav aria-label="Page navigation example">--}}
            {{--                <ul class="pagination justify-content-end">--}}
            {{--                    <li class="page-item disabled">--}}
            {{--                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>--}}
            {{--                    </li>--}}
            {{--                    <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
            {{--                    <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
            {{--                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
            {{--                    <li class="page-item">--}}
            {{--                        <a class="page-link" href="#">Next</a>--}}
            {{--                    </li>--}}
            {{--                </ul>--}}
            {{--            </nav>--}}

        </div>
        <!-- container-fluid -->
    </div>
    <!-- content -->

    @push('scripts')
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript"
                src="https://cdn.datatables.net/v/dt/dt-1.10.25/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/r-2.2.9/sl-1.3.3/datatables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#stock').DataTable({
                    ajax: {
                        type: "POST",
                        url: '{{ route('admin.stocks') }}',
                        dataSrc: 'stocks'
                    },
                    columns: [
                        {
                            data: 'id'
                        },
                        {
                            data: null,
                            render: function (data) {
                                return '<img src="' + data.image + '" class="img-fluid h-25 rounded-2" />';
                            }
                        },

                        {
                            data: 'title'
                        },
                        {
                            data: 'amount'
                        },
                        {
                            data: null,
                            render: function (data) {
                                let stock = data.stock;
                                let text = '<span class="text-success">' + stock + '</span>';
                                if (stock < 10) {
                                    text = '<span class="text-danger">' + stock + '</span>';
                                } else if (stock >= 10 && stock <= 20) {
                                    text = '<span class="text-info">' + stock + '</span>';
                                }
                                return text;
                            }
                        },
                        {
                            data: null,
                            render: function (data) {
                                let prep = '<ul class="flex list-unstyled">';
                                if (data.parameters) {
                                    for (prop in data.parameters) {
                                        prep += '<li class="flex-row border-0"> ' + `${prop} - ${data.parameters[prop]}` + '</li>';
                                    }
                                }
                                prep += '</ul>';
                                return prep;
                            }
                        },
                        {
                            data: 'hot',
                            render: function (data) {
                                return data.hot === true ? '<i class="fa fa-check fa-2x text-success"></i>' : '<i class="fa fa-times fa-2x text-danger"></i>';
                            }
                        },
                        {
                            data: null,
                            render: function (data) {
                                return data.featured === true ? '<i class="fa fa-check fa-2x text-success"></i>' : '<i class="fa fa-times fa-2x text-danger"></i>';
                            }
                        },
                        {
                            data: null,
                            render: function (data) {
                                return data.published === true ? '<i class="fa fa-check fa-2x text-success"></i>' : '<i class="fa fa-times fa-2x text-danger"></i>';

                            }
                        },
                        {
                            data: null,
                            render: function (data) {
                                let style = '';
                                if (data.product_type == 'rent') {
                                    style = 'text-success';
                                }
                                if (data.product_type == 'sell') {
                                    style = 'text-danger';
                                }
                                return '<span class="' + style + '">' + data.product_type + ' </span>';
                            }
                        },
                        {
                            data: null,
                            render: function (data) {
                                return '<a href="{{ url('control-room/product/') }}/' + data.sku + '/edit">Edit</a >';
                            }
                        }
                    ]
                })
            });
        </script>
    @endpush
</x-master-layout>
