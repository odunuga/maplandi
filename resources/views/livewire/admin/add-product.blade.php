<form wire:submit.prevent="add_product" method="post">

    <div class="modal-body">
        <div class="form-group">
            @if (isset($image))
                <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail h-12">
            @endif
            <input type="file" wire:model="image" required>
            @error('image') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label>Other Images</label>
            <input type="file" wire:model="images" multiple>

            @error('images.*') <span class="error">{{ $message }}</span> @enderror

        </div>
        <div class="form-group">
            <label>Category</label>
            <select class="form-control" wire:model="cat" wire:change="selected_category()">
                <option value="">Select</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                @endforeach
            </select>
        </div>
        @if(isset($parameters))
            <label>Parameters</label>
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
            <label>Title</label>
            <input class="form-control" placeholder="Enter Product Title" wire:model.lazy="title" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea id="rich_description" class="form-control" wire:model.lazy="description" rows="5"
                      placeholder="Product Description" required>
            </textarea>
        </div>
        <div class="form-group">
            <label>Currency</label>
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
            <label>Cost</label>
            <input type="number" wire:model.lazy="price" placeholder="Product Cost" class="form-control" required/>
        </div>
        <div class="form-group">
            <label>Amount In Stock</label>
            <input type="number" class="form-control" wire:model.lazy="stock"/>
        </div>
        <div class="form-group">
            <label>Product Type</label>
            <select class="form-control" wire:model.lazy="product_type">
                <option value="">Select One</option>
                <option value="sell">Sell</option>
                <option value="rent">Rent</option>
            </select>
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
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-danger"> Add <i class="fa fa-spinner fa-spin" wire:loading></i>
        </button>
    </div>
</form>
