<section class="hero-area overlay">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                <div class="hero-text text-center">

                    <div class="section-heading">
                        <h2 class="wow fadeInUp" data-wow-delay=".3s">Welcome to {{ $site_settings->site_name }}</h2>
                        <p class="wow fadeInUp" data-wow-delay=".5s">{{ $site_settings->site_motto }}</p>
                    </div>


                    <div class="search-form wow fadeInUp" data-wow-delay=".7s">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-12 p-0">
                                <div class="search-input">
                                    <label for="keyword"><i class="lni lni-search-alt theme-color"></i></label>
                                    <input type="text" name="keyword" id="keyword" placeholder="Product keyword">
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-5 col-12 p-0">
                                <div class="search-input">
                                    <label for="category"><i class="lni lni-grid-alt theme-color"></i></label>
                                    <select name="category" id="category">
                                        <option value="none" selected disabled>Categories</option>
                                        <option value="none">Auto Accesories</option>
                                        <option value="none">Electronics</option>
                                        <option value="none">Phones</option>
                                        <option value="none">Furniture</option>
                                        <option value="none">Fashion</option>
                                        <option value="none">Computing</option>
                                        <option value="none">Education</option>
                                        <option value="none">Baby Products</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-5 p-0">
                                <div class="search-btn button">
                                    <button class="btn"><i class="lni lni-search-alt"></i> Search</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="categories">
    <div class="container">
        <div class="cat-inner">
            <div class="row">
                <div class="col-12 p-0">
                    <div class="category-slider">

                        <a href="shop/category.html" class="single-cat">
                            <div class="icon">
                                <img src="{{ asset('vendor/images/categories/car.svg') }}" alt="#">
                            </div>
                            <h3>Auto Accesories</h3>
                            <h5 class="total">35</h5>
                        </a>


                        <a href="shop/category.html" class="single-cat">
                            <div class="icon">
                                <img src="{{ asset('vendor/images/categories/laptop.svg') }}" alt="#">
                            </div>
                            <h3>Electronics</h3>
                            <h5 class="total">22</h5>
                        </a>


                        <a href="shop/category.html" class="single-cat">
                            <div class="icon">
                                <img src="{{ asset('vendor/images/categories/laptop.svg') }}" alt="#">
                            </div>
                            <h3>Computing</h3>
                            <h5 class="total">55</h5>
                        </a>


                        <a href="shop/category.html" class="single-cat">
                            <div class="icon">
                                <img src="{{ asset('vendor/images/categories/furniture.svg') }}" alt="#">
                            </div>
                            <h3>Furnitures</h3>
                            <h5 class="total">21</h5>
                        </a>


                        <a href="shop/category.html" class="single-cat">
                            <div class="icon">
                                <img src="{{ asset('vendor/images/categories/phone.svg') }}" alt="#">
                            </div>
                            <h3>Phones</h3>
                            <h5 class="total">44</h5>
                        </a>


                        <a href="shop/category.html" class="single-cat">
                            <div class="icon">
                                <img src="{{ asset('vendor/images/categories/fashion.svg') }}" alt="#">
                            </div>
                            <h3>Fashion</h3>
                            <h5 class="total">65</h5>
                        </a>


                        <a href="shop/category.html" class="single-cat">
                            <div class="icon">
                                <img src="{{ asset('vendor/images/categories/laptop.svg') }}" alt="#">
                            </div>
                            <h3>Education</h3>
                            <h5 class="total">35</h5>
                        </a>


                        <a href="shop/category.html" class="single-cat">
                            <div class="icon">
                                <img src="{{ asset('vendor/images/categories/hospital.svg') }}" alt="#">
                            </div>
                            <h3>Health & Beauty</h3>
                            <h5 class="total">22</h5>
                        </a>


                        <a href="shop/category.html" class="single-cat">
                            <div class="icon">
                                <img src="{{ asset('vendor/images/categories/tshirt.svg') }}" alt="#">
                            </div>
                            <h3>Fashion</h3>
                            <h5 class="total">25</h5>
                        </a>


                        <a href="shop/category.html" class="single-cat">
                            <div class="icon">
                                <img src="{{ asset('vendor/images/categories/education.svg') }}" alt="#">
                            </div>
                            <h3>Education</h3>
                            <h5 class="total">42</h5>
                        </a>


                        <a href="shop/category.html" class="single-cat">
                            <div class="icon">
                                <img src="{{ asset('vendor/images/categories/controller.svg') }}" alt="#">
                            </div>
                            <h3>Gadgets</h3>
                            <h5 class="total">32</h5>
                        </a>


                        <a href="shop/category.html" class="single-cat">
                            <div class="icon">
                                <img src="{{ asset('vendor/images/categories/travel.svg') }}" alt="#">
                            </div>
                            <h3>Backpacks</h3>
                            <h5 class="total">15</h5>
                        </a>


                        <a href="shop/category.html" class="single-cat">
                            <div class="icon">
                                <img src="{{ asset('vendor/images/categories/watch.svg') }}" alt="#">
                            </div>
                            <h3>Watches</h3>
                            <h5 class="total">65</h5>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
