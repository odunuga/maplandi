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
            <div class="row">
                <div class="col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10 ">
                                    <b class="h5 mt-0  mb-5 text-small">Users List</b>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="users" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Verified</th>
                                        <th scope="col">state</th>
                                        <th scope="col"> country</th>
                                        <th scope="col">Image</th>
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
        </div>
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
                $('#users').DataTable({
                    ajax: {
                        type: "POST",
                        url: '{{ route('admin.users') }}',
                        dataSrc: 'users'
                    },
                    columns: [
                        {
                            data: 'id'
                        },
                        {
                            data: 'name'
                        },
                        {
                            data: 'email'
                        },
                        {
                            data: 'phone'
                        },
                        {
                            data: 'verified'
                        },
                        {
                            data: 'state'
                        },
                        {
                            data: 'country'
                        },
                        {
                            data: null,
                            render: function (data) {
                                return '<img src="' + data.image + '" class="img-fluid h-25 rounded-2" />';
                            }
                        },
                        {
                            data: null,
                            render: function (data) {
                                return '<i class="fa fa-eye"></i>'
                            }
                        }

                    ]
                })
            });
        </script>
    @endpush
</x-master-layout>
