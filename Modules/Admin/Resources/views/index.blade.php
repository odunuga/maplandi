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
        @include('admin::partials.dashboard_menu')

        <!-- START ROW -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10 ">
                                    <b class="h5 mt-0  mb-5 text-small">Newly Posted Items</b>

                                </div>


                            </div>

                            <div class="table-responsive">
                                <table id="orders" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Parameters</th>
                                        <th scope="col">Published</th>
                                        <th scope="col">Featured</th>
                                        <th scope="col">Hot</th>
                                        <th scope="col"> Price</th>
                                        <th scope="col" colspan="2">Image</th>
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
                $('#orders').DataTable({
                    ajax: {
                        type: "POST",
                        url: '{{ route('admin.latest_products') }}',
                        dataSrc: 'orders'
                    },
                    columns: [
                        {
                            data: 'id'
                        },
                        {
                            data: 'title'
                        },
                        {
                            data: null,
                            render: function (data) {
                                let prep = '<ul class="list-group">';
                                if (data.parameters) {
                                    for (prop in data.parameters) {
                                        prep += '<li class="list-group-item border-0"> ' + `${prop} - ${data.parameters[prop]}` + '</li>';
                                    }
                                }
                                prep += '</ul>';
                                console.log(prep);
                                return prep;
                            }
                        },
                        {
                            data: null,
                            render: function (data) {
                                return data.published === true ? '<i class="fa fa-check fa-3x text-success"></i>' : '<i class="fa fa-times fa-3x text-danger"></i>';

                            }
                        },
                        {
                            data: null,
                            render: function (data) {
                                return data.featured === true ? '<i class="fa fa-check fa-3x text-success"></i>' : '<i class="fa fa-times fa-3x text-danger"></i>';
                            }
                        },
                        {
                            data: 'hot',
                            render: function (data) {
                                return data.hot === true ? '<i class="fa fa-check fa-3x text-success"></i>' : '<i class="fa fa-times fa-3x text-danger"></i>';
                            }
                        },
                        {
                            data: 'price'
                        },
                        {
                            data: null,
                            render: function (data) {
                                return '<img src="' + data.image + '" class="img-fluid h-25" />';
                            }
                        },

                    ]
                })
            });
        </script>
    @endpush
</x-master-layout>

