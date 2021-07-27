<x-master-layout>
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6 mb-3">
                        <h4 class="page-title">Orders</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Maplandi</a></li>
                            <li class="breadcrumb-item active">Orders</li>
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
                                <table id="orders" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Reference</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Payment Status</th>
                                        <th scope="col">Delivered?</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Actions</th>
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


            <!--PAGINATION-->
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
                $('#orders').DataTable({
                    ajax: {
                        type: "POST",
                        url: '{{ route('admin.orders') }}',
                        dataSrc: 'orders'
                    },
                    columns: [
                        {
                            data: 'id'
                        },
                        {
                            data: 'reference'
                        },

                        {
                            data: 'customer'
                        },
                        {
                            data: 'amount'
                        },
                        {
                            data: 'location'
                        },
                        {
                            data: 'status'
                        },
                        {
                            data: 'delivered'
                        },
                        {
                            data: 'date'
                        },
                        {
                            data: null,
                            render: function (data) {
                                return "<a href='{{ url('control-room/order') }}/" + data.id + "'><i class='fa fa-pencil-alt text-success'></i></a>";
                            }
                        }
                    ]
                })
            });
        </script>
    @endpush
</x-master-layout>
