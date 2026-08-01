<? include 'include/adminHeader.php';?>

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title">Managing Maps</h4>
                                <div class="row">
                                <div class="card col-4">
                                    <div class="card-body">
                                         <form id="addProperty">
                                        
                                       
                                           
                                            <div class="row align-items-center"> 
                                                    <div class="mb-3 ">
                                                        
                                                    
                          <? if(isset($_GET['editMap'])){
                              $map=DB::query("SELECT * from maps where mid='$_GET[editMap]'")[0];
                          ?>                               
    <div class="mb-3">
    <label for="newMaptoAdd" class="form-label">Edit Map</label>
    <input class="form-control" type="text" required="" id="editMaptoAdd" value="<?=$map['map_name']?>">
</div>    <div class="form-row"><div class="mb-3 ">
    <label for="newMapLogo" class="form-label">Pick MapImage</label>
      <input class="form-control" id="editMapLogo" type="file"  > 
      
</div>
<div class="mb-3 "><img src="assets/maps/thumb/<?=$map['thumb_url']?>" width="200" ></div>
</div> 
<div class="mb-2 text-center">
    <button class="btn rounded-pill btn-primary" id="editThisMap">Save</button>
</div> <?
                          } else { ?>                               
    <div class="mb-3">
    <label for="newMaptoAdd" class="form-label">Add New Map</label>
    <input class="form-control" type="text" required="" id="newMaptoAdd" placeholder="Enter Map Name">
</div>    <div class="mb-3">
    <label for="newMapLogo" class="form-label">Pick Map Logo</label>
      <input class="form-control" id="newMapLogo" type="file"  > 
</div> 
<div class="mb-2 text-center">
    <button class="btn rounded-pill btn-primary" id="saveMap">Save</button>
</div> <? } ?>
    
                                                      
    
                                                    </div>
                                                </div>
    </form>
                                            </div> <!-- end col -->

                                             <!-- end col -->
                                        </div>
                                        <!-- end row-->
 <div class="card col-7" style="margin-left:40px">
                                    <div class="card-body">
                                        <div class="row align-items-center"> 
                                              <div class="col-xl-12">
                                                   <h4 class="header-title mt-0 mb-3 text-primary">Existing Maps in our List</h4>

                            <div class="card">
                                
                                <div class="card-body taskboard-box">
                                    

                                   
                                    <ul class="sortable-list list-unstyled taskList ui-sortable" id="upcoming">
                                   <? $devL=DB::query("SELECT * FROM maps ORDER BY map_name ASC");
        foreach($devL as $dL){ ?>
        <li class="ui-sortable-handle">
                                            <div class="kanban-box">
                                                <div class="checkbox-wrapper float-start">
                                                    <div class="form-check form-check-success ">
                                                        <a href="../Maps_Detailed.php?mid=<?=$dL['mid']?>" target="_blank" ><img src="assets/maps/<?=$dL['thumb_url']?>" alt="<?=$dL['map_name']?>" style="width:100px;margin-right:40px; height:80px !important" class="avatar-sm ">
                                                         </a>   
                                                    </div>
                                                </div>
                                              <div class="kanban-detail" style='padding-left:40px !important'>
                                                   <a href="../Maps_Detailed.php?mid=<?=$dL['mid']?>" target="_blank" ><h4 class="mt-1" style="float:left"><?=$dL['map_name']?></h4></a>
                                                    <ul class="list-inline" style="float:right">
                                                        
                                                      
                                                         <li class="list-inline-item">
<a href="?editMap=<?=$dL['mid']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit This Map!" >
    <i style='color:blue' class="fe-edit"></i>
</a>
                                                        </li>
                                                        <li class="list-inline-item">
<a href="<?=$dL['mid']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete this Map!" class="deleteMap">
    <i style='color:red' class="fe-x-circle"></i>
</a>
                                                        </li>
                                                    </ul>
                                                    <div style="clear:both"></div>
                                                </div> 
                                            </div>
                                        </li>
<? } ?>
                                       

                                    </ul>

                               
                                </div>
                            </div>

                        </div>
  

    
                                                      
    
                                                    </div>
                                                </div>
   
                                            </div> <!-- end col -->

                                             <!-- end col -->
                                        </div></div>
                                
                                    </div> <!-- end card-body -->
                                </div> <!-- end card -->
                            </div><!-- end col -->
                      
                        <!-- end row -->

                      
        </div> <!-- container -->

               
        
       

        <!-- Vendor -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>

 


        <script src="assets/libs/selectize/js/standalone/selectize.min.js"></script>
  
        <script src="assets/libs/multiselect/js/jquery.multi-select.js"></script>
        <script src="assets/libs/select2/js/select2.min.js"></script>
   
        <script src="assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <!-- Init js-->
        <script src="assets/js/pages/form-advanced.init.js"></script>
 <script src="assets/libs/tippy.js/tippy.all.min.js"></script>
 <script src="assets/libs/sweetalert2/sweetalert2.all.min.js"></script>

        
        <!-- App js-->
        <script src="assets/js/app.min.js"></script>
        <script>
    
        ////////Add City ////////
         $("#saveMap").click(function(e){
              e.preventDefault(e); 
              var dname=$("#newMaptoAdd");
              var dlogo=$("#newMapLogo");
             
              if(dname.val()==''){alert('Map Name can not be left blank!!');dname.focus(); } else
              if(dlogo.val()==''){alert('Map must be attached!!'); } else
              {
         var formData = new FormData();
formData.append('file[]', dlogo[0].files[0]);
formData.append('dname', dname.val());


$.ajax({
       url : 'include/function_do.php?newMaptoAdd=yes',
       type : 'POST',
       data : formData,
       processData: false,  // tell jQuery not to process the data
       contentType: false,
       enctype: 'multipart/form-data',// tell jQuery not to set contentType
       success: function(data){
                        if(data==1){ alert('Map added!');
                            window.location.href = 'ManageMaps.php';
                        } else {
                                                     alert(data);}},  
                  error: function(jqXhr, textStatus, errorMessage){
                            console.log("Error: ", errorMessage);
                        },
                  cache: false,
                   });}
        });
  ////////Edit City ////////
  <? if(isset($_GET['editMap'])) { ?>
         $("#editThisMap").click(function(e){
              e.preventDefault(e); 
            
               var dname=$("#editMaptoAdd");
              var dlogo=$("#editMapLogo");
            
              if(dname.val()==''){alert('Map Name can not be left blank!!');dname.focus(); } else
              if(dlogo.val()==''){alert('Map Logo must be attached!!'); } else
            
              {
                   var formData = new FormData();
formData.append('file[]', dlogo[0].files[0]);
formData.append('dname', dname.val());


         $.ajax({
       url : 'include/function_do.php?editMap=<?=$_GET['editMap']?>',
       type : 'POST',
       data : formData,
       processData: false,  // tell jQuery not to process the data
       contentType: false,
       enctype: 'multipart/form-data',// tell jQuery not to set contentType
       success: function(data){
                        if(data==1){ alert('Map edited!');
                         window.location.href = 'ManageMaps.php';
                        } else {
                                                     alert(data);}},  
                  error: function(jqXhr, textStatus, errorMessage){
                            console.log("Error: ", errorMessage);
                        },
                  cache: false,
                   });}
    
        }); <? } ?>
 ////////Delete City ////////
         $(".deleteMap").click(function(e){
                       e.preventDefault(e); 
              var cn = $(this).attr('href');
          Swal.fire({
              title:"Are you sure!!",
              text:'You want to delete this Map?',
              showCancelButton:!0,
              confirmButtonText:"Delete",
              showLoaderOnConfirm:!0,
              confirmButtonColor:"#4a4fea",
              cancelButtonColor:"#f34e4e",
              
            allowOutsideClick:!1
              
          }).then(function(e){
              $.post("include/function_do.php?deleteMap="+cn ,function(data,status){
                  if(data==1){
                        Swal.fire({
                  icon:"success",
                  title:'Map Deleted!',
              confirmButtonColor:"#4a4fea",
              }); window.location.href = 'ManageMaps.php';
                  } else {alert ('Some Error!!'+data);} 
              });
            });
            
    
        
      
        });
 
        </script>
        
    </body>
</html>