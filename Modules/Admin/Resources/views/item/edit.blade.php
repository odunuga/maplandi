<x-master-layout>
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6 mb-3">
                        <h4 class="page-title">Edit item</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Maplandi</a></li>
                            <li class="breadcrumb-item active">Edit Item</li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end page-title -->
            @livewire('admin.edit-product',['product'=>$product])
        </div>
    </div>
    <!-- content -->

</x-master-layout>
