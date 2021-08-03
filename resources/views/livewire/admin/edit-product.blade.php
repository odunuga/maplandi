<div class="row">
    <div class="col-lg-6">
        <div class="card m-b-30">
            <div class="card-body">

                <p class="sub-title">
                    ITEM DETAILS
                </p>
                <form id="newitem" wire:submit.prevent="update_product_details" method="post">
                    <div class="form-group">
                        <input type="text" wire:model.lazy="title" class="form-control" required
                               placeholder="Item Name"/>
                    </div>
                    <div class="form-group">
                        <select class="form-control" wire:model.lazy="currency_id" required>
                            <option>Select One</option>
                            @if(isset($currencies))
                                @foreach($currencies as $item)
                                    <option value="{{ $item->id }}">{{ $item->symbol }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">

                        <input type="number" wire:model.lazy="price" class="form-control mb-3" required
                               placeholder="Item Price"/>

                    </div>
                    <div class="form-group">

                        <input type="number" class="form-control" wire:model.lazy="stock" placeholder="Stock"/>
                    </div>
                    <div class="form-group">

                        <select class="form-control" wire:model="cat"
                                wire:change="selected_category()">
                            <option value="">Select</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <hr class="divider"></hr>

                    <p class="sub-title">
                        ITEM INFO
                    </p>
                    @if(isset($parameters))
                        @foreach($parameters as $para)
                            <div class="form-group">

                                @php
                                    $item = $para->properties;
                                    if($item){

                                     if($item->type=='input'){

                                         echo '<label for="'.$item->type_id.'" class="label">'.$item->type_name.'</label>';
                                         echo '<'.$item->type.' class="'.$item->class.'" wire:model.lazy="params.'.$item->type_id.'" name="'.$item->type_name.'" id="'.$item->type_id.'" />';
                                     }

                                   if($item->type=="textarea"){
                                       echo '<label for="'.$item->type_id.'" class="label">'.$item->type_name.'</label>';
                                    echo '<'.$item->type.' class="'.$item->class.'" wire:model.lazy="params.'.$item->type_id.'"  name="'.$item->type_name.'" id="'.$item->type_id.'"> </'.$item->type.'>';
                                   }


                                   if($item->type=="select"){
                                    $items = '';
                                    foreach($item->attributes as $each){
                                    $items.='<option value="'.$each.'">'.$each.'</option>';
                                    }

                                    echo '<label for="'.$item->type_id.'" class="label">'.$item->type_name.'</label>';
                                    echo '<'.$item->type.' class="'.$item->class.'" id="'.$item->type_id.'"  wire:model.lazy="params.'.$item->type_id.'" name="'.$item->type_name.'"><option>Select</option>'.$items.' </'.$item->type.'>';
                                    }
                                     if($item->type=="radio"){
               echo '<'.$item->type.' class="'.$item->class.'" wire:model.lazy="params.'.$item->type_id.'"  name="'.$item->type_name.'" id="'.$item->type_id.'"> </'.$item->type.'>';
                    echo '<label for="'.$item->type_id.'" class="label">'.$item->type_name.'</label>';
               }

                                     if($item->type=="checkbox"){
                                         echo '<'.$item->type.' class="'.$item->class.'" wire:model.lazy="params.'.$item->type_id.'"  name="'.$item->type_name.'" id="'.$item->type_id.'"> </'.$item->type.'>';
                                         echo '<label for="'.$item->type_id.'" class="label">'.$item->type_name.'</label>';
                                     }
                                    }else{
                                    echo'<i class="lni  lni-empty-file"></i> No Parameters ';}
                                @endphp
                            </div>

                        @endforeach
                    @endif
                    <div class="form-group">
                        <label>Description</label>
                        <textarea id="rich_description" class="form-control" wire:model.lazy="description"
                                  rows="5"
                                  placeholder="Product Description" required>
            </textarea>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" wire:model.lazy="featured" class="check-and-pass">
                        <label>Featured</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" wire:model.lazy="available" class="check-and-pass">
                        <label>Available</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" wire:model.lazy="hot" class="check-and-pass">
                        <label>Hot</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" wire:model.lazy="published" class="check-and-pass">
                        <label>Published</label>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            Update Changes
                        </button>

                    </div>
                </form>

            </div>
        </div>
    </div> <!-- end col -->

    <div class="col-lg-6">
        <div class="card m-b-30">
            <div class="card-body">
                <form wire:submit.prevent="update_images" class="dropzone">
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Display Image</h4>
                                    @if (isset($image))
                                        <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail h-12">
                                    @elseif (isset($uploaded_image))
                                        <img src="{{ $uploaded_image }}" class="img-thumbnail h-12">
                                    @endif
                                    <p class="sub-title">supports (PNG & JPEG only 5MB Max file size).
                                    </p>

                                    <div class="m-b-30">
                                        <div class="fallback">
                                            <input wire:model="image" type="file" >
                                        </div>
                                    </div>

                                    {{--                                    <div class="text-center m-t-15">--}}
                                    {{--                                        <button type="submit" form="itemimage"--}}
                                    {{--                                                class="btn btn-primary waves-effect waves-light">--}}
                                    {{--                                            Add Images--}}
                                    {{--                                        </button>--}}
                                    {{--                                    </div>--}}

                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Other Images Upload</h4>
                                    <p class="sub-title">supports (PNG & JPEG only 5MB Max file size).
                                    </p>
                                    <div class="m-b-30">
                                        <div class="fallback">
                                            <input wire:model="images" type="file" multiple="multiple">
                                        </div>
                                    </div>

                                    {{--                                    <div class="text-center m-t-15">--}}
                                    {{--                                        <button type="submit" form="itemimage"--}}
                                    {{--                                                class="btn btn-primary waves-effect waves-light">--}}
                                    {{--                                            Add Images--}}
                                    {{--                                        </button>--}}
                                    {{--                                    </div>--}}

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->

                    <div>
                        <button type="submit" wire:loading.attr="disabled" wire:target="images"
                                class="btn btn-primary waves-effect waves-light">
                            Upload Images
                        </button>

                    </div>
                </form>
            </div> <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- content -->

</div>
