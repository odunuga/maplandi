<section class="category-page section" style="margin-top:60px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-12">
                <div class="category-sidebar">

                    <div class="single-widget search">
                        <h3>Search Items</h3>
                        <form action="#">
                            <input type="text" placeholder="Search Here..."/>
                            <button type="submit"><i class="lni lni-search-alt"></i></button>
                        </form>
                    </div>

                    <div class="single-widget">
                        <h3>All Categories</h3>
                        <ul class="list">
                            @isset($categories)
                                @foreach($categories as $cat)
                                    <li>
                                        <a href="#" wire:click="filterCategory('{{$cat->slug}}')">
                                            <img src="{{ asset($cat->image->url) }}"
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
                        <input type="range" class="form-range" name="range" step="1" min="100" max="1000000" value="10"
                               onchange="rangePrimary.value=value;Livewire.emit('newRange',value)">
                        <div class="range-inner">
                            <label>$</label>
                            <input type="text" id="rangePrimary" placeholder="100"/>
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
                        <livewire:filter-products :title="$title" :filters="$filters"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
