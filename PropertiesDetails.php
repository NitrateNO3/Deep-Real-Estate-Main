<? include 'include/header.php';
$ghk=DB::query("SELECT * from propertyList WHERE pid='$_GET[pid]' and pactive='1'");
echo DB::count();
$j=$ghk[0];
$price=$j['price'] * $j['psize'];
                    $d_logo=developerInfo($j['did'],'logo');
                    $d_name=developerInfo($j['did'],'name');
                    if($j['pimage_name']=='' || $j['pimage_name']=='0'){ $pimage= 'assets/images/NO-Photo.jpg';} 
                    else {$pimage=$j['pimage_name'];}
?>

    <section class="properties-single inner-section-padding index">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-8">
                    <div class="property-title">
                        <h2><?=$j['pname']?> <?=$j['purpose']?> 
                            <small><a href="LocationWiseProperty.php?loc=<?=$j['location']?>"><?=locationName($j['location'])?></a>, <?=cityName($j['city'])?></small>
                        </h2>
                        <h3><?=getPrice($price)?><br /><small><? echo (int)$j['price'] > 0 ? '&#8377 '.$j['price'].' per '.$j['unit1'] : '' ?></small></h3>
                    </div>
<? $mainImg='';$thunbs='';
                                if($pimage == 'assets/images/NO-Photo.jpg'){
                                $mainImg .= '<li>
                                    <figure>
                                        <img src="'.$pimage.'" alt="'.$j['pname'].'">
                                    </figure>
                                </li>'; } else {
                                    $pr=explode(",",$pimage);$y=1;
                                    if(count($pr) <= 1){
                                $mainImg .= '<li>
                                    <figure>
                                        <img src="admin/assets/uploadedPropertyPics/'.$pr[0].'" alt="'.$j['pname'].'">
                                    </figure>
                                </li>'; } else { $thunbs .='<div class="gallery-thumbs-container">
                                <ul id="gallery-thumbs" class="gallery-thumbs-list">';
                               foreach($pr as $gy){
                                $mainImg .= '<li>
                                    <figure>
                                        <img src="admin/assets/uploadedPropertyPics/'.$gy.'" alt="'.$j['pname'].'-'.$y.'">
                                    </figure>
                                </li>';
                                $thunbs .='<li class="thumb-item">
                                        <div class="thumb">
                                            <a href=""><img src="admin/assets/uploadedPropertyPics/'.$gy.'" alt="'.$j['pname'].'-'.$y.'"></a>
                                        </div>
                                    </li>';
                                   
                              $y++; }
                                    $thunbs .='</ul>
                            </div>';
                                }
                                      
                                }
                                ?>
                    <!-- Property image Slider Start -->
                        <div class="slideshow">
                            <ul class="property-image-slider bxslider">
                                
                              <?=$mainImg;?>
                            </ul>
                            
                                    <?=$thunbs?>
                                    
                              
                        </div>
                    <!-- Property image Slider End -->

                    <!-- Property Details Start -->
                        <div class="property-detail-wrapper ">
                            <h4 class="property-single-detail-title">Property Details</h4>
                            <ul>
                               <li>
                                   <div class="title">
                                       <p>Type of Property</p>
                                   </div>
                                   <div class="title-content">
                                       <p><?=typeName($j['ptype'])?></p>
                                   </div>
                               </li>
                               <li>
                                   <div class="title">
                                       <p>Sub-Type</p>
                                   </div>
                                   <div class="title-content">
                                       <p><?=categoryName($j['subtype'])?></p>
                                   </div>
                               </li>
                               <li>
                                   <div class="title">
                                       <p>Status</p>
                                   </div>
                                   <div class="title-content">
                                       <p><?=$j['purpose']?></p>
                                   </div>
                               </li> 
                               
                               
                               
                            </ul>
                            <ul>
                               <li>
                                   <div class="title">
                                       <p>Size</p>
                                   </div>
                                   <div class="title-content">
                                       <p><?=$j['psize'].' '.$j['unit']?></p>
                                   </div>
                               </li> 
                               <li>
                                   <div class="title">
                                       <p>Possession</p>
                                   </div>
                                   <div class="title-content">
                                       <p><?=$j['movein']?></p>
                                   </div>
                               </li> 
                               <li>
                                   <div class="title">
                                       <p>Builder</p>
                                   </div>
                                   <div class="title-content">
                                       <p><?=$d_name?></p>
                                   </div>
                               </li> 
                               <li>
                                   <div class="title">
                                       <p>Listing Date</p>
                                   </div>
                                   <div class="title-content">
                                       <p><?=randomDate()?></p>
                                   </div>
                               </li> 
                               
                            </ul>
                        </div>
                    <!-- Property Details End -->

                    <!-- Property Description Start -->
                        <div class="property-description-wrapper">
                            <h4 class="property-single-detail-title">Property Description</h4>
                           <p><?=$j['details']?></p></div>
                    <!-- Property Description End -->

                    <!-- Property Amenities Start -->
                        <div class="property-amenities-wrapper">
                            <h4 class="property-single-detail-title">Property Amenities</h4>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <ul>
                                <? $amen=explode(",",$j['amenities']);$t=1;
                                        foreach($amen as $an){
                                            echo "<li>$an</li>";
                                          if(count($amen) > $t){echo '</ul>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <ul>';} $t++;  
                                        }
                                            ?>
                                </ul>
                                     
                                </div>
                            </div>
                        </div>
                    <!-- Property Amenities End -->


                     <!-- Location Start -->
                        <div class="property-location-wrapper index">
                            <h4 class="property-single-detail-title">Location</h4>
                            <iframe src="include/mapsAPI.php?mapaddress=<?=locationName($j['location'])?>,<?=cityName($j['city'])?>" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    
                    <!-- Location End -->

                    <!-- Other Properties Start -->
                        
                    <!-- Other Properties End -->
                </div>

                <div class="col-xs-12 col-sm-5 col-md-4 side-bar">
                    <div class="search-porperties text-left">
                        <h6 class="sidebar-title">Send an Inquiry</h6>
                        <div class="search-box">
                            <input type="text" id="p_name"  name="p_name" placeholder="Full name *">
                            <input type="text" name="p_email" id="p_email" placeholder="Email address *">
                            <input type="text" name="p_phone" id="p_phone" placeholder="Telephone *">
                            <input type="hidden" name="p_pid" id="p_pid" value="<?=$j['pid']?>">
                            <input type="hidden" name="p_pname" id="p_pname" value="<?=$j['pname']?>">
                            <textarea name="p_message" id="p_message"></textarea>
                            <button class="btn-1 bg2" id="sendEnq"><span> Send</span></button>
                        </div>
                    </div>

                    <div class="side-bar-agent-detail-wrapper">
                        <h6 class="sidebar-title">Agent Detail</h6>
                        <div class="side-bar-agent-detail">
                            <figure>
                                <img src="admin/<?=$admin['OwnerPic']?>" alt="<?=$admin['OwnerName']?>">
                            </figure>
                            <ul class="side-bar-agent">
                                <li><i class="fa fa-map-marker"></i> <?=cityName($j['city'])?></li>
                                <li><i class="fa fa-phone"></i> <?=$admin['Mobile1']?></li>
                                <li><a href="mailto:<?=$admin['Email1']?>"><i class="fa fa-envelope"></i><?=$admin['Email1']?></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="daily-email bg2 text-left">
                        <h4>Get daily property email alerts in your inbox.</h4>
                        <input type="email" name="email" placeholder="Email Address">
                        <button class="btn-1 bg1"><span>Subscribe now</span></button>
                    </div>

                    <div class="Categories text-left">
                        <h6 class="sidebar-title">Other Locations</h6>
                        <ul>
                            <? $yt=DB::query("SELECT * FROM propertyList GROUP by location ORDER BY RAND() LIMIT 0,8");
                            foreach($yt as $t){
                            echo '<li><a href="LocationWiseProperty.php?loc='.$t['location'].'">'.locationName($t['location']).'</a></li>';}
                           ?> 
                        </ul>
                    </div>

                    <div class="popular-news text-left">
                        <h6 class="sidebar-title">Newly Listed Properties</h6>
                        
                         <? $it=DB::query("SELECT * FROM propertyList WHERE ptype='$j[ptype]' AND pid<>'$j[pid]' ORDER BY pid DESC LIMIT 0,6");
                            foreach($it as $t){
                                $price=$t['price'] * $t['psize'];
                            echo '<div class="news">
                            <figure>
                                <a href="PropertiesDetails.php?pid='.$t['pid'].'">
                                  <img src="admin/assets/uploadedPropertyPics/'.explode(",",$t['pimage_name'])[0].'" alt="'.$t['pname'].'">
                                </a>
                            </figure>
                            <div class="popular-news-title">
                                <h6><a href="PropertiesDetails.php?pid='.$t['pid'].'">'.$t['pname'].'</a></h6>
                                <span>'.locationName($t['location']).', '.cityName($t['city']).'</span>
                                <span class="price">&#8377 '.getprice($price).'</span>
                            </div>
                        </div>';}
                           ?> 
                        
                        <div class="news">
                            <a href="<? echo $j['ptype'] == '2'? "Residentials" : "Commercials"; ?>.php" class="link">View all properties <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-7 col-md-12">
                <div class="other-properties index">
                            <h4 class="property-single-detail-title">Other Properties Within This Area</h4>
                            <ul class="other-single-slider">
                                <? $qw=DB::query(" SELECT * from propertyList WHERE pid<>'$j[pid]' ORDER BY RAND() LIMIT 0,6");
                                        $resProp='';$commProp='';$eR=1;$eC=1;
 foreach($qw as $w){
     $price=$w['price'] * $w['psize'];
                    $d_logo=developerInfo($w['did'],'logo');
                    $d_name=developerInfo($w['did'],'name');
                    if($w['pimage_name']=='' || $w['pimage_name']=='0'){ 
                        $pimage= 'assets/images/NO-Photo.jpg';} else {
                            $pimage='admin/'.$w['pimage_name'];}
                   if($w['ptype']=='2'){ $resT='Residentials';}else if($w['ptype']=='1'){ $resT='Commercials';}
                                echo ' <li class="col-md-3">   
                                            <div class="featured-properties text-left">
                                                <figure class="featured-image">    
                                                    <a href="'.$resT.'.php?pid='.$w['pid'].'">
                                                        <img src="admin/assets/uploadedPropertyPics/'.explode(",",$w['pimage_name'])[0].'" style="width:360px; height:331px" alt="'.$w['pname'].'">
                                                        <span class="overlay-1"></span>
                                                    </a>
                                                    <figcaption>
                                                        <span>'.$d_name.'</span>
                                                       <span>'.$w['psize'].' '.$w['unit'].'</span>
                                                       
                                                    </figcaption>
                                                </figure>
                                                <h5><a href="'.$resT.'.php?pid='.$w['pid'].'">'.$w['pname'].'</a></h5>
                                                <span>'.locationName($w['location']).', '.cityName($w['city']).'</span>
                                                <span>&#8377 '.getPrice($price).' </span>
                                                
                                            </div>
                                       
                                </li>';} ?>
                                    
                                      
                               
                            </ul>
                        </div>
            </div>
        </div>
        
    </section>
    
    <? include 'include/footer.php';?>