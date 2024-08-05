<?php
include_once("./admin/DatabaseConn.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ishtiaq Paint Shop</title>
      <link rel="icon" type="admin/image/x-icon" href="assets/img/gallery/mylogo.webp">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fonts-->
    <link rel="stylesheet" type="text/css" href="assets/fonts/fontawesome/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fonts/pe-icon/pe-icon.css">
    <!-- Vendors-->
    <link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap/grid.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/swiper/swiper.css">
    <!-- App & fonts-->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Oswald:400,600|Playfair+Display:400i">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css"><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
    <style>
        .hero__wrapper {
            position: relative;
        }

        .hero__overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Kala overlay */
        }
		.btn-orange {
        background-color: #DA390F;
        border-color: #DA390F;
        color: white; /* Text color */
    }
    .btn-orange:hover {
        background-color: #B32D0A;
        border-color: #B32D0A;
    }
/* CSS for changing color of section titles on hover */
.sec-title__title:hover {
    color: #DA390F;
}
.q:hover{
	color: #DA390F;
}

    </style>
</head>

<body>

<!-- preload -->
<div class="preload" id="preload">
    <div class="cssload-spin-box"></div>
</div><!-- End / preload -->

<div class="page-wrap">

    <!-- header -->
    <header class="header header-fixheight header--fixed">
        <div class="container">
            <div class="header__inner">
                <div class="header-logo"><a href="index.php"><img src="assets/img/get.webp" alt="" width="100px"/></a></div>

                <!-- raising-nav -->
                <nav class="raising-nav">

                    <!-- raising-menu -->
                    <ul class="raising-menu">
                        <li class="current"><a href="#id1">Home</a>
                        </li>
                        <li><a href="#id2">About</a>
                        </li>
                        <li><a href="#id3">service</a>
                        </li>
                        <li><a href="#id4">gallery</a>
                        </li>
                        <li><a href="#id5">testimonial</a>
                        </li>
                        <li><a href="#id6">team</a>
                        </li>
                        <li><a href="#id7">contact us</a>
                        </li>
                    </ul><!-- raising-menu -->

                    <div class="navbar-toggle"><i class="fa fa-bars"></i></div>
                </nav><!-- End / raising-nav -->

                <!-- <div class="btn-right">
                    <div class="search-btn"><i class="fa fa-search"></i></div>
                </div> -->
				<div class="text-center">
    <a href="./admin/index.php">
        <button type="button" class="btn btn-orange">Login</button>
    </a>
</div>

                <div class="searchbar">

                    <div class="searchbar__group"><span class="searchbar__addon"><i class="fa fa-search"></i></span>
                        <input class="searchbar__input" type="text" name="search" value="" placeholder="Search"/><span
                            class="searchbar__close"></span>
                    </div>
                </div>
            </div>
        </div>
    </header><!-- End / header -->

    <!-- Content-->
    <div class="md-content">

        <!-- hero -->
        <hero class="hero" id="id1">

            <!-- swiper swiper-container -->
            <div class="swiper swiper-container">
                <div class="swiper-wrapper">
                    <div class="hero__wrapper" style="background-image: url('assets/img/sikkens-5051-colour-concept.webp');">
                        <div class="hero__overlay"></div> <!-- Overlay -->
                        <div class="hero__inner">
                            <div class="container">
                                <h1 class="hero__title">Color Your World with Ishtiaq Paint Shop</h1>
                                <p class="hero__desc">Welcome to Ishtiaq Paint Shop, where every brushstroke tells a story.<br> Our shop is more than just a place to buy paint; it's a hub of creativity, inspiration, and transformation. </p>

                                <!-- btn -->
                                <a class="btn btn-primary" href="#id2">READ MORE
                                </a><!-- End / btn -->

                            </div>
                        </div>
                    </div>
                    <div class="hero__wrapper" style="background-image: url('assets/img/rk-paints-babametta-vizianagaram.webp');">
                        <div class="hero__overlay"></div> <!-- Overlay -->
                        <div class="hero__inner">
                            <div class="container">
                                <h1 class="hero__title">Find Your Perfect Shade at Ishtiaq Paint Shop</h1>
                                <p class="hero__desc">At Ishtiaq Paint Shop, we understand that your home is a reflection of your personality and style.<br> That's why we're dedicated to providing you with the highest quality paints and coatings to help you bring your vision to life. </p>

                                <!-- btn -->
                                <a class="btn btn-primary" href="#id2">READ MORE
                                </a><!-- End / btn -->

                            </div>
                        </div>
                    </div>
                    <div class="hero__wrapper" style="background-image: url('assets/img/47bf78ace1b1240120386eb2e609cbf2.webp');">
                        <div class="hero__overlay"></div> <!-- Overlay -->
                        <div class="hero__inner">
                            <div class="container">
                                <h1 class="hero__title">Unleash Your Imagination</h1>
                                <p class="hero__desc">Unleash Your Imagination with Ishtiaq Paint Shop! Step into a world <br>where creativity knows no bounds and every stroke of paint tells a story.</p>

                                <!-- btn -->
                                <a class="btn btn-primary" href="#id2">READ MORE
                                </a><!-- End / btn -->

                            </div>
                        </div>
                    </div>
                    <div class="hero__wrapper" style="background-image: url('assets/img/paint_shop_cover_clr.webp');">
                        <div class="hero__overlay"></div> <!-- Overlay -->
                        <div class="hero__inner">
                            <div class="container">
                                <h1 class="hero__title">Elevate Your Décor</h1>
                                <p class="hero__desc"> At Ishtiaq Paint Shop, we're here to help you elevate your décor to new heights. <br>With our extensive range of paints, stains, and finishes, you can add depth, dimension, and personality to any room.</p>

                                <!-- btn -->
                                <a class="btn btn-primary" href="#id2">READ MORE
                                </a><!-- End / btn -->

                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination-custom"></div>
                <div class="swiper-button-custom">
                    <div class="swiper-button-prev-custom"><i class="fa fa-angle-left"></i></div>
                    <div class="swiper-button-next-custom"><i class="fa fa-angle-right"></i></div>
                </div>
            </div><!-- End / swiper swiper-container -->

        </hero><!-- End / hero -->

				
				<!-- cta-02 -->
				<div class="cta-02">
					<div class="container">
						<div class="row">
							<div class="col-lg-9 ">
								<h3 class="cta-02__title">Looking for a high quality Paint company for your project?</h3>
							</div>
							<div class="col-lg-3  md-text-right">
								
								<!-- btn -->
								<a class="btn btn-outline" href="#id7">Get a quote
								</a><!-- End / btn -->
								
							</div>
						</div>
					</div>
				</div><!-- End / cta-02 -->
				
				
				<!-- Section -->
				<section class="md-section" id="id2" style="background-color:#fff;padding:60px 0;">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 ">
								<div class="mb-30">
									
									<!-- sec-title -->
									<div class="sec-title sec-title__lg-title">
										<h2 class="sec-title__title">About <span>The Ishtiaq Paint </span></h2><span class="sec-title__divider"></span>
									</div><!-- End / sec-title -->
									
									<p>At Ishtiaq Paint, we pride ourselves on being a trusted name in the paint industry, dedicated to providing high-quality products and exceptional service to our customers.</p><br>
									<p> With years of experience and expertise, we have established ourselves as a leading supplier of paints, coatings, and related products.</p><br><br><a class="btn btn-primary btn-outline" href="#id3">More about us</a>
								</div>
							</div>
							<div class="col-lg-6 ">
								
								<!-- about -->
								<div class="about"><img src="assets/img/shop.webp" alt=""/>
									
									<!-- quote-02 -->
									<blockquote class="quote-02 about-quote">
										<p class="quote-02__text">Ishtiaq Paint exceeded my expectations in every aspect. From their extensive range of colors to their exceptional customer service, every interaction was a delight. </p>
										
										<!-- authorbox -->
										<div class="authorbox">
											<div class="authorbox__avartar" style="background-image: url(https://unsplash.it/800);"><img src="https://unsplash.it/800" alt=""/></div>
											<div class="authorbox__info">
												<h5 class="authorbox__name">Maria Gutierrez</h5>
												<p class="authorbox__work">Paint Company </p>
											</div>
										</div><!-- End / authorbox -->
										
									</blockquote><!-- End / quote-02 -->
									
								</div><!-- End / about -->
								
							</div>
						</div>
					</div>
				</section>
				<!-- End / Section -->
				
				
				<!-- Section -->
				<section class="md-section" id="id3">
					<div class="container">
						<div class="row">
							<div class="col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-2 ">
								
								<!-- sec-title -->
								<div class="sec-title sec-title__lg-title md-text-center">
									<h2 class="sec-title__title">Our services</h2><span class="sec-title__divider"></span>
								</div><!-- End / sec-title -->
								
							</div>
						</div>
						<div class="row row-eq-height">
							<div class="col-sm-6 col-md-6 col-lg-4 ">
								
								<!-- services -->
								<div class="services">
									<div class="services__img"><img src="assets/img/service/1.webp" alt=""/></div>
									<h2 class="services__title"><a href="#">General Painting </a></h2>
									<div class="services__desc">General painting is an essential aspect of maintaining and enhancing the appearance of any property.</div>
									
									<!-- btn -->
									<a class="btn btn btn-primary btn-custom" href="#">read more
									</a><!-- End / btn -->
									
								</div><!-- End / services -->
								
							</div>
							<div class="col-sm-6 col-md-6 col-lg-4 ">
								
								<!-- services -->
								<div class="services">
									<div class="services__img"><img src="assets/img/service/2.webp" alt=""/></div>
									<h2 class="services__title"><a href="#">Concept and Design</a></h2>
									<div class="services__desc">At Ishtiaq Paint, we believe in the power of innovative thinking and creative vision to bring your ideas to life.</div>
									
									<!-- btn -->
									<a class="btn btn btn-primary btn-custom" href="#">read more
									</a><!-- End / btn -->
									
								</div><!-- End / services -->
								
							</div>
							<div class="col-sm-6 col-md-6 col-lg-4 ">
								
								<!-- services -->
								<div class="services">
									<div class="services__img"><img src="assets/img/service/3.webp" alt=""/></div>
									<h2 class="services__title"><a href="#">Metal Roofing</a></h2>
									<div class="services__desc">Duis porttitor libero ac egestas euismod. Maecenas quis felis turpis. Nulla quis turpis sed augue egestas dapibus vel at</div>
									
									<!-- btn -->
									<a class="btn btn btn-primary btn-custom" href="#">read more
									</a><!-- End / btn -->
									
								</div><!-- End / services -->
								
							</div>

						</div>
					</div>
				</section>
				<!-- End / Section -->
				
				
				<!-- Section -->
				<section class="md-section" id="id4" style="background-color:#fff;">
					<div class="container">
						<div class="row">
							<div class="col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-2 ">
								
								<!-- sec-title -->
								<div class="sec-title sec-title__lg-title md-text-center">
									<h2 class="sec-title__title">Gallery</h2><span class="sec-title__divider"></span>
								</div><!-- End / sec-title -->
								
							</div>
						</div>
						
						<!-- gallery-wrap -->
						<div class="gallery-wrap gallery-album">
							<div class="grid-css grid-css--grid" data-col-lg="4" data-col-md="2" data-col-sm="2" data-col-xs="1" data-gap="30">
								<div class="grid__inner">
									<div class="grid-sizer"></div>
									
									<!-- grid-item -->
									<div class="grid-item large">
										<div class="grid-item__inner">
											<div class="grid-item__content-wrapper">
												
												<!-- gallery -->
												<div class="gallery gallery--grid">
													<div class="gallery__image bg-image" style="background-image: url(assets/img/gallery/z.webp);"><img src="assets/img/gallery/house-painting.webp" alt="How to Create and"/><a class="gallery__overlay mfp-image" href="assets/img/gallery/house-painting.webp" data-effect="mfp-zoom-in" title="Design a Perfect">
															<div class="md-tb">
																<div class="md-tb__cell md-text-center"><i class="fa fa-search"></i></div>
															</div></a>
													</div>
												</div><!-- End / gallery -->
												
											</div>
										</div>
									</div><!-- End / grid-item -->
									
									
									<!-- grid-item -->
									<div class="grid-item wide">
										<div class="grid-item__inner">
											<div class="grid-item__content-wrapper">
												
												<!-- gallery -->
												<div class="gallery gallery--grid">
													<div class="gallery__image bg-image" style="background-image: url(assets/img/gallery/x.webp);"><img src="assets/img/gallery/4.webp" alt="How to Master"/><a class="gallery__overlay mfp-image" href="assets/img/gallery/4.webp" data-effect="mfp-zoom-in" title="Using Memes in Your">
															<div class="md-tb">
																<div class="md-tb__cell md-text-center"><i class="fa fa-search"></i></div>
															</div></a>
													</div>
												</div><!-- End / gallery -->
												
											</div>
										</div>
									</div><!-- End / grid-item -->
									
									
									<!-- grid-item -->
									<div class="grid-item">
										<div class="grid-item__inner">
											<div class="grid-item__content-wrapper">
												
												<!-- gallery -->
												<div class="gallery gallery--grid">
													<div class="gallery__image bg-image" style="background-image: url(assets/img/gallery/c.webp);"><img src="assets/img/gallery/5.webp" alt="7 UI Choices That"/><a class="gallery__overlay mfp-image" href="assets/img/gallery/5.webp" data-effect="mfp-zoom-in" title="Free PSD Files">
															<div class="md-tb">
																<div class="md-tb__cell md-text-center"><i class="fa fa-search"></i></div>
															</div></a>
													</div>
												</div><!-- End / gallery -->
												
											</div>
										</div>
									</div><!-- End / grid-item -->
									
									
									<!-- grid-item -->
									<div class="grid-item">
										<div class="grid-item__inner">
											<div class="grid-item__content-wrapper">
												
												<!-- gallery -->
												<div class="gallery gallery--grid">
													<div class="gallery__image bg-image" style="background-image: url(assets/img/gallery/v.webp);"><img src="assets/img/gallery/6.webp" alt="Using Memes in Your"/><a class="gallery__overlay mfp-image" href="assets/img/gallery/6.webp" data-effect="mfp-zoom-in" title="Is UX Really That">
															<div class="md-tb">
																<div class="md-tb__cell md-text-center"><i class="fa fa-search"></i></div>
															</div></a>
													</div>
												</div><!-- End / gallery -->
												
											</div>
										</div>
									</div><!-- End / grid-item -->
									
									
									<!-- grid-item -->
									<div class="grid-item">
										<div class="grid-item__inner">
											<div class="grid-item__content-wrapper">
												
												<!-- gallery -->
												<div class="gallery gallery--grid">
													<div class="gallery__image bg-image" style="background-image: url(assets/img/gallery/b.webp);"><img src="assets/img/gallery/7.webp" alt="How To Build A"/><a class="gallery__overlay mfp-image" href="assets/img/gallery/7.webp" data-effect="mfp-zoom-in" title="Free Sketch Plugins">
															<div class="md-tb">
																<div class="md-tb__cell md-text-center"><i class="fa fa-search"></i></div>
															</div></a>
													</div>
												</div><!-- End / gallery -->
												
											</div>
										</div>
									</div><!-- End / grid-item -->
									
									
									<!-- grid-item -->
									<div class="grid-item">
										<div class="grid-item__inner">
											<div class="grid-item__content-wrapper">
												
												<!-- gallery -->
												<div class="gallery gallery--grid">
													<div class="gallery__image bg-image" style="background-image: url(assets/img/gallery/n.webp);"><img src="assets/img/gallery/8.webp" alt="Using Memes in Your"/><a class="gallery__overlay mfp-image" href="assets/img/gallery/8.webp" data-effect="mfp-zoom-in" title="How to Create and">
															<div class="md-tb">
																<div class="md-tb__cell md-text-center"><i class="fa fa-search"></i></div>
															</div></a>
													</div>
												</div><!-- End / gallery -->
												
											</div>
										</div>
									</div><!-- End / grid-item -->
									
									
									<!-- grid-item -->
									<div class="grid-item large">
										<div class="grid-item__inner">
											<div class="grid-item__content-wrapper">
												
												<!-- gallery -->
												<div class="gallery gallery--grid">
													<div class="gallery__image bg-image" style="background-image: url(assets/img/gallery/s.webp);"><img src="assets/img/gallery/s.webp" alt="Is UX Really That"/><a class="gallery__overlay mfp-image" href="assets/img/gallery/s.webp" data-effect="mfp-zoom-in" title="How to Master">
															<div class="md-tb">
																<div class="md-tb__cell md-text-center"><i class="fa fa-search"></i></div>
															</div></a>
													</div>
												</div><!-- End / gallery -->
												
											</div>
										</div>
									</div><!-- End / grid-item -->
									
									
									<!-- grid-item -->
									<div class="grid-item wide">
										<div class="grid-item__inner">
											<div class="grid-item__content-wrapper">
												
												<!-- gallery -->
												<div class="gallery gallery--grid">
													<div class="gallery__image bg-image" style="background-image: url(assets/img/gallery/q.webp);"><img src="assets/img/gallery/q.webp" alt="Getting Started with"/><a class="gallery__overlay mfp-image" href="assets/img/gallery/q.webp" data-effect="mfp-zoom-in" title="The Essential Guide">
															<div class="md-tb">
																<div class="md-tb__cell md-text-center"><i class="fa fa-search"></i></div>
															</div></a>
													</div>
												</div><!-- End / gallery -->
												
											</div>
										</div>
									</div><!-- End / grid-item -->
									
								</div>
							</div>
						</div><!-- End / gallery-wrap -->
						
					</div>
				</section>
				<!-- End / Section -->
				
				
				<!-- Section -->
				<section class="md-section" id="id5">
					<div class="container">
						<div class="row">
							<div class="col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-2 ">
								
								<!-- sec-title -->
								<div class="sec-title sec-title__lg-title md-text-center">
									<h2 class="sec-title__title">Testimonial</h2><span class="sec-title__divider"></span>
								</div><!-- End / sec-title -->
								
							</div>
						</div>
						
						<!-- swiper swiper-container -->
						<div class="swiper swiper-container" data-options='{"slidesPerView":3,"spaceBetween":30,"breakpoints":{"600":{"slidesPerView":1},"991":{"slidesPerView":2,"spaceBetween":30}}}'>
							<div class="swiper-wrapper">
								<div class="testimonial-item">
									
									<!-- quote -->
									<blockquote class="quote">
										<p>I couldn't be happier with the results from Ishtiaq Paint. From start to finish, their team was professional, courteous, and attentive to my needs.</p>
									</blockquote><!-- End / quote -->
									
									
									<!-- authorbox -->
									<div class="authorbox">
										<div class="authorbox__avartar" style="background-image: url(https://unsplash.it/800);"><img src="https://unsplash.it/800" alt=""/></div>
										<div class="authorbox__info">
											<h5 class="authorbox__name">Johnathan K. </h5>
											<p class="authorbox__work">Homeowner</p>
										</div>
									</div><!-- End / authorbox -->
									
								</div>
								<div class="testimonial-item">
									
									<!-- quote -->
									<blockquote class="quote">
										<p>As an interior designer, I rely on quality suppliers to bring my visions to life. Ishtiaq Paint has been my go-to choice for years,  </p>
									</blockquote><!-- End / quote -->
									
									
									<!-- authorbox -->
									<div class="authorbox">
										<div class="authorbox__avartar" style="background-image: url(https://unsplash.it/800);"><img src="https://unsplash.it/800" alt=""/></div>
										<div class="authorbox__info">
											<h5 class="authorbox__name">Sarah L. </h5>
											<p class="authorbox__work">Interior Designer</p>
										</div>
									</div><!-- End / authorbox -->
									
								</div>
								<div class="testimonial-item">
									
									<!-- quote -->
									<blockquote class="quote">
										<p>Managing commercial properties comes with its challenges, but working with Ishtiaq Paint has made the painting process seamless. </p>
									</blockquote><!-- End / quote -->
									
									
									<!-- authorbox -->
									<div class="authorbox">
										<div class="authorbox__avartar" style="background-image: url(https://unsplash.it/800);"><img src="https://unsplash.it/800" alt=""/></div>
										<div class="authorbox__info">
											<h5 class="authorbox__name">Michael R.</h5>
											<p class="authorbox__work">Commercial Property Manager</p>
										</div>
									</div><!-- End / authorbox -->
									
								</div>
								<div class="testimonial-item">
									
									<!-- quote -->
									<blockquote class="quote">
										<p>Mauris lacinia venenatis dolor sit amet viverra. Integer malesuada nulla neque. Sed rutrum ligula eu sagittis volutpat. Aliquam erat volutpat. Praesent mattis non nulla eget</p>
									</blockquote><!-- End / quote -->
									
									
									<!-- authorbox -->
									<div class="authorbox">
										<div class="authorbox__avartar" style="background-image: url(https://unsplash.it/800);"><img src="https://unsplash.it/800" alt=""/></div>
										<div class="authorbox__info">
											<h5 class="authorbox__name">Brittany Williams</h5>
											<p class="authorbox__work">Developer</p>
										</div>
									</div><!-- End / authorbox -->
									
								</div>
							</div>
						</div><!-- End / swiper swiper-container -->
						
					</div>
				</section>
				<!-- End / Section -->
				
				
				<!-- Section -->
				<section class="md-section md-skin-dark" id="id6" style="background-image:url(&quot;assets/img/bg/demo.jpg&quot;);padding-bottom:50px;">
					<div class="md-overlay"></div>
					<div class="container">
						<div class="row">
							<div class="col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-2 ">
								
								<!-- sec-title -->
								<div class="sec-title sec-title__lg-title md-text-center">
									<h2 class="sec-title__title">Our team</h2><span class="sec-title__divider"></span>
								</div><!-- End / sec-title -->
								
							</div>
						</div>

					</div>
				</section>
				<!-- End / Section -->
				
				
				<!-- Section -->
				<section class="md-section" id="id7" style="background-color:#fff;padding:60px 0 0;">
					<div class="row">
						<div class="col-lg-8 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-2 ">
							
							<!-- sec-title -->
							<div class="sec-title sec-title__lg-title md-text-center">
								<h2 class="sec-title__title">Contact us</h2><span class="sec-title__divider"></span>
							</div><!-- End / sec-title -->
							
						</div>
					</div>
					<div class="container">
						<div class="row">
							<div class="col-lg-9  col-lg-push-3">
								<div class="main-content">
									<div class="row"> 
										<div class="col-lg-6 ">
											<form action="#" method="POST" class="contact-form" >
												
												<!-- form-item -->
												<div class="form-item">
													<input class="form-control" type="text" name="txtname" placeholder="name"/>
												</div><!-- End / form-item -->
												
												
												<!-- form-item -->
												<div class="form-item">
													<input class="form-control" type="text" name="txtemail" placeholder="email"/>
												</div><!-- End / form-item -->
												
												
												<!-- form-item -->
												<div class="form-item">
													<input class="form-control" type="text" name="txtphone" placeholder="phone"/>
												</div><!-- End / form-item -->
												
												
												<!-- form-item -->
												<div class="form-item">
													<input class="form-control" type="text" name="txtsubject" placeholder="subject"/>
												</div><!-- End / form-item -->
												
												
												<!-- form-item -->
												<div class="form-item">
													<textarea name="txtmessage" placeholder="Message" style="height: 150px;"></textarea>
												</div><!-- End / form-item -->
												
												<button class="btn btn-primary btn-round mb-30" name="submit" type="submit">Send message</button>
											</form>
										</div>
										<div class="col-lg-6 ">
											<div class="contact-gmap"><iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d231685.42128720685!2d67.0048341891597!3d24.860956329042875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d24.8676352!2d67.0793728!4m5!1s0x3eb3339d69dfa6b1%3A0x3030cfd44b38ba17!2sishtiaq%20paint%20shop%20bhains%20colony%20karachi!3m2!1d24.836374199999998!2d67.2601225!5e0!3m2!1sen!2s!4v1710354886666!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3  col-lg-pull-9">
								<div class="sidebar">
									
									<!-- widget -->
									<section class="widget">
										
										<!-- sec-title -->
										<div class="sec-title">
											<h2 class="sec-title__title">working hours</h2><span class="sec-title__divider"></span>
										</div><!-- End / sec-title -->
										
										<p class="mb-30">At Ishtiaq Paint, we understand the importance of flexibility and convenience when it comes to serving our customers. That's why we strive to accommodate a variety of schedules by offering extended working hours. </p>
										
										<!--  -->
										<div>
											<div class="widget-contact__item"><span class="widget-contact__title">Tel:</span>
												<p class="widget-contact__text"><a href="tel:+0300 349115">+92300 349115</a></p>
											</div>
											<div class="widget-contact__item"><span class="widget-contact__title">email:</span>
												<p class="widget-contact__text"><a href="mailto:IshtiaqPaint@gmail.com">IshtiaqPaint@gmail.com</a></p>
											</div>
											<div class="widget-contact__item"><span class="widget-contact__title">Working Hours</span>
												<p class="widget-contact__text">Mon - Sat: 7:30 AM - 7:30 PM</p>
											</div>
										</div><!-- End /   -->
										
									</section><!-- End / widget -->
									
								</div>
							</div>
						</div>
					</div>
				</section>
				<?php
if(isset($_POST["submit"])){
  // error_reporting(0);
  $Name = $_POST['txtname'];
  $Email = $_POST['txtemail'];
  $Phone = $_POST['txtphone'];
  $Subject = $_POST['txtsubject'];
  $Message = $_POST['txtmessage'];
  $query = "INSERT INTO `contact`(`id`, `name`, `email`, `phone`,`subject`, `message`) VALUES (null,'$Name','$Email','$Phone','$Subject','$Message')";
 mysqli_query($conn,$query);
  ?>
    <script>
    window.location.assign("index.php");
  </script>
  <?php
  }

?>
				<!-- End / Section -->
				
			</div>
			<!-- End / Content-->
			
			<!-- footer-01 -->
			<footer class="footer-01 md-skin-dark">
				<div class="footer-01__widget">
					<div class="container">
						<div class="row">
							<div class="col-md-6 col-lg-3 ">
								
								<!-- widget -->
								<section class="widget">
									
									<!-- sec-title -->
									<div class="sec-title">
										<h2 class="sec-title__title">about us</h2><span class="sec-title__divider"></span>
									</div><!-- End / sec-title -->
									
									<p> At Ishtiaq Paint, we pride ourselves on being a leading provider of premium painting solutions, catering to a diverse range of clients across residential, commercial, and industrial sectors. With decades of experience in the industry, we have established ourselves as a trusted name synonymous with quality, reliability, and innovation. </p>
								</section><!-- End / widget -->
								
							</div>
							<div class="col-md-6 col-lg-3 ">
								
								<!-- widget -->
								<section class="widget">
									
									<!-- sec-title -->
									<div class="sec-title">
										<h2 class="sec-title__title">Quick Link</h2><span class="sec-title__divider"></span>
									</div><!-- End / sec-title -->
									
									
									<!-- widget-tag -->
									<div class="q">
										<a href="#id1">Home</a>
									</div><!-- End /  widget-tag -->
										<!-- widget-tag -->
										<div class="q">
											<a href="#id2">About Us </a>
										</div><!-- End /  widget-tag -->
													<!-- widget-tag -->
													<div class="q">
														<a href="#id3">Services </a>
													</div><!-- End /  widget-tag -->
																<!-- widget-tag -->
										<div class="q">
											<a href="#id7">Contact Us </a>
										</div><!-- End /  widget-tag -->
													
									
								</section><!-- End / widget -->
								
							</div>
							<div class="col-md-6 col-lg-3 ">
								
								<!-- widget -->
								<section class="widget">
									
									<!-- sec-title -->
									<div class="sec-title">
										<h2 class="sec-title__title">More</h2><span class="sec-title__divider"></span>
									</div><!-- End / sec-title -->
									
									
									<!-- widget-gallery -->
									<div class="sec-title__title">
										<div class="q"><a href="#id4">Gallery</a>
										</div><!-- End /  widget-tag -->
										<div class="sec-title__title">
											<div class="q"><a href="#id5">Testimonial</a>
											</div><!-- End /  widget-tag -->
											<div class="sec-title__title">
												<div class="q"><a href="#id6">Team</a>
												</div><!-- End /  widget-tag -->
									</div><!-- End /  widget-gallery -->
									
								</section><!-- End / widget -->
								
							</div>
							<div class="col-lg-3 ">
								
								<!-- widget -->
								<section class="widget">
									
									<!-- sec-title -->
									<div class="sec-title">
										<h2 class="sec-title__title">working hours</h2><span class="sec-title__divider"></span>
									</div><!-- End / sec-title -->
									
									<!--  -->
									<div>
										<div class="widget-contact__item"><span class="widget-contact__title">Working Hours</span>
											<p class="widget-contact__text">Mon - Sat: 7:30 - 7:30</p>
										</div>
										<div class="widget-contact__item"><span class="widget-contact__title">Tel:</span>
											<p class="widget-contact__text q"><a href="tel:0300 349115">+92300 349115</a></p>										</p>
										</div>
										<div class="widget-contact__item"><span class="widget-contact__title">email:</span>
											<p class="widget-contact__text q"><a href="mailto:IshtiaqPaint@gmail.com">IshtiaqPaint@gmail.com</a></p>
										</div>
										
									</div><!-- End /   -->
									
								</section><!-- End / widget -->
								
							</div>
						</div>
					</div>
				</div>
				
				<!-- copyright-01 -->
				<div class="copyright-01 md-text-center">
					<div class="container">
						<p class="copyright-01__copy">2024 &copy; Copyright All rights Reserved.</p>
					</div>
				</div><!-- End / copyright-01 -->
				
			</footer><!-- End / footer-01 -->
			
		</div>
		<!-- Vendors-->
		<script type="text/javascript" src="assets/vendors/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="assets/vendors/imagesloaded/imagesloaded.pkgd.js"></script>
		<script type="text/javascript" src="assets/vendors/isotope-layout/isotope.pkgd.js"></script>
		<script type="text/javascript" src="assets/vendors/jquery.matchHeight/jquery.matchHeight.min.js"></script>
		<script type="text/javascript" src="assets/vendors/magnific-popup/jquery.magnific-popup.min.js"></script>
		<script type="text/javascript" src="assets/vendors/masonry-layout/masonry.pkgd.js"></script>
		<script type="text/javascript" src="assets/vendors/swiper/swiper.jquery.js"></script>
		<script type="text/javascript" src="assets/vendors/jquery-one-page/jquery.nav.js"></script>
		<script type="text/javascript" src="assets/vendors/menu/menu.js"></script>
		<script type="text/javascript" src="assets/vendors/jquery.waypoints/jquery.waypoints.min.js"></script>
		<!-- App-->
		<script type="text/javascript" src="assets/js/main.js"></script>
	</body>
</html>