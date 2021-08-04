<x-master-layout>
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6 mb-3">
                        <h4 class="page-title"> Testimonies</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Maplandi</a></li>
                            <li class="breadcrumb-item active">Testimonies</li>
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
                                    <b class="h5 mt-0  mb-5 text-small">Testimonies</b>
                                </div>
                                <div class="col-md-2 mb-3" style="margin-top:20px">
{{--                                    <a class="btn btn-secondary" href="javascript:void(0)"--}}
{{--                                       onclick="$('#add').modal('show')">Add Item </a>--}}
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="test" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Comment By</th>
                                        <th scope="col">Body</th>
                                        <th scope="col">Published</th>
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

        </div>
        <!-- container-fluid -->
    </div>
    <!-- content -->
    <!--DELETE ITEM Modal -->
    <div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <i class=" fas fa-exclamation-circle text-warning" style="font-size:70px;"></i>
                    <h4>Delete <span id="title"></span> Testimony?</h4>
                    <input hidden id="deleteId" name="deleteId"/>
                    <p> Are you sure? You won't be able to revert this! </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                    </button>
                    <button onclick="confirmDelete()" type="submit" class="btn btn-danger">Delete
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addTest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Tags</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">x
                    </button>
                </div>
                @livewire('admin.edit-testimony')
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
                let url = '{{ route('control.testimony.delete') }}';
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
                            window.location.href = '{{ url()->current()}}';
                        }
                        Livewire.emit('alert', [data.response, data.response]);
                    }
                });
            }
            let editItem = (id, title) => {
                Livewire.emit('editTestimony', {id: id, title: title});
                $('#addTest').modal('show');
            }
        </script>
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript"
                src="https://cdn.datatables.net/v/dt/dt-1.10.25/b-1.7.1/b-colvis-1.7.1/b-html5-1.7.1/b-print-1.7.1/r-2.2.9/sl-1.3.3/datatables.min.js"></script>
        <script>
            $(document).ready(function () {
                $('#test').DataTable({
                    ajax: {
                        type: "POST",
                        url: '{{ route('admin.testimonies') }}',
                        dataSrc: 'tests'
                    },
                    columns: [
                        {
                            data: 'id'
                        },
                        {
                            data: 'comment_by'
                        },
                        {
                            data: 'body'
                        },
                        {
                            data: 'publish'
                        },
                        {
                            data: null,
                            render: function (data) {
                                return '<a  href="javascript:void(0)" onclick="editItem(' + data.id + ',\'' + data.comment_by + '\')" class="btn btn-sm text-dark" > Edit </a>' + '<a  href="javascript:void(0)" onclick="deleteItem(' + data.id + ',\'' + data.comment_by + '\')" class="btn btn-sm text-danger" > Delete </a>';
                            }
                        },

                    ]
                })
            });
        </script>
    @endpush
</x-master-layout>

