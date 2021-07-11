<div class="col-12">
    <div class="category-grid-topbar">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <h6 class="text-dark">
                    <marquee>{{ $title }} </marquee>
                </h6>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-grid-tab"
                                data-bs-toggle="tab" data-bs-target="#nav-grid"
                                type="button" role="tab" aria-controls="nav-grid"
                                aria-selected="true"><i class="lni lni-grid-alt"></i>
                        </button>
                        <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-list" type="button" role="tab"
                                aria-controls="nav-list" aria-selected="false"><i
                                class="lni lni-list"></i></button>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="tab-content" id="nav-tabContent">
        <!--PRODUCT GRID ARRANGEMENT-->
        <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
             aria-labelledby="nav-grid-tab">
            <div class="row">
                @isset($products)
                    @foreach($products as $item)
                        <livewire:grid-products :item="$item" :key="'grid'.$item->id"/>
                    @endforeach
                @endisset
            </div>
            <div class="row">
                <div class="col-12">
                    @isset($products)
                        <div class="pagination left">

                            {{ $products->links() }}
                            {{--                                                                                    <ul class="pagination-list">--}}
                            {{--                                                                                        <li><a href="javascript:void(0)">1</a></li>--}}
                            {{--                                                                                        <li class="active"><a href="javascript:void(0)">2</a></li>--}}
                            {{--                                                                                        <li><a href="javascript:void(0)">3</a></li>--}}
                            {{--                                                                                        <li><a href="javascript:void(0)">4</a></li>--}}
                            {{--                                                                                        <li><a href="javascript:void(0)"><i--}}
                            {{--                                                                                                    class="lni lni-chevron-right"></i></a></li>--}}
                            {{--                                                                                    </ul>--}}
                        </div>
                    @endisset
                </div>
            </div>
        </div>


        <!--END OF PRODUCT GRID ARRANGEMENT-->

        <!--PRODUCT LIST ARRANGEMENT-->
        <div class="tab-pane fade" id="nav-list" role="tabpanel"
             aria-labelledby="nav-list-tab">
            <div class="row">
                @isset($products)
                    @foreach($products as $item)
                        <livewire:list-products :item="$item" :key="'list'.$item->id"/>
                    @endforeach
                @endisset

            </div>

            <!--END OF PRODUCT LIST ARRANGEMENT-->
            <div class="row">
                <div class="col-12">
                    @isset($products)
                        <div class="pagination left">
                            {{ $products->links() }}
                            {{--                            <ul class="pagination-list">--}}
                            {{--                                <li><a href="javascript:void(0)">1</a></li>--}}
                            {{--                                <li class="active"><a href="javascript:void(0)">2</a></li>--}}
                            {{--                                <li><a href="javascript:void(0)">3</a></li>--}}
                            {{--                                <li><a href="javascript:void(0)">4</a></li>--}}
                            {{--                                <li><a href="javascript:void(0)"><i--}}
                            {{--                                            class="lni lni-chevron-right"></i></a></li>--}}
                            {{--                            </ul>--}}
                        </div>
                    @endisset
                </div>
            </div>

        </div>
    </div>
</div>
