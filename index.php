<? include 'include/header.php'?>

    <!-- Banner Start -->
        <section class="banner-wrapper index">
            <ul class="banner-slider">
                <? $rt=DB::query("SELECT * FROM banners where banner_path<>'' ORDER BY banner_position ASC");
                foreach($rt as $t){

                    echo '<li>
                    <figure>
                        <img src="admin/assets/uploadBanners/'.$t['banner_path'].'" alt="'.$admin['CompanyName'].'">
                    </figure>
                    <div class="overlay"></div>
                </li>'; } ?>


            </ul>


        </section>
    <!-- Banner End -->

    <!-- Action Button Start -->
        <section class="action-button-wrapper bg2 index text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <h1 class="text-uppercase">We Buy and Sell Homes</h1>
                        <p>Simply click anywhere in the paragraph text and start typing can copy combinations</p>
                        <div class="action-button">
                            <a href="#" class="btn-1 flat-btn text-uppercase">
                                <span>looking to buy</span>
                            </a>

                            <p>OR</p>

                            <a href="#" class="btn-1 text-uppercase">
                                <span>looking to sell</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Action Button End -->

    <!-- Featured Properties Start -->
            <section class="featured-properties-wrapper index section-padding text-center">
                <div class="container">
                    <h2 class="main-title text-center">Featured Properties</h2>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-xs-12">
                            <div class="tab-box">
                                <div class="border"></div>
                                <ul class="nav-tabs text-uppercase font1">
                                    <li class="active"><a data-toggle="tab" href="#first">Residential</a></li>
                                    <li><a data-toggle="tab" href="#second">commercial</a></li>
                                </ul>
 <? $qw=DB::query(" SELECT * from propertyList ORDER BY pid DESC");
                                        $resProp='';$commProp='';$eR=1;$eC=1;
 foreach($qw as $w){
     $price=$w['price'] * $w['psize'];
                    $d_logo=developerInfo($w['did'],'logo');
                    $d_name=developerInfo($w['did'],'name');
                    if($w['pimage_name']=='' || $w['pimage_name']=='0'){
                        $pimage= 'assets/images/NO-Photo.jpg';} else {
                            $pimage='admin/assets/uploadedPropertyPics/'.$w['pimage_name'];}


                   if($w['ptype']=='2' && $eR <= 6){
                                                $resProp .= '    <div class="col-md-4 col-sm-6 col-xs-6">
                                            <div class="featured-properties text-left">
                                                <figure class="featured-image">
                                                    <a href="/PropertiesDetails.php?pid='.$w['pid'].'">
                                                        <img src="'.$pimage.'" style="width:360px; height:331px" alt="'.$w['pname'].'">
                                                        <span class="overlay-1"></span>
                                                    </a>
                                                    <figcaption>
                                                        <span>'.$d_name.'</span>
                                                       <span>'.$w['psize'].' '.$w['unit'].'</span>

                                                    </figcaption>
                                                </figure>
                                                <h5><a href="/PropertiesDetails.php?pid='.$w['pid'].'">'.$w['pname'].'</a></h5>
                                                <span>'.locationName($w['location']).', '.cityName($w['city']).'</span>
                                                <span>&#8377 '.getPrice($price).' </span>

                                            </div>
                                        </div>';  $eR++;} else
                                        if($w['ptype']=='1'  && $eC <= 6){
                                                $commProp .= '    <div class="col-md-4 col-sm-6 col-xs-6">
                                            <div class="featured-properties text-left">
                                                <figure class="featured-image">
                                                    <a href="/PropertiesDetails.php?pid='.$w['pid'].'">
                                                        <img src="admin/assets/uploadedPropertyPics/'.$w['pimage_name'].'" style="width:360px; height:331px" alt="'.$w['pname'].'">
                                                        <span class="overlay-1"></span>
                                                    </a>
                                                    <figcaption>
                                                        <span>'.$d_name.'</span>
                                                       <span>'.$w['psize'].' '.$w['unit'].'</span>

                                                    </figcaption>
                                                </figure>
                                                <h5><a href="/PropertiesDetails.php?pid='.$w['pid'].'">'.$w['pname'].'</a></h5>
                                                <span>'.locationName($w['location']).', '.cityName($w['city']).'</span>
                                                <span>&#8377 '.getPrice($price).' </span>

                                            </div>
                                        </div>';$eC++;}
 } ?>
                                <div class="tab-content">
                                    <div id="first" class="tab-pane fade in active">

                                        <?=$resProp?>
                                          <a href="Residentials.php" class="btn-1 text-uppercase">
                                <span>view all residential properties</span>
                            </a>
                                    </div>

                                    <div id="second" class="tab-pane fade">
                                       <?=$commProp?>
                                         <a href="Commercials.php" class="btn-1 text-uppercase">
                                <span>view all Commercial properties</span>
                            </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
    <!-- Featured Properties End -->

    <!-- Extra info Start -->
        <section class="extra-info-wrapper index section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="extra-info">
                            <figure class="extra-info-image pull-right">
                                <img src="assets/images/livingInGurgaon.jpg" alt="Living in Gurgaon">
                                <div class="overlay-1"></div>
                            </figure>
                            <div class="extra-info-text margin-control">
                                <h3>
                                    <a href="#">Living in Gurgaon</a>
                                </h3>
                                <p>Strategic location advantages, cohesive urban design - street furniture, signages & road lighting, water
                                features throughout the landscape, segregation of pedestal & vehicular movement, tree-lined streets &
                                parking, environment friendly planning, piped gas supply, perimeter security, multiple parks for
                                recreation, health facilities, sanitation & maintenance, recreation facilities, maintenance staff,
                                health facilities and drop-off area.</p>
                                <a href="#" class="btn-1 flat-btn">
                                    <span>search home</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="extra-info">
                            <figure class="extra-info-image">
                                <img src="assets/images/investment.jpg" alt="A Good Investment">
                                <div class="overlay-1"></div>
                            </figure>
                            <div class="extra-info-text">
                                <h3>
                                    <a href="#">A Good Investment</a>
                                </h3>
                                <p>Gurgaon Property always has been a good option for investment. This has given good return wherever a wise deal
                                is done. We at Deep Real Estate help you to select a good option to invest and also help you to sale your property on most profitable
                                value.</p>
                                <a href="#" class="btn-1 flat-btn">
                                    <span>Call Us</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="extra-info margin-none">
                            <figure class="extra-info-image pull-right">
                                <img src="assets/images/bestOption.jpg" alt="Ask for Best Options">
                                <div class="overlay-1"></div>
                            </figure>
                            <div class="extra-info-text margin-control">
                                <h3>
                                    <a href="#">Ask for Best Options.</a>
                                </h3>
                                <p> In Gurgaon, no matter which sector or wich loaction, we can arrange a good, fair and budget deal on property.
                                Just step in to our office, discuss your requirements and budget, and thats all. We assure you to find the suitable options within 2 weeks.</p>
                                <a href="#" class="btn-1 flat-btn">
                                    <span>search home</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    <!-- Extra info End -->

    <!-- Explore Neighborhoods Start-->
        <section class="explore-wrapper index section-padding text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1" style="margin-top:30px;">
                        <h2 class="main-title text-center">Maps</h2>
                        <div class="dis-title">
                            <p>Need more oriented vision of sectors? even plot no. wise? We have already arranged for you here.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <? $rg = 'admin/';
 $gh=DB::query("SELECT * FROM maps ORDER BY RAND() LIMIT 0,6");


  // Displaying the files in the directory
  foreach($gh as $h){
                    echo '<div class="col-md-4 col-sm-6 col-xs-6">
                        <div class="featured-properties text-left">
                            <figure class="featured-image">

                                    <img src="admin/assets/maps/thumb/'.$h['thumb_url'].'" alt="'.$h['map_name'].'">

                                <a href="Maps_Detailed.php?mid='.$h['mid'].'"><div class="overlay-1"></div></a>
                            </figure>
                            <h5><a href="Maps_Detailed.php?mid='.$h['mid'].'">'.$h['map_name'].'</a></h5>

                        </div>
                    </div>'; } ?>

                    <a href="Maps.php" class="btn-1 text-uppercase">
                        <span>explore all Maps of Gurgaon</span>
                    </a>
                </div>
            </div>
        </section>
    <!-- Explore Neighborhoods End-->

    <!-- Story Start -->
        <section class="story-wrapper index">
            <div class="overlay">

            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-5">
                        <div class="story">
                            <? $kl=DB::query("SELECT * FROM testimonial WHERE showa<>'' ORDER BY RAND() LIMIT 0,1")[0]; ?>

                            <h4><?=$kl['details']?></h4>
                            <p><?=$kl['showa']?></p>

                                <span> -- <?=$kl['name']?>,<?=$kl['designation']?></span>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Story End -->

    <!-- Properties News Start -->
        <section class="properties-news-wrapper index section-padding  text-center">
            <div class="container" style="margin-top:40px;">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
                        <h2 class="main-title text-center">Properties News</h2>
                        <div class="dis-title">
                            <p>No one knows our cities as well as we do. Browse our comprehensive neighborhood guides to learn about the most desirable or most up-and-coming places to live across the country.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <? $feed = get_content("https://realty.economictimes.indiatimes.com/rss/topstories");
$xml = simplexml_load_string($feed, "SimpleXMLElement", LIBXML_NOCDATA);
$json = json_encode($xml);
$array = json_decode($json,TRUE);
$items=$array['channel']['item'];
$o=count($items) - 6;
$p=rand(1,$o);
$q=$p+6; $r=1;
foreach($items as $item) {
if($r >= $p && $r < $q){
  echo '

                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="featured-properties text-left">
                            <figure class="featured-image">
                                <a href="'.$item['link'].'">
                                    <img src="'.$item['image']['@attributes']['src'].'" style="width:370px;height:340px;" alt="'.$item['title'].'">
                                </a>
                                <div class="overlay-1"></div>
                            </figure>
                            <h4><a href="'.$item['link'].'">'.limit_text($item['title'],15).'</a></h4>

                            <a href="'.$item['link'].'" class="link">Read more <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>'; } $r++;} ?>

                </div>
            </div>
        </section>
    <!-- Properties News End -->



   <? include 'include/footer.php';?>