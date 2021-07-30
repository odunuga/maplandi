<section class="category-page section" style="margin-top:60px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-12">
                <div class="category-sidebar">

                    <div class="single-widget search">
                        <h3>Search Items</h3>
                        <form method="get" wire:submit.prevent="submitSearch">
                            <input wire:model.defer="search" type="text" placeholder="Search Here..."/>
                            <button type="submit"><i class="lni lni-search-alt"></i></button>
                        </form>
                    </div>

                    <div class="single-widget">
                        <h3>All Categories</h3>
                        <ul class="list">
                            <li>
                                <a href="javascript:void(0)" wire:click="filterCategory('*')">
                                    <i class="lni lni-home"></i> All
                                    <span>{{ product_count() }}</span>
                                </a>
                            </li>
                            @isset($categories)
                                @foreach($categories as $cat)
                                    <li>
                                        <a href="javascript:void(0)" wire:click="filterCategory('{{$cat->slug}}')">
                                            <img src="{{ asset($cat->image_url) }}"
                                                 alt="{{ $cat->title }} thumbnail"
                                                 style="height:1.5em"> {{ $cat->title }}
                                            <span>{{ format_number($cat->products->count()) }}</span></a>
                                    </li>

                                @endforeach
                            @endisset
                        </ul>
                    </div>

                    <div class="single-widget range">
                        <h3>Price Range</h3>
                        <input type="range" class="form-range" name="range" step="100" min="1000" max="900000"
                               value="900000"
                               wire:model="range" ondragover="rangePrimary.value='{{$range}}'"
                            {{--
                            Livewire.emit('newRange',value)--}}
                        >
                        <div class="range-inner">
                            {{--                            <label>$</label>--}}
                            <input type="text" id="rangePrimary"
                                   value="{{currency_with_price($range,get_user_currency()['code'])}}"
                                   placeholder="100"/>
                        </div>
                    </div>

                    <!--ADVERT BANNER-->
                    <div class="single-widget banner">
                        <h3>Advertisement</h3>
                        <a href="javascript:void(0)">
                            <img src="{{ asset('vendor/images/banner/banner.jpg') }}" alt="#">
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-12">
                <div class="category-grid-list">
                    <div class="row">
                        <livewire:filter-products :title="$title" :params="$params" key="{{ now() }}"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
