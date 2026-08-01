<? include 'include/header.php';
if(isset($_GET['mapaddress'])){$givenMaps=$_GET['mapaddress'];}else{$givenMaps='Gurgaon, India';}
?>


   


    <!-- Property Map Grids Start-->
        <section class="property-map-grids-wrapper index section-padding">
            <div class="row nopad">
                <div class="col-xs-12 col-sm-12 col-md-12 nopad pull-right">
                    <div class="property-map-grids">
                        <iframe id="reloadMap" src="include/mapsAPI.php?mapaddress=<?=$givenMaps?>" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
              
            </div>
        </section>
        
    <!-- Property Map Grids End-->

  

  
    
   <? include 'include/footer.php';?>
   