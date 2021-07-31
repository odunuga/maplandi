<x-master-layout>
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6 mb-3">
                        <h4 class="page-title">Promotions</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Maplandi</a></li>
                            <li class="breadcrumb-item active">Promotions</li>
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
                                    <b class="h5 mt-0  mb-5 text-small">Promotions</b>
                                </div>
                                <div class="col-md-2 mb-3" style="margin-top:20px">
                                    <a class="btn btn-primary" href="javascript:void(0)"
                                       onclick="$('#addPromo').modal('show')">Add Promo </a>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="promotions" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col" colspan="2">Image</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Continuous</th>
                                        <th scope="col"> Actions</th>

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


    <div class="modal fade" id="addPromo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Promotion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">x
                    </button>
                </div>
                @livewire('admin.add-promotion')
            </div>
        </div>
    </div>


    <div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <i class=" fas fa-exclamation-circle text-warning" style="font-size:70px;"></i>
                    <h4>Delete Report by <span id="title"></span></h4>
                    <input hidden id="deleteId" name="deleteId"/>
                    <p>Users Report on products contribute to data analysis and might be useful in the future.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                    </button>
                    <button onclick="confirmDelete()" type="submit" class="btn btn-primary">Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            let deleteItem = (id, title) => {
                $('#title').text(title);
                $('#confirmDelete').modal('show');
                $('#deleteId').val(id);
            };
            let confirmDelete = () => {
                let id = $('#deleteId').val();
                // console.log(id);
                let url = '{{ route('control.product_report.delete') }}';
                let data = {'id': id};
                $.ajax({
                    'url': url,
                    'type': 'post',
                    'data': data,
                    success: function (data) {
                        if (data.response == 'success') {
                            $('#title').text('');
                            $('#deleteId').val('');
                            $('#confirmDelete').modal('hide');
                            window.location.href = '{{ url() ->current()}}';
                        }
                        Livewire.emit('alert', [data.response, data.response]);
                    }
                });
            };


        </script>
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript"
                src="https://cdn.datatables.net/v/dt/dt-1.10.25/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/r-2.2.9/sl-1.3.3/datatables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#promotions').DataTable({
                    ajax: {
                        type: "POST",
                        url: '{{ route('admin.latest_products') }}',
                        dataSrc: 'promotions'
                    },
                    columns: [
                        {
                            data: 'id'
                        },

                        {
                            data: 'image'
                        },
                        {
                            data: 'description',
                        },
                        {
                            data: 'start_date',
                        },
                        {
                            data: 'end_date',
                        },
                        {
                            data: 'continuous'
                        },
                        {
                            data: null,
                            render: function (data) {
                                return '<a   href="javascript:void(0)" onclick="deleteItem(' + data.id + ',\'' + data.title + '\')" class="btn btn-sm  text-danger" > Delete Report </a><br> ';
                            }
                        },

                    ]
                })
            });
        </script>
    @endpush
</x-master-layout>

