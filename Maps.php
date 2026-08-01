<? include 'include/header.php'?>


    <!-- Property Filter Bar Start -->
        <section class="property-grids-filter-wrapper index" style="padding-top: 110px;">
            <div class="row nopad">
                <div class="col-md-12 nopad">
                    <div class="property-grids-filter">
                <ul class="filter">
                    <li>
                        <input id="selectMaps" type="text" class="autocomplete" style="width:300px"  placeholder="Maps" name="Maps" >
                            
                    </li>
                  <li class=" ">
                        <button id="btnMaps" type="button" class=" bg2"  style="color:#fff;padding:0px 15px;"  name="Maps" >Search</button>
                            
                    </li>
                  
                </ul>
               
            </div>
                </div>
            </div>
        </section>
    <!-- Property Filter Bar End -->


    <!-- Property Map Grids Start-->
        <section class="property-map-grids-wrapper index section-padding">
            <div class="row nopad">
                
                <div class="col-xs-12 col-sm-12 col-md-12 left-height nopad" id="mapSectionList">
                   <? $gh=DB::query("SELECT * FROM maps WHERE map_name <> ''");$r=1;$mapList='';
foreach($gh as $h){
    $mapList .= '"'.$h['map_name'].'"';
    if(count($gh) > $r){$mapList .= ", ";}  ?>
                    <div class="col-xs-6 col-sm-3 col-md-3">
                        <div class="featured-properties text-left">
                            <figure class="featured-image">    
                                <a  href="Maps_Detailed.php?mid=<?=$h['mid']?>">
                                    <img src="admin/assets/maps/thumb/<?=$h['thumb_url']?>" alt="<?=$h['map_name']?>">
                                    <span class="overlay-1"></span>
                                </a>
                            </figure>
                            <h5><a href="Maps_Detailed.php?mid=<?=$h['mid']?>"><?=$h['map_name']?></a>
                            <span><a href="Maps_Google.php?mapaddress=<?=$h['map_name']?>,Gurgaon" target="_target" style="display: inline-block;
    float: right;background-color: #0080c6;
    font-weight:bold;color:#fff;
    padding: 7px 10px;
    
    font-size: 13px;">Open on Maps</a></span></h5>
                           
                        </div>
                    </div> <? $r++;
}  ?>
                 
                </div>
            </div>
        </section>
        
    <!-- Property Map Grids End-->

  
<script>
var mapList = [
<?=$mapList;?>];

</script>
  
    
   <? include 'include/footer.php';?>
   