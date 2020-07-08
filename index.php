<?php include('include/header.php'); 
?>
<!-- main header end -->

<!-- Banner start -->
<div class="banner banner-bg" id="particles-banner-wrapper">
    <div id="particles-banner"></div>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item item-bg active">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-left">
                    <div class="carousel-content container">
                        <div class="t-right">
                            <h2 data-animation="animated fadeInDown delay-05s">Find Your Dream Properties</h2>
                            <p class="text-p" data-animation="animated fadeInUp delay-10s">
                                The best place to get your desired home.
                            </p>
                            <a data-animation="animated fadeInUp delay-10s" href="properties.php" class="btn btn-lg btn-round btn-theme">Get Started Now</a>
                            <a data-animation="animated fadeInUp delay-10s" href="estimation/client/app.html" class="btn btn-lg btn-round btn-white-lg-outline">Get the exact price of your dream home</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item item-bg">
                <div class="carousel-caption banner-slider-inner d-flex h-100 text-left">
                    <div class="carousel-content container">
                        <div class="t-center">
                            <h2 data-animation="animated fadeInDown delay-05s">Best Place To Sell Properties</h2>
                            <p class="text-p" data-animation="animated fadeInUp delay-10s">
                                This is a real estate website where all your dreams come true.
                            </p>
                            <a data-animation="animated fadeInUp delay-10s" href="admin/login.php" class="btn btn-lg btn-theme">Get Started Now</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

</div>
<!-- banner end -->


<!-- Featured properties start -->
<div class="featured-properties content-area-19">
    <div class="container">
        <div class="main-title">
            <h1>Featured Properties</h1>
            <p>Trending in Demand</p>
        </div>
        <div class="row">
            <?php include('include/config.php');
            $query=mysqli_query($con,"select * from pro ORDER BY RAND() LIMIT 4");
            while($res=mysqli_fetch_array($query))
            {
            $id=$res['id'];
            $img=$res['images'];
            $price=$res['price'];
            $loc=$res['location'];
            $type=$res['type'];

            ?>
            <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInLeft delay-04s">
                <div class="card property-box-2">
                    <!-- property img -->
                    <div class="property-thumbnail">
                        <a href="properties-details.php?id=<?php echo $id;?>" class="property-img">
                            <img src="admin/images/property/property/<?php echo $img;?>" alt="property-3" class="img-fluid">
                        </a>
                        <div class="property-overlay">
                            <a href="properties-details.php?id=<?php echo $id;?>" class="overlay-link">
                                <i class="fa fa-link"></i>
                            </a>
                            
                            <div class="property-magnify-gallery">
                                <a href="admin/images/property/property/<?php echo $img;?>" class="overlay-link">
                                    <i class="fa fa-expand"></i>
                                </a>
                                <a href="assets/img/property-7.jpg" class="hidden"></a>
                                <a href="assets/img/property-6.jpg" class="hidden"></a>
                            </div>
                        </div>
                    </div>
                    <!-- detail -->
                    <div class="detail">
                        <h5 class="title"><a href="properties-details.html">Sweet <?php echo $type; ?> Family Flat at <?php echo $loc; ?></a></h5>
                        <h4 class="price">
                            Rs. <?php echo $price-1; ?>.99 Lakhs
                        </h4>
                        <p></p>
                    </div>
                </div>
            </div>
            <?php } ?>
            
        </div>
    </div>
</div>
<!-- Featured properties end -->



<!-- Recent Properties start -->
<div class="recent-properties content-area-2">
    <div class="container">
        <div class="main-title">
            <h1>Recent Properties</h1>
            <p>The best properties with the best of prices</p>
        </div>
        <div class="row">
        <?php include('include/config.php');
            $query=mysqli_query($con,"select * from pro ORDER BY RAND() LIMIT 4");
            while($res=mysqli_fetch_array($query))
            {
            $id=$res['id'];
            $img=$res['images'];
            $price=$res['price'];
            $loc=$res['location'];
            $type=$res['type'];
            $bed=$res['bedroom'];
            $bath=$res['bathroom'];
            $size=$res['size'];

            ?>
            <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInLeft delay-04s">
                <div class="property-box-8">
                    <div class="property-photo">
                        <img src="admin/images/property/property/<?php echo $img;?>" alt="property-6" class="img-fluid">
                        <div class="date-box">For Sale</div>
                    </div>
                    <div class="detail">
                        <div class="heading">
                            <h3>
                                <a href="properties-details.php?id=<?php echo $id;?>"><?php echo $type; ?> Flat at <?php echo $loc; ?></a>
                            </h3>
                            <div class="location">
                                <a href="properties-details.html">
                                    <i class="flaticon-facebook-placeholder-for-locate-places-on-maps"></i><?php echo $loc; ?>
                                </a>
                            </div>
                        </div>
                        <div class="properties-listing">
                            <span><?php echo $bed; ?> Beds</span>
                            <span><?php echo $bath; ?> Bath(s)</span>
                            <span><?php echo $size; ?> sqft</span>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            
        </div>
    </div>
</div>
<!-- Recent Properties end -->


<!-- Testimonial 2 start -->
<div class="testimonial-2 overview-bgi" style="background-image: url(assets/img/testimonial-property.jpg)">
    <div class="container">
        <div class="row">
            <div class="offset-lg-2 col-lg-8">
                <div class="testimonial-inner">
                    <header class="testimonia-header">
                        <h1>Testimonial</h1>
                    </header>
                    <div id="carouselExampleIndicators7" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="avatar">
                                            <img src="assets/img/avatar/garge.jpeg" alt="avatar-2" class="img-fluid rounded">
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                        <p class="lead">
                                            The 3BHK Flat at 1st Phase Jp Nagar was just amazing. It has everything in it. will look forward to buying property more from this site.
                                        </p>
                                        <div class="author-name">
                                            Garge Ghosh
                                        </div>
                                        <ul class="rating">
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star-half-full"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="avatar">
                                            <img src="assets/img/avatar/ashish.jpg" alt="avatar" class="img-fluid rounded">
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                        <p class="lead">
                                            The 2BHK flat at Electronic City is just great. It has everything in it including 2 Baths and a drawing room as well. Looking forward to buying more properties from this site in the future.
                                        </p>
                                        <div class="author-name">
                                            Ashish Gupta
                                        </div>
                                        <ul class="rating">
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star-half-full"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <div class="avatar">
                                            <img src="assets/img/avatar/bishal.jpeg" alt="avatar-3" class="img-fluid rounded">
                                        </div>
                                    </div>
                                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                        <p class="lead">
                                            The 3BHK Flat is amazing. I am Having a great time with my family.
                                        </p>
                                        <div class="author-name">
                                            Bishal Das
                                        </div>
                                        <ul class="rating">
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star"></i>
                                            </li>
                                            <li>
                                                <i class="fa fa-star-half-full"></i>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a class="carousel-control-prev" href="#carouselExampleIndicators7" role="button" data-slide="prev">
                            <span class="slider-mover-left" aria-hidden="true">
                                <i class="fa fa-angle-left"></i>
                            </span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators7" role="button" data-slide="next">
                            <span class="slider-mover-right" aria-hidden="true">
                                <i class="fa fa-angle-right"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><br/><br/><br/><br/>
<!-- Testimonial 2 end -->


<!-- partner start -->
<div class="container partner">
    <div class="main-title">
        <h1>Partners</h1>
    </div>
    <div class="row">
        <div class="multi-carousel" data-items="1,3,5,6" data-slide="1" id="multiCarousel"  data-interval="1000">
            <div class="multi-carousel-inner">
                <div class="item">
                    <div class="pad15">
                        <p class="lead">MagicBrics</p>
                        <img src="assets/img/brands/brand-1.png" alt="brand">
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead">Puma</p>
                        <img src="assets/img/brands/brand-2.png" alt="brand">
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead">GetmeRoof</p>
                        <img src="assets/img/brands/brand-3.png" alt="brand">
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead">OLXGroup</p>
                        <img src="assets/img/brands/brand-4.png" alt="brand">
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead">Sulekha</p>
                        <img src="assets/img/brands/brand-5.png" alt="brand">
                    </div>
                </div>
                <div class="item">
                    <div class="pad15">
                        <p class="lead">SquareYards</p>
                        <img src="assets/img/brands/brand-1.png" alt="brand">
                    </div>
                </div>
                
            </div>
            <a class="multi-carousel-indicator leftLst" aria-hidden="true">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="multi-carousel-indicator rightLst" aria-hidden="true">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
</div>
<!-- partner end -->

<!-- Footer start -->
<?php include('include/footer.php');?>