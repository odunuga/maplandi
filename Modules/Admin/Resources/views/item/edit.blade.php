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




            <div class="row">
                <div class="col-lg-6">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <p class="sub-title">
                                ITEM DETAILS
                            </p>

                            <form id="newitem" class="" action="#">
                                <div class="form-group">
                                    <input type="text" class="form-control" required placeholder="Item Name"/>
                                </div>

                                <div class="form-group">
                                    <div>
                                        <input type="text" class="form-control mb-3" required
                                               placeholder="Item Price"/>
                                    </div>



                                    <div class="form-group">
                                        <div>
                                            <select class="form-control" aria-label="Default select example">
                                                <option selected>Select Category</option>
                                                <option value="Phones">Phones</option>
                                                <option value="hnes">hnes</option>
                                                <option value="Ps">Ps</option>
                                            </select>

                                        </div>



                                    </div>
                                    <hr class="divider"></hr>
                                </div>
                                <p class="sub-title">
                                    ITEM INFO
                                </p>
                                <div class="form-group">
                                    <div>
                                        <input type="text" class="form-control" required
                                               placeholder="Condition"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div>
                                        <input type="text" class="form-control" required
                                               placeholder="Brand"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div>
                                        <input type="text" class="form-control" required
                                               placeholder="Model"/>
                                    </div>
                                </div>





                                <div class="form-group">
                                    <label>Description</label>
                                    <div>
                                        <textarea required class="form-control" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">

                                </div>
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->

                <div class="col-lg-6">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">Image Upoad</h4>
                                            <p class="sub-title">supports (PNG & JPEG only 5MB Max file size).
                                            </p>

                                            <div class="m-b-30">
                                                <form id="itemimage" action="#" class="dropzone">
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple="multiple" required>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="text-center m-t-15">
                                                <button type="submit" form="itemimage" class="btn btn-primary waves-effect waves-light">
                                                    Add Images</button>

                                            </div>

                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div>
                                <button type="submit" form="newitem" class="btn btn-primary waves-effect waves-light">
                                    Update Changes
                                </button>

                            </div>
                            </form>



                        </div> <!-- end row -->


                    </div>
                    <!-- container-fluid -->

                </div>
                <!-- content -->








                <footer class="footer">
                    © Maplandi <span class="d-none d-sm-inline-block"> </span>.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
    </div>
    <!-- content -->
</x-master-layout>
