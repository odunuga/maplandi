<x-app-layout>
    <section class="item-details section" style="margin-top:60px">
        <div class="container">
            <div class="top-area">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                    @isset($product->image)
                                        <img src="{{ $product->image_url }}" id="current"
                                             alt="{{ $product->title }} thumbnail">
                                    @endisset
                                </div>
                                @isset($product->images)
                                    <div class="images">
                                        @foreach($product->images as $imgs)
                                            <img src="{{ asset($imgs->url) }}" class="img" alt="#">
                                        @endforeach
                                    </div>
                                @endisset
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info ">
                            <h2 class="title">{{ $product->title }}</h2>
                            <div class="list-info mb-3">

                                <h4>{{__('shop.information')}}</h4>
                                <ul>
                                    <li><span>Category:</span>{{ $product->category? $product->category->title:'' }}
                                    </li>
                                    @isset($product->parameters)
                                        @foreach($product->parameters as $para)
                                            <li><span>{{ $para->title }}:</span> {{ $para->pivot->value }}</li>
                                        @endforeach
                                    @endisset
                                </ul>
                            </div>
                            <livewire:rating :deal="$product" :key="$product->id" class="flex flex-inline"/>
                            <br/>
                            <div class="price my-2 text-semibold">
                                @if(isset($product->currency) && $product->currency->code!=get_user_currency()['code'])
                                    {{ currency_with_price($product->price,$product->currency->code) }}
                                    ~ {{ convert_to_user_currency($product->price,$product->currency->code) }}
                                @else
                                    {{ currency_with_price($product->price,$product->currency->code) }}
                                @endif
                            </div>
                            <!--ADD TO CART BUTTON-->
                            <livewire:add-to-cart :product="$product" :key="$product->sku" :text="true"/>
                            <div class="social-share">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item-details-blocks">
                <div class="row ">
                    <div class="col-lg-8 col-md-7 col-12">

                        <div class="single-block description">
                            <h3>{{__('shop.description')}}</h3>
                            {!! $product->description !!}
                        </div>
                        <div class="single-block comments">
                            <h3>{{__('shop.comments')}}</h3>
                            @if($comments)
                                @foreach($comments as $comment)
                                    <livewire:single-comment :comment="$comment" key="{{$comment->id}}"/>
                                @endforeach
                            @else
                                <p class="text-center p-6">{{ __('comments') }}</p>
                            @endif
                        </div>
                        <div class="pagination pagination-sm">
                            {{ $comments->links() }}
                        </div>
                        @livewire('product-comment',['product_id'=>$product->id])
                    </div>
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="item-details-sidebar">
                            <div class="single-block tags">
                                @isset($product->tags)
                                    <h3>{{ __('shop.tags') }}</h3>
                                    <ul>
                                        @foreach($product->tags as $tag)
                                            <li><a href="javascript:void(0)">{{ $tag->title }}</a></li>
                                        @endforeach
                                    </ul>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
