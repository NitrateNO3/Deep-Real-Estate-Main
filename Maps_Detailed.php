<? include 'include/header.php';
$gh=DB::query("SELECT * FROM maps WHERE mid='$_GET[mid]'")[0];
?>

<style>
    .thisButton{}
    .thisButton a{background: #337ab7 !important;font-weight:bold;color:#ffffff !important}
    .thisButton a:hover{color:#ffffff !important;background: #333 !important;}
    
</style>
    <!-- Property Filter Bar Start -->
        <section class="property-grids-filter-wrapper index" style="padding-top: 110px;">
            <div class="row nopad">
                <div class="col-md-12 nopad">
                    <div class="property-grids-filter">
                <ul class="filter">
                    <li>
                        <h3><?=$gh['map_name']?></h3>    
                    </li>
                  
                </ul>
                <ul class="list-view">
                    <li class=" thisButton" ><a  href="Maps.php">Find More Maps</a></li>
                  
                </ul>
            </div>
                </div>
            </div>
        </section>
    <!-- Property Filter Bar End -->


    <!-- Property Map Grids Start-->
        <section class="property-map-grids-wrapper index section-padding">
            <div class="row nopad">
                <a href="admin/assets/maps/<?=$gh['map_url']?>" target="_blank"><img src="admin/assets/maps/<?=$gh['map_url']?>" alt="<?=$gh['map_name']?>" title="<?=$gh['map_name']?>" /></a>
              </div>
        </section>
        
    <!-- Property Map Grids End-->

  

  
    
   <? include 'include/footer.php';?>
   