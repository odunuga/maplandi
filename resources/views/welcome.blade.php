<x-guest-layout>
    <!-- CART-->
    <div class="modal modal-dialog-scrollable fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">
                        <i class="lni lni-cart-full" style="color:red; font-size:25px;"></i>
                        Your Cart</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="text-dark"><b>Product Name </b></div>
                                Category : Phones
                            </div>
                            <div class="text-dark"><b>$200 </b></div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="text-dark"><b>Product Name </b></div>
                                Category : Phones
                            </div>
                            <div class="text-dark"><b>$200 </b></div>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="text-dark"><b>Product Name </b></div>
                                Category : Phones
                            </div>
                            <div class="text-dark"><b>$200 </b></div>
                        </li>

                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="text-dark"><b>TOTAL</b></div>
                            </div>
                            <div class="text-dark"><b>$600 </b></div>
                        </li>

                    </ol>
                </div>
                <div class="modal-footer">
                    <a class="btn" href="cart" class="btn btn-dark btn-lg ">
                        View Cart</a>
                </div>
            </div>
        </div>
    </div>

    <livewire:category/>

    <livewire:deals/>


    <!--LATEST PRODUCTS-->
    <section class="items-tab section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Latest Products</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Shop from varieties of our newly stocked products</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-latest-tab" data-bs-toggle="tab" data-bs-target="#nav-latest" type="button" role="tab" aria-controls="nav-latest" aria-selected="true">Latest Products</button>
                            <button class="nav-link" id="nav-popular-tab" data-bs-toggle="tab" data-bs-target="#nav-popular" type="button" role="tab" aria-controls="nav-popular" aria-selected="false">Popular Products</button>
                            <button class="nav-link" id="nav-random-tab" data-bs-toggle="tab" data-bs-target="#nav-random" type="button" role="tab" aria-controls="nav-random" aria-selected="false">Random Products</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-latest" role="tabpanel" aria-labelledby="nav-latest-tab">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-1.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Mobile</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Apple Iphone X</a>
                                            </h3>
                                            <ul class="info">
                                                <li class="price">$890.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-2.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Others</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Travel Kit</a>
                                            </h3>

                                            <ul class="info">
                                                <li class="price">$580.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-3.jpg/') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Electronic</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Nikon DSLR Camera</a>
                                            </h3>

                                            <ul class="info">
                                                <li class="price">$560.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-4.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Furniture</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Poster Paint</a>
                                            </h3>

                                            <ul class="info">
                                                <li class="price">$85.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-5.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Furniture</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Official Metting Chair</a>
                                            </h3>
                                            <ul class="info">
                                                <li class="price">$750.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-6.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge rent">Rent</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Books & Magazine</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Story Book</a>
                                            </h3>
                                            <ul class="info">
                                                <li class="price">$120.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-7.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Electronic</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Cctv camera</a>
                                            </h3>
                                            <ul class="info">
                                                <li class="price">$350.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-8.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Mobile</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Samsung Glalaxy S8</a>
                                            </h3>

                                            <ul class="info">
                                                <li class="price">$299.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <!--POPULAR PRODUCTS-->
                        <div class="tab-pane fade" id="nav-popular" role="tabpanel" aria-labelledby="nav-popular-tab">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-2.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Others</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Travel Kit</a>
                                            </h3>

                                            <ul class="info">
                                                <li class="price">$580.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-3.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Electronic</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Nikon DSLR Camera</a>
                                            </h3>
                                            <ul class="info">
                                                <li class="price">$560.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-1.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Mobile</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Apple Iphone X</a>
                                            </h3>
                                            <ul class="info">
                                                <li class="price">$890.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-4.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Furniture</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Poster Paint</a>
                                            </h3>

                                            <ul class="info">
                                                <li class="price">$85.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-7.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Electronic</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Cctv camera</a>
                                            </h3>

                                            <ul class="info">
                                                <li class="price">$350.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-8.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Mobile</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Samsung Glalaxy S8</a>
                                            </h3>

                                            <ul class="info">
                                                <li class="price">$299.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-5.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Furniture</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Official Metting Chair</a>
                                            </h3>

                                            <ul class="info">
                                                <li class="price">$750.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-6.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge rent">Rent</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Books & Magazine</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Story Book</a>
                                            </h3>

                                            <ul class="info">
                                                <li class="price">$120.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-random" role="tabpanel" aria-labelledby="nav-random-tab">
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-3.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Electronic</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Nikon DSLR Camera</a>
                                            </h3>

                                            <ul class="info">
                                                <li class="price">$560.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-4.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Furniture</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Poster Paint</a>
                                            </h3>

                                            <ul class="info">
                                                <li class="price">$85.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-5.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Furniture</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Official Metting Chair</a>
                                            </h3>

                                            <ul class="info">
                                                <li class="price">$750.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-1.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Mobile</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Apple Iphone X</a>
                                            </h3>

                                            <ul class="info">
                                                <li class="price">$890.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-2.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Others</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Travel Kit</a>
                                            </h3>

                                            <ul class="info">
                                                <li class="price">$580.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-6.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge rent">Rent</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Books & Magazine</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Story Book</a>
                                            </h3>
                                            <ul class="info">
                                                <li class="price">$120.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-7.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Electronic</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Cctv camera</a>
                                            </h3>
                                            <ul class="info">
                                                <li class="price">$350.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-3 col-md-4 col-12">

                                    <div class="single-item-grid">
                                        <div class="image">
                                            <a href="shop/product-details.html"><img src="{{ asset('vendor/images/items-tab/item-8.jpg') }}" alt="#"></a>
                                            <i class=" cross-badge lni lni-bolt"></i>
                                            <span class="flat-badge sale">Sale</span>
                                        </div>
                                        <div class="content">
                                            <a href="javascript:void(0)" class="tag">Mobile</a>
                                            <h3 class="title">
                                                <a href="shop/product-details.html">Samsung Glalaxy S8</a>
                                            </h3>

                                            <ul class="info">
                                                <li class="price">$299.00</li>
                                                <li class="like"><a href="javascript:void(0)"><i class="lni lni-cart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="how-works section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Shop With Ease </h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">We are here to assist you throughout your online shopping experience with us. We want to ensure that you have an easy and pleasant interaction throughout.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">

                    <div class="single-work wow fadeInUp" data-wow-delay=".2s">
                        <span class="serial" style="	border: 6px solid #dc3545;">01</span>
                        <h3>Create Account</h3>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-12">

                    <div class="single-work wow fadeInUp" data-wow-delay=".4s">
                        <span class="serial" style="	border: 6px solid #dc3545;">02</span>
                        <h3>Select your items</h3>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-12">

                    <div class="single-work wow fadeInUp" data-wow-delay=".6s">
                        <span class="serial" style="	border: 6px solid #dc3545;">03</span>
                        <h3>Checkout</h3>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="why-choose section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Why Choose Us</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">At Maplandi we are commited to delivering everything you could possibly need for life and living at the best prices than anywhere else.

                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="choose-content">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12">

                                <div class="single-list wow fadeInUp" data-wow-delay=".2s">
                                    <i class="lni lni-book"></i>
                                    <h4>Trustworthy</h4>
                                    <p>You can place your orders with a soothing relief and be rest assured to get the best from us.</p>
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-6 col-12">

                                <div class="single-list wow fadeInUp" data-wow-delay=".4s">
                                    <i class="lni lni-money-protection"></i>
                                    <h4>
                                        Affordable</h4>
                                    <p>We give the best prices better than anyone else</p>
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-6 col-12">

                                <div class="single-list wow fadeInUp" data-wow-delay=".6s">
                                    <i class="lni lni-cog"></i>
                                    <h4>Efficient</h4>
                                    <p>All our processes are well organized from account creation to order processing expect the best no less.</p>
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-6 col-12">

                                <div class="single-list wow fadeInUp" data-wow-delay=".2s">
                                    <i class="lni lni-pointer-up"></i>
                                    <h4>Quality</h4>
                                    <p>Our products are so quality that you can make your order with your eyes closed and still get the best</p>
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-6 col-12">

                                <div class="single-list wow fadeInUp" data-wow-delay=".4s">
                                    <i class="lni lni-layout"></i>
                                    <h4>Support</h4>
                                    <p>Our support teams are availaible 24/7 to attend to all your queries</p>
                                </div>

                            </div>
                            <div class="col-lg-4 col-md-6 col-12">

                                <div class="single-list wow fadeInUp" data-wow-delay=".6s">
                                    <i class="lni lni-delivery"></i>
                                    <h4>Nationwide Delivery</h4>
                                    <p>We deliver to all states in Nigeria</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title align-center gray-bg">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">What People Say</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">There are many variations of passages of Lorem
                            Ipsum available, but the majority have suffered alteration in some form.</p>
                    </div>
                </div>
            </div>
            <div class="row testimonial-slider">
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="single-testimonial">
                        <div class="quote-icon">
                            <i class="lni lni-quotation"></i>
                        </div>
                        <div class="product">
                            <img src="{{ asset('vendor/images/testimonial/testi1.jpg') }}" alt="#">
                            <h4 class="name">
                                Jane Anderson
                                <span class="deg">Founder & CEO</span>
                            </h4>
                        </div>
                        <div class="text">
                            <p>"It’s amazing how much easier it has been to meet new people and create instant
                                connections. I have the exact same personality, the only thing that has changed is my
                                mindset and a few behaviors."</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="single-testimonial">
                        <div class="quote-icon">
                            <i class="lni lni-quotation"></i>
                        </div>
                        <div class="product">
                            <img src="{{ asset('vendor/images/testimonial/testi2.jpg') }}" alt="#">
                            <h4 class="name">
                                Devid Samuyel
                                <span class="deg">Web Developer</span>
                            </h4>
                        </div>
                        <div class="text">
                            <p>"It’s amazing how much easier it has been to meet new people and create instant
                                connections. I have the exact same personality, the only thing that has changed is my
                                mindset and a few behaviors."</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-6 col-12">

                    <div class="single-testimonial">
                        <div class="quote-icon">
                            <i class="lni lni-quotation"></i>
                        </div>
                        <div class="product">
                            <img src="{{ asset('vendor/images/testimonial/testi3.jpg') }}" alt="#">
                            <h4 class="name">
                                Jully Sulli
                                <span class="deg">Ui/Ux Designer</span>
                            </h4>
                        </div>
                        <div class="text">
                            <p>"It’s amazing how much easier it has been to meet new people and create instant
                                connections. I have the exact same personality, the only thing that has changed is my
                                mindset and a few behaviors."</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="how-works section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Features </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">

                    <div class="single-work wow fadeInUp" data-wow-delay=".2s">
<span class="serial" style="border: 6px solid #dc3545;">
<i class="lni lni-support"></i>
</span>
                        <h3>24/7 Customer Support</h3>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-12">

                    <div class="single-work wow fadeInUp" data-wow-delay=".4s">
<span class="serial" style="border: 6px solid #dc3545;">
<i class="lni lni-checkmark-circle"></i>
</span>
                        <h3>Best Quality</h3>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-12">

                    <div class="single-work wow fadeInUp" data-wow-delay=".6s">
<span class="serial" style="	border: 6px solid #dc3545;">
&#x20A6;
</span>
                        <h3>Affordable Prices</h3>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="contact-us" class="contact-us section">
        <div class="container">
            <div class="contact-head wow fadeInUp" data-wow-delay=".4s">
                <div class="row">
                    <div class="col-lg-5 col-12">
                        <div class="single-head">
                            <div class="contant-inner-title">
                                <h2>Our Contacts & Location</h2>
                            </div>
                            <div class="single-info">
                                <h3>Opening hours</h3>
                                <ul>
                                    <li>Daily: 9.30 AM–6.00 PM</li>
                                    <li>Sunday & Holidays: Closed</li>
                                </ul>
                            </div>
                            <div class="single-info">
                                <h3>Contact info</h3>
                                <ul>
                                    <li>17, Freedom way, Ikate Lekki phase 1, Lagos, Nigeria.</li>
                                    <li><a href="https://demo.graygrids.com/cdn-cgi/l/email-protection#660f080009261f091314110304150f12034805090b"><span class="__cf_email__" data-cfemail="5a3f223b372a363f1a33343c3574393537">support@maplandi.com</span></a></li>
                                    <li><a href="tel:(617) 495-9400-326">(617) 495-9400-326</a></li>
                                </ul>
                            </div>
                            <div class="single-info contact-social">
                                <h3>Social contact</h3>
                                <ul>
                                    <li><a href="javascript:void(0)"><i class="lni lni-facebook-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-linkedin-original"></i></a></li>
                                    <li><a href="javascript:void(0)"><i class="lni lni-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-12">
                        <div class="form-main">
                            <div class="form-title">
                                <h2>Get in Touch</h2>
                                <p>Want to make a custom order, partnerships or other enquiries leave us a message</p>
                            </div>
                            <form class="form" method="post" action="https://demo.graygrids.com/themes/classigrids-demo/assets/mail/mail.php">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <input name="name" type="text" placeholder="Your Name" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <input name="subject" type="text" placeholder="Your Subject" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <input name="email" type="email" placeholder="Your Email" required="required">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-group">
                                            <input name="phone" type="text" placeholder="Your Phone" required="required">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group message">
                                            <textarea name="message" placeholder="Your Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group button">
                                            <button type="submit" class="btn ">Submit Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="map-section">
        <div class="map-container">
            <div class="mapouter">
                <div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.6799391919044!2d3.4795484144218287!3d6.435140225970408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bf5ca44a21425%3A0x3dd414b496b34543!2s17%20Freedom%20Way%2C%20Ikate%2C%20Bus%20Stop%20101001%2C%20Lekki!5e0!3m2!1sen!2sng!4v1625330874128!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <style>
                        .mapouter {
                            position: relative;
                            text-align: right;
                            height: 500px;
                            width: 100%;
                        }

                        .gmap_canvas {
                            overflow: hidden;
                            background: none !important;
                            height: 500px;
                            width: 100%;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>

    <div class="newsletter section" >
        <div class="container">
            <div class="inner-content">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="title">
                            <i class="lni lni-alarm"></i>
                            <h2>Newsletter</h2>
                            <p>Get Updates on New Products and Hot deals.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="form">
                            <form action="#" method="get" target="_blank" class="newsletter-form">
                                <input name="EMAIL" placeholder="Your email address" type="email">
                                <div class="button">
                                    <button class="btn">Subscribe<span class="dir-part"></span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
