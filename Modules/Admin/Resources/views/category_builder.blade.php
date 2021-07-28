<x-master-layout>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>

    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6 mb-3">
                        <h4 class="page-title">Items Menu</h4>
                    </div>

                    {{--                    <div class="alert alert-success" role="alert">--}}
                    {{--                        <strong>Well done!</strong> You successfully Posted an Item.--}}
                    {{--                    </div>--}}


                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Maplandi</a></li>
                            <li class="breadcrumb-item active">Items Menu</li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <div class="col">

                <!-- end page-title -->
                <b class="h5 mt-0  mb text-small">{{ $category->title }} Category Builder </b>
                <a class="btn btn-primary align-right" href="javascript:void(0)"
                   onclick="$('#addParameter').modal('show')">Add Parameter </a>
                <ul class="list-group" style="margin-top:12px;">
                    @if(isset($parameters) && count($parameters)>0)
                        @foreach($parameters as $para)
                            @livewire('admin.parameter',['parameter'=>$para,'cat_id'=>$category->id])
                        @endforeach
                    @else
                        <li class="text-center text-danger">No Parameters</li>
                    @endif
                </ul>

            </div>
        </div>
        <div class="row">

            <div class="col">

                <div class="row" style="margin-top:20px">
                    <div class="col-xl-12">
                        <div class="card m-b-30">

                            <div class="card-body">
                                @if(isset($parameters) && count($parameters)>0)
                                    @foreach($parameters as $para)
                                        <div class="d-flex ">
                                            <div class="mx-4 my-1">
                                                <label>{{ $para->title }}</label></div>
                                            @if(isset($para->properties))
                                                <div class="mx-4 my-1">
                                                    @php
                                                        $item = $para->properties;


                                                         if($item->type=='input')
                                                             echo '<'.$item->type.' class="'.$item->class.'" name="'.$item->type_name.'" id="'.$item->type_id.'" />';
                                                       if($item->type=="textarea")
                                                        echo '<'.$item->type.' class="'.$item->class.'" name="'.$item->type_name.'" id="'.$item->type_id.'"> </'.$item->type.'>';

                                                       if($item->type=="select"){
                                                        $items = '';
                                                        foreach($item->attributes as $each){
                                                        $items.='<option value="'.$each.'">'.$each.'</option>';
                                                        }
                                                        echo '<'.$item->type.' class="'.$item->class.'" id="'.$item->type_id.'" name="'.$item->type_name.'"><option>Select</option>'.$items.' </'.$item->type.'>';
                                                        }


                                                    @endphp

                                                </div>
                                            @endif
                                            <div class="mx-4 my-1">
                                                <button class="btn btn-secondary btn-sm"
                                                        onclick="buildParameter({{json_encode($para)}})">
                                                    Build
                                                </button>
                                            </div>

                                        </div>
                                    @endforeach

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addParameter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category Parameter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">x
                    </button>
                </div>
                @livewire('admin.add-parameter',['category'=>$category])
            </div>
        </div>
    </div>
    <div class="modal fade" id="buildParameter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Build Parameter</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">x
                    </button>
                </div>
                @livewire('admin.build-parameter',['category'=>$category])
            </div>
        </div>
    </div>

    @push('scripts')

        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <script>
            let buildParameter = (data) => {
                Livewire.emit('BuildApp', data);
                $('#buildParameter').modal('show');

            };

        </script>
    @endpush
</x-master-layout>
