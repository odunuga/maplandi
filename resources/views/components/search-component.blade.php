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
                                        <option value="" selected disabled>Categories</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->slug }}">{{ $cat->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-5 p-0">
                                <div class="search-btn button">
                                    <button class="btn" onclick="search()"><i class="lni lni-search-alt"></i> Search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        let search = () => {
                            let k = document.getElementById('keyword');
                            let c = document.getElementById('category');

                            if (c.value === "") {
                                alert("select Category first");
                            } else if (k.value === "") {
                                alert("What are we searching for?")
                            } else {
                                let newUrl = '{{ route('shop') }}' + '?query=' + k.value.trim() + '&category=' + c.value.trim();
                                window.location.replace(newUrl);
                                // console.log(newUrl)
                            }
                        }
                    </script>

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
                        @foreach($categories as $cat)
                            <a href="{{ url('shop').'?category='.$cat->slug.'&'.http_build_query(request()->except('category')) }}"
                               class="single-cat">
                                <div class="icon">
                                    <img src="{{ asset($cat->image->url) }}" alt="{{ $cat->title }} thumbnail">
                                </div>
                                <h3>{{ $cat->title }}</h3>
                                <h5 class="total">{{ $cat->products->count() }}</h5>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
