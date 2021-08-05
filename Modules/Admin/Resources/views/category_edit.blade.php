<x-master-layout>
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6 mb-3">
                        <h4 class="page-title">Category</h4>
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
                                    <b class="h5 mt-0  mb-5 text-small">Edit Category</b>
                                </div>
                            </div>

                            <div class="table-responsive" style="margin-top:10px">
                                <form action="{{ route('control.category.update') }}" method="post"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$category->id}}"/>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="label">Parent Category</label>
                                            <select class="form-control" name="category_id"
                                                    title="Select Category Which product is under">
                                                <option value=""
                                                        readonly>{{ isset($category->category)?$category->category->title:'None' }}</option>
                                                @if(isset($categories))
                                                    @foreach($categories as $cat)
                                                        <option value="{{ $cat->id }}"
                                                                @if($cat->id ===$category->id) readonly="" @endif >{{
                                                            $cat->title }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" name="title" placeholder="Enter Category name"
                                                   value="{{ $category->title }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="label"><i
                                                    class="fa fa-shopping-bag"></i> {{ __('texts.add_icon') }}</label>
                                            <input id="image" hidden type="file" name="icon"
                                                   onchange="$('#ready').show()"> <small id="ready"
                                                                                         style="display: none">(Ready)</small>
                                            @error('icon') <span class="error">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-danger">Update Category
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-master-layout>

