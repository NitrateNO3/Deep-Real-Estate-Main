<? include 'include/header.php'; ?>
    <!-- Banner Start -->
        <section class="fifth-banner-wrapper index">
            <figure>
                <span class="overlay"></span>
            </figure>
            <h1 class="text-center">Our Story</h1>
        </section>
    <!-- Banner End -->

    <!-- Sub-Menu Start -->
        <section class="sub-menu-wrapper index">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <ul class="sub-menu font1 text-uppercase"> 
                            <li><a href="#company-history">Company history</a></li>
                            <li><a href="#mission-vision">mission &amp; Vision</a></li>
                            <li><a href="#leadership">Leadership</a></li>
                            <li><a href="#about-page-testimonial">testimonials</a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    <!-- Sub-Menu End -->

    <!-- Intro Text Start -->
        <section id="company-history" class="company-history index section-padding">
            <div class="container">
                <h2 class="text-center">Your search for the best suitable property as per your budget and desired location ends here. We have best Industry’s top talent with technology to make the search and sell experience intelligent and seamless.</h2>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <p>Purchasing your home or some commercial investment in Gurgaon through Deep Real Estate is always preferable. 
                        In addition to assisting clients in finding the best deal on their dream house, we are a fully-licensed Haryana 
                        real estate agency. To assist our clients in navigating the challenging Gurgaon real estate market, we have created
                        a more streamlined, open, and customer-focused home purchase process.</p>

<p>We really put the needs of our clients first, and they consistently provide us with positive feedback. To learn what our 
customers had to say about the Deep Real Estate home buying experience, check out our 
<a href="https://www.google.com/maps/place/%E0%A4%A6%E0%A5%80%E0%A4%AA+%E0%A4%B0%E0%A4%BF%E0%A4%AF%E0%A4%B2+%E0%A4%8F%E0%A4%B8%E0%A5%8D%E0%A4%9F%E0%A5%87%E0%A4%9F/@28.425808,77.090734,15z/data=!4m7!3m6!1s0x0:0x8e5750e8301fc3e0!8m2!3d28.4258364!4d77.0907585!9m1!1b1" target="_blank" >Google reviews</a>. 
We are passionate about each and every one of our customers having a positive Deep Real Estate experience.</p>

                      
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="data text-center">
                            <div class="col-xs-6 col-sm-6 col-md-6 nopad padding">
                                <div class="counter-wrapper bg4">
                                    <h2>Founded</h2>
                                    <p class="font1">2005</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 nopad padding">
                                <div class="counter-wrapper bg4">
                                    <h2>properties-in-Hand</h2>
                                    <p class="font1"><span class="counter">900</span>+</p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 nopad padding">
                                <div class="counter-wrapper bg4">
                                    <h2>team strength</h2>
                                    <p class="font1"><span class="counter">25</span></p>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6 nopad padding">
                                <div class="counter-wrapper bg4">
                                    <h2>Happy clients</h2>
                                    <p class="font1"><span class="counter">1200</span>+</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Intro Text End -->

    <!-- Quote Banner Start -->
        <section class="quote-banner index">
            <div class="overlay"></div>
            <div class="quote text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
                            <h2 class="main-title">Successful urban development is about mixed use, responsible, long term growth.</h2>
                            <h6>David Willson</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Quote Banner End -->

    <!-- Mission & Vision Start -->
        <section id="mission-vision" class="mission-wrapper index section-padding mt-7">
            <div class="container">
                <h2 class="main-title text-center mission-text"> Mission &amp; Vision</h2>
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-6 pull-right">
                        <figure>
                            <img src="assets/images/mission-image.jpeg">
                        </figure>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-6">
                        <div class="mission-text">
                            <p>Deep Real Estate is committed to help you in making wise and profitable decisions in buying and selling of properties in Gurgaon.

We Provide individuals and builders a better platform for realizing maximum profits out of real estate by understanding their needs. </p>

                            <p>We believe in......</p>
<ul><li>Performance across all lines of business.</li>
<li>Delivering actual and tangible benefits to our clients.</li>
<li>Solid fundamentals.</li>
<li>Profitable Results</li></ul>



                        </div>
                    </div>

                </div>
            </div>
        </section>
    <!-- Mission & Vision End -->

    <!-- Testimonials Start -->
        <section id="about-page-testimonial" class="about-page-testimonial-wrapper text-center index section-padding">
            <div class="overlay">
                
            </div>
            <div class="container">
                <h2 class="main-title mission-text">Testimonials</h2>
                <ul class="testimonials-slider-2">
                    <? $yu=DB::query("SELECT * FROM testimonial WHERE showa<>'' ");
                    foreach($yu as $u){ ?>
                    <li>
                        <div class="slider-text">
                            <i class="fa fa-quote-left"></i>
                            <p><strong><?=$u['details']?></strong><?=$u['showa']?></p>
                        </div>
                        <h4 class="font2"><?=$u['name']?><small><?=$u['designation']?></small></h4>
                    </li> <?  } ?> 
                    
                </ul> 
            </div>
        </section>
    <!-- Testimonials End -->

   
    <? include 'include/footer.php'; ?>