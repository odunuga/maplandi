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
                            <li>
                                <a href="category.html"><i class="lni lni-dinner"></i> Hotel &
                                    Travels<span>15</span></a>
                            </li>
                            <li>
                                <a href="category.html"><i class="lni lni-control-panel"></i> Services
                                    <span>20</span></a>
                            </li>
                            <li>
                                <a href="category.html"><i class="lni lni-bullhorn"></i> Marketing
                                    <span>55</span></a>
                            </li>
                            <li>
                                <a href="category.html"><i class="lni lni-home"></i> Real Estate<span>35</span></a>
                            </li>
                            <li>
                                <a href="category.html"><i class="lni lni-bolt"></i> Electronics <span>60</span></a>
                            </li>
                            <li>
                                <a href="category.html"><i class="lni lni-tshirt"></i> Dress & Clothing
                                    <span>55</span></a>
                            </li>
                            <li>
                                <a href="category.html"><i class="lni lni-diamond-alt"></i> Jewelry & Accessories
                                    <span>45</span></a>
                            </li>
                        </ul>
                    </div>

                    <div class="single-widget range">
                        <h3>Price Range</h3>
                        <input type="range" class="form-range" name="range" step="1" min="100" max="10000"
                               value="10" onchange="rangePrimary.value=value">
                        <div class="range-inner">
                            <label>$</label>
                            <input type="text" id="rangePrimary" placeholder="100"/>
                        </div>
                    </div>

                    <!--ADVERT BANNER-->
                    <div class="single-widget banner">
                        <h3>Advertisement</h3>
                        <a href="javascript:void(0)">
                            <img src="../assets/images/banner/banne" alt="#">
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
