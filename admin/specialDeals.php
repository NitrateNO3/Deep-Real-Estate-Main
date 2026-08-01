<? include 'include/adminHeader.php';?>

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-8">
                                <?
                                	$targetpage = "ListProperty.php?"; 	
	$limit =10; 
	$result1 = DB::query("SELECT * FROM propertyList WHERE isBestDeal='1' AND pactive='1'");
	include 'include/pagin.php';
	$hj = DB::query("SELECT * FROM propertyList WHERE isBestDeal='1' AND pactive='1' ORDER BY pid DESC LIMIT $pag,$limit");
          foreach($hj as $j){
          $price=$j['price'] * $j['psize'];
                    $d_logo=developerInfo($j['did'],'logo');
                    $d_name=developerInfo($j['did'],'name');
                    if($j['pimage_name']=='' || $j['pimage_name']=='0'){ $pimage= '../assets/images/NO-Photo.jpg';} else {$pimage='assets/uploadedPropertyPics/'.explode(",",$j['pimage_name'])[0];}
                  
          ?>
                                
                                <div class="card">
                                <div class="bg-picture card-body">
                                    <div class="d-flex align-items-top">
                                       <div class="float-start"> <img src="<?=$pimage?>" style="width:86px;height:86px;" class="flex-shrink-0 rounded-circle avatar-xl img-thumbnail  me-3" alt="<?=$j['pname']?>">
<br /><br /><?=$j['psize'].' '.$j['unit']?></div>
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h4 class="m-0"><?=$j['pname']?></h4>
                                            <p class="text-muted"><?=locationName($j['location'])?>,<?=cityName($j['city'])?></p>
                                            <p class="font-13" style="width: 524px;"><?=limit_text($j['details'],20)?></p>

                                            <ul class="social-list list-inline mt-3 mb-0 " style="float:right">
                                                <li class="list-inline-item">
                                                   
                                                 <? if($j['isBestDeal']=='0'){ ?>
                                                    <a href="act=1&pid=<?=$j['pid']?>" data-plugin="tippy" data-tippy-followcursor="true" 
                                                    data-tippy-arrow="true" 
                                                    data-tippy-animation="fade"
                                                    data-tippy="" data-original-title="Make Best Deal!" class="bestdeal social-list-item border-purple text-green"><i class="fe-chevrons-up"></i></a> 
                                                    <? } else { ?>
                                                     <a href="act=0&pid=<?=$j['pid']?>" data-plugin="tippy" data-tippy-followcursor="true" 
                                                    data-tippy-arrow="true" 
                                                    data-tippy-animation="fade"
                                                    data-tippy="" title="Remove from Best Deal" class="bestdeal social-list-item border-purple text-blue" ><i class="fe-chevrons-down"></i></a> 
                                                   
                                                    <? }  ?>
                                                </li> <li class="list-inline-item">
                                                  &nbsp;
                                                </li> <li class="list-inline-item">
                                                    <a href="editProperty.php?pid=<?=$j['pid']?>" class="editme social-list-item border-purple text-purple" data-plugin="tippy" data-tippy-followcursor="true" 
                                                    data-tippy-arrow="true" 
                                                    data-tippy-animation="fade"
                                                    data-tippy="" title="Edit This Property!"><i class="fe-edit"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="<?=$j['pid']?>" data-plugin="tippy" data-tippy-followcursor="true" 
                                                    data-tippy-arrow="true" 
                                                    data-tippy-animation="fade"
                                                    data-tippy="" title="Delete this property!" class="deleteme social-list-item border-danger text-danger" ><i class="fe-x-circle"   ></i></a>
                                                </li>
                                                                   </ul>
        
                                        </div>

                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
<? } ?>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->
<ul class="pagination">
                           <?=$pagination?>
                        </ul>
                      
                    </div> <!-- container -->

                </div> <!-- content -->

                
       

            
        </div>
        
       

        <!-- Vendor -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
  <script src="assets/libs/tippy.js/tippy.all.min.js"></script>
        <!-- App js-->
        <script src="assets/js/app.min.js"></script>
        <script>
       
              $(".deleteme").click(function(e){
                  e.preventDefault(e);
                
               var pid = $(this).attr("href");
if(confirm("Are you sure?")) {
$.ajax({
       url : 'include/function_do.php?deleteProperty='+pid,
       type : 'POST',
       data : {'1':1},
       processData: false,  // tell jQuery not to process the data
       contentType: false,
       success: function(data){
           if(data=='1') {alert('Property ID '+ pid + ' deleted!'); window.location.href = 'ListProperty.php';} else {
            alert(data);}
        },  error: function(jqXhr, textStatus, errorMessage){
      console.log("Error: ", errorMessage);
   },
        
        cache: false,
                   
    });}
            });
            
    $(".bestdeal").click(function(e){
        e.preventDefault(e);
        var gh=$(this).attr('href');
        $.post("include/function_do.php?"+gh, function(data,status){
            if(data==1){alert('Best Deal Status Changed.');
                window.location.href = 'ListProperty.php';
            } else{ alert('Some error!!'+data);}
        });
        
    });        
        </script>
        
    </body>
</html>