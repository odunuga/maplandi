<x-master-layout>
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6 mb-3">
                        <h4 class="page-title">History</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Maplandi</a></li>
                            <li class="breadcrumb-item active">History</li>
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
                                    <b class="h5 mt-0  mb-5 text-small">Transaction History</b>
                                </div>


                            </div>


                            <div class="table-responsive" style="margin-top:10px">
                                <table id="trans" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Item</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Invoice</th>

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
                $('#trans').DataTable({
                    ajax: {
                        type: "POST",
                        url: '{{ route('admin.transactions') }}',
                        dataSrc: 'transactions'
                    },
                    columns: [
                        {
                            data: 'id'
                        },
                        {
                            data: 'customer'
                        },
                        {
                            data: null,
                            render: function (data) {
                                let list = '<ul>';
                                for (let x = 0; x < data.items.length; x++) {
                                    console.log(data.items[x]);
                                    list += '<li>' + data.items[x] + ' - ' + data.items[x][1] + '</li>';
                                }
                                list += '</ul>';
                                return list;
                            }
                        },
                        {
                            data: 'amount',
                        },
                        {
                            data: 'location',
                        },
                        {
                            data: 'date',
                        },

                        {
                            data: null,
                            render: function (data) {

                                return '<a href="' + data.invoice + '"  class="btn btn-sm btn-primary" >Invoice</a>';
                            }
                        },

                    ]
                })
            });
        </script>
    @endpush
</x-master-layout>
