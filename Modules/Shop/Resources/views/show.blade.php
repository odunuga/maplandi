<x-app-layout>
    <section class="item-details section" style="margin-top:60px">
        <div class="container">
            <div class="top-area">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                    <img src="../assets/images/item-details/image1.jpg" id="current" alt="#">
                                </div>
                                <div class="images">
                                    <img src="../assets/images/item-details/image1.jpg" class="img" alt="#">
                                    <img src="../assets/images/item-details/image2.jpg" class="img" alt="#">
                                    <img src="../assets/images/item-details/image3.jpg" class="img" alt="#">
                                    <img src="../assets/images/item-details/image4.jpg" class="img" alt="#">
                                    <img src="../assets/images/item-details/image5.jpg" class="img" alt="#">
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info ">
                            <h2 class="title">MacBook Pro 13-inch</h2>
                            <div class="list-info mb-3">
                                <h4>Informations</h4>
                                <ul>
                                    <li><span>Condition:</span> New</li>
                                    <li><span>Brand:</span> Apple</li>
                                    <li><span>Model:</span> Mackbook Pro</li>
                                </ul>
                            </div>


                            <!--ADD TO CART BUTTON-->
                            <button class="btn btn-danger btn-block">
                                <i class="lni lni-cart-full" style="font-size:25px;"></i>
                                Add to Cart
                            </button>
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
                            <h3>Description</h3>
                            <p>
                                There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form, by injected humour, or randomised words which don't
                                look even slightly believable.
                            </p>
                            <ul>
                                <li>Model: Apple MacBook Pro 13.3-Inch MYDA2</li>
                                <li>Apple M1 chip with 8-core CPU and 8-core GPU</li>
                                <li>8GB RAM</li>
                                <li>256GB SSD</li>
                                <li>13.3-inch 2560x1600 LED-backlit Retina Display</li>
                            </ul>
                            <p>The generated Lorem Ipsum is therefore always free from repetition, injected humour, or
                                non-characteristic words etc.</p>
                        </div>


                        <div class="single-block comments">
                            <h3>Comments</h3>

                            <div class="single-comment">
                                <img src="../assets/images/testimonial/testi2.jpg" alt="#">
                                <div class="content">
                                    <h4>Dannyson</h4>
                                    <span>25 Feb, 2023</span>
                                    <p>
                                        There are many variations of passages of Lorem Ipsum available, but the majority
                                        have suffered alteration in some form, by injected humour, or randomised words
                                        which don't look even slightly believable.
                                    </p>
                                </div>
                            </div>

                        </div>


                        <div class="single-block comment-form">
                            <h3>Post a comment</h3>
                            <form action="#" method="POST">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <div class="form-box form-group">
                                            <input type="text" name="name" class="form-control form-control-custom"
                                                   placeholder="Your Name" required/>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div class="form-box form-group">
                                            <input type="email" name="email" class="form-control form-control-custom"
                                                   placeholder="Your Email" required/>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-box form-group">
                                            <textarea name="#" class="form-control form-control-custom"
                                                      placeholder="Your Comments" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="button">
                                            <button type="submit" class="btn">Post Comment</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="item-details-sidebar">


                            <div class="single-block tags">
                                <h3>Tags</h3>
                                <ul>
                                    <li><a href="javascript:void(0)">Bike</a></li>
                                    <li><a href="javascript:void(0)">Services</a></li>
                                    <li><a href="javascript:void(0)">Brand</a></li>
                                    <li><a href="javascript:void(0)">Popular</a></li>
                                </ul>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
