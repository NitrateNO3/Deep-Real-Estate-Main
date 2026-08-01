<? include 'include/header.php';
$ghk=DB::query("SELECT * from developers WHERE did='$_GET[did]'");
echo DB::count();
$gh=$ghk[0];
?>

    <!-- Agent Detail Start -->
        <section class="agent-single-page-wrapper index section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <figure>
                            <img src="admin/assets/uploadedDevelopersLogo/<?=$gh['logo']?>" alt="<?=$gh['name']?>">
                        </figure>
                        
                        
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 col-md-offset-1">
                        <div class="details">
                            <div class="agents-details text-left">
                                <h4><?=$gh['name']?></h4>
                                </div>
                            
                        </div>
                        <div class="short-intro">
                            <h4>Description</h4>
                            <p><?=$gh['details']?></p>

                         
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- Agent Detail End -->

    <!-- Angela's Listing Start -->
    <? 	$targetpage = "DevelopersDetails.php?did=54&"; 	
	$limit =10; 
	$result1 = DB::query("SELECT * FROM propertyList WHERE did='$_GET[did]' and pactive='1'");
    if(DB::count()){ ?>
         <section class="property-grids-wrapper text-center index section-padding">
            <div class="container">
                <div class="row">
                    <? 
	include 'admin/include/pagin.php';
	$query1 = "SELECT * FROM propertyList WHERE did='$_GET[did]' and pactive='1' ORDER BY pid desc LIMIT $pag, $limit";
	
	$hj = DB::query($query1);
	$dbx=DB::count();
	$d_name=developerInfo($_GET['did'],'name');
                    ?>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="property-grids-filter">
                            <ul class="filter">
                                
                                <li>Properties by <?=$d_name?>  (<?=$dbx?> Results)</li>
                            </ul>
                            
                        </div>
                    </div>
                    <?  foreach($hj as $j){
                     $price=$j['price'] * $j['psize'];
                    $d_logo=developerInfo($j['did'],'logo');
                    
                    if($j['pimage_name']=='' || $j['pimage_name']=='0'){ $pimage= 'assets/images/NO-Photo.jpg';} else {$pimage='admin/assets/uploadedPropertyPics/'.explode(",",$j['pimage_name'])[0];}
                   
                    ?>
                    <div class="col-md-12 col-sm-12 col-xs-12 ">
                        <div class="property-list">
                            <div class="row">                            
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <figure>
                                        <a href="PropertiesDetails.php?pid=<?=$j['pid']?>">
                                            <img src="<?=$pimage?>" alt="<?=$j['pname']?>" style="width:370px;height:290px;">
                                            <span class="overlay-1"></span>
                                        </a>
                                    </figure>
                                </div>
                                <div class="col-xs-12 col-sm-5 col-md-6">
                                    <div class="property-list-detail text-left">
                                        <h5><a href="PropertiesDetails.php?pid=<?=$j['pid']?>" target="_blank"><?=$j['pname']?></a>
                                        <small><?=locationName($j['location'])?>, <?=cityName($j['city'])?></small></h5>
                                        <p><?=limit_text($j['details'],35) ?>...</p>
                                        <ul> <? $amen=array_slice(explode(",",$j['amenities']),0, 6,true);
                                        foreach($amen as $an){
                                            echo "<li>$an</li>";}?>
                                        </ul>
                                        <a href="PropertiesDetails.php?pid=<?=$j['pid']?>" class="link">view details</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-2">
                                    <h6><?=getPrice($price)?><br /><small><? echo (int)$j['price'] > 0 ? '&#8377 '.$j['price'].' per '.$j['unit1'] : '' ?> </small></h6>
                                    <div class="talk-to text-center">
                                        <a href="tel:<?=$admin['Phone1']?>" class="font1 btn-5 btn-1 text-uppercase">
                                            <span><?=$admin['Phone1']?></span>
                                        </a>
                                        <a href="tel:<?=$admin['Mobile1']?>" class="font1 btn-4 btn-1 text-uppercase">
                                            <span>Request Details</span>
                                        </a>
                                    </div>
                                    <div class="agent">
                                        <figure>
                                            <img src="admin/assets/uploadedDevelopersLogo/<?=$d_logo?>" alt="<?=$d_name?>">
                                        </figure>
                                        <a href="DevelopersDetails.php?did=<?=$j['did']?>"><?=$d_name?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <? } ?>
                   
                    
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                           <?=$pagination?>
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    <? } ?>
    <!-- Angela's Listing End -->

   <? include 'include/footer.php';?>