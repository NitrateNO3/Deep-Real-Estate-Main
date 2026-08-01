<? include 'include/adminHeader.php';?>

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title">Managing HomePage Banner</h4>
                                
                                <div class="row">
                                <div class="card col-4">
                                    <div class="card-body">
                                         <form id="addProperty">
                                        
                                       
                                           
                                            <div class="row align-items-center"> 
                                                    <div class="mb-3">
                                                        
                                                    
                          <? if(isset($_GET['editBanner'])){
                              $dev=DB::query("SELECT * from banners where banner_id='$_GET[editBanner]'")[0];
                          ?>                               
       <div class="mb-3 " style="padding-top:40px">
           
    <label for="editBannerImg" class="form-label">Pick Banner</label>
      <input class="form-control" id="editBannerImg" type="file"  > 
      <h4>Remember Image size must be minimum of 1300 px Width and 800 px Height</h4>
</div>
<div class="mb-3 "><img src="assets/uploadBanners/<?=$dev['banner_path']?>" width="100" ></div>

<div class="mb-2 text-center">
    <button class="btn rounded-pill btn-primary" id="editBanner">Save</button>
</div> <?
                          } else { ?>                               
     <div class="mb-3" style="padding-top:40px">
                    <h4>Remember Image size must be 1300 px Width and 800 px Height</h4>
    <label for="newBannerImg" class="form-label">Pick Banner</label>
      <input class="form-control" id="newBannerImg" onchange="getInfo()" type="file" > 
</div> 
<div class="mb-2 text-center">
    <button class="btn rounded-pill btn-primary" id="saveBanner">Save</button>
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
                                                   <h4 class="header-title mt-0 mb-3 text-primary">Existing Banners in our List</h4>

                            <div class="card ">
                                
                                <div class="card-body taskboard-box">
                                    

                                   
                                    <ul class="sortable-list list-unstyled taskList ui-sortable" id="upcoming">
                                        <li class=" card card-draggable">
                                            <div class="kanban-box ">
                                                <div class="checkbox-wrapper float-start" style='margin-right:20px !important;'>
                                                      Position
                                                            
                                                    
                                                </div>
                                              <div class="kanban-detail" style='margin-left:40px !important'>
                                                   Banner Image
                                                    <ul class="list-inline" style="float:right">
                                                        <li class="list-inline-item">Edit</li>
                                                        <li class="list-inline-item">Delete</li>
                                                    </ul>
                                                    <div style="clear:both"></div>
                                                </div> 
                                            </div>
                                        </li>
                                   <? $devL=DB::query("SELECT * FROM banners ORDER BY banner_id ASC");
        foreach($devL as $dL){ ?>
        <li class=" card card-draggable">
                                            <div class="kanban-box ">
                                                <div class="checkbox-wrapper float-start" style='margin-right:20px !important;'>
                                                        <input type="text" style="width:60px;" hef="<?=$dL['banner_id']?>"  
                                                        value="<?=$dL['banner_position']?>" class="form-control updatePosition">
                                                            
                                                    
                                                </div>
                                              <div class="kanban-detail" style='margin-left:40px !important'>
                                                   <a href="assets/uploadBanners/<?=$dL['banner_path']?>" target="_blank" >
                                                       <img src="assets/uploadBanners/<?=$dL['banner_path']?>" alt="<?=$dL['banner_path']?>" style="width:80px" class="avatar-sm "></a>
                                                    <ul class="list-inline" style="float:right">
                                                        
                                                      
                                                         <li class="list-inline-item">
<a href="?editBanner=<?=$dL['banner_id']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit This Banner!" >
    <i style='color:blue' class="fe-edit"></i>
</a>
                                                        </li>
                                                        <li class="list-inline-item">
<a href="<?=$dL['banner_id']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete this Banner!" class="deleteBanner">
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
                                        </div>   </div>
                                
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
<script src="assets/libs/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/js/pages/draggable.init.js"></script>
        <!-- App js-->
        <script src="assets/js/app.min.js"></script>
        <script>
        var _URL = window.URL || window.webkitURL;
    $(".updatePosition").blur(function(e){
          e.preventDefault(e); 
              var bnid=$(this).attr('hef');
              var pos=$(this).val(); 
              $.ajax({
       url : 'include/function_do.php?updateBannerPosition='+bnid+'&pos='+pos,
       type : 'POST',
       data : {'a1':1},
       processData: false,  // tell jQuery not to process the data
       contentType: false,
        success: function(data){
                        if(data==1){ alert('Position Updated!');
                         window.location.href = 'ManageBanners.php';
                        } else {
                                                     alert(data);}},  
                  error: function(jqXhr, textStatus, errorMessage){
                            console.log("Error: ", errorMessage);
                        },
                  cache: false,
                   });
    })
;    


// here's how to use the helper
 function getInfo() {
 if((file = $("#newBannerImg")[0].files[0]) ){
        img = new Image();
        var objectUrl = _URL.createObjectURL(file);
        img.onload = function () {
            if(this.width < 1300){ alert('Cannot Upload. Image dimention must be 1920 x 1200 pixes');$("#newBannerImg").val('');} else
             if(this.height < 800){ alert('Cannot Upload. Image dimention must be 1920 x 1200 pixes');$("#newBannerImg").val('');} 
             return false;
             _URL.revokeObjectURL(objectUrl);
        } 
          img.src = objectUrl;
          
 }
        
        
       
    
}
////////Add City ////////
         $("#saveBanner").click(function(e){
              e.preventDefault(e); 
            
              var dlogo=$("#newBannerImg");
           
              if(dlogo.val()==''){alert('Banner must be attached!!'); } else
        
              {
         var formData = new FormData();
formData.append('file[]', dlogo[0].files[0]);

$.ajax({
       url : 'include/function_do.php?newBannertoAdd=yes',
       type : 'POST',
       data : formData,
       processData: false,  // tell jQuery not to process the data
       contentType: false,
       enctype: 'multipart/form-data',// tell jQuery not to set contentType
       success: function(data){
                        if(data==1){ alert('Banner added!');
                           // window.location.href = 'ManageBanners.php';
                        } else {
                                                     alert(data);}},  
                  error: function(jqXhr, textStatus, errorMessage){
                            console.log("Error: ", errorMessage);
                        },
                  cache: false,
                   });
                   
                   }
           
           
            
              
             
        });
  ////////Edit City ////////
  <? if(isset($_GET['editBanner'])) { ?>
         $("#editBanner").click(function(e){
              e.preventDefault(e); 
            
            
              var dlogo=$("#editBannerImg");
           
           
              if(dlogo.val()==''){alert('Banner must be attached!!'); } else
               if ((file = dlogo[0].files[0])) {
        img = new Image();
        var objectUrl = _URL.createObjectURL(file);
        img.onload = function () {
            if(this.width != 1920){ alert('Cannot Upload. Image dimention must be 1920 x 1200 pixes');} else
             if(this.height != 1200){ alert('Cannot Upload. Image dimention must be 1920 x 1200 pixes');} else 
              
              {
                   var formData = new FormData();
formData.append('file[]', dlogo[0].files[0]);

         $.ajax({
       url : 'include/function_do.php?editBanner=<?=$_GET['editBanner']?>',
       type : 'POST',
       data : formData,
       processData: false,  // tell jQuery not to process the data
       contentType: false,
       enctype: 'multipart/form-data',// tell jQuery not to set contentType
       success: function(data){
                        if(data==1){ alert('Banner edited!');
                           window.location.href = 'ManageBanners.php';
                        } else {
                                                     alert(data);}},  
                  error: function(jqXhr, textStatus, errorMessage){
                            console.log("Error: ", errorMessage);
                        },
                  cache: false,
                   });}
                   
            _URL.revokeObjectURL(objectUrl);
        };
        img.src = objectUrl;
    }  
    
        }); <? } ?>
 ////////Delete City ////////
         $(".deleteBanner").click(function(e){
                       e.preventDefault(e); 
              var cn = $(this).attr('href');
          Swal.fire({
              title:"Are you sure!!",
              text:'You want to delete this Banner?',
              showCancelButton:!0,
              confirmButtonText:"Delete",
              showLoaderOnConfirm:!0,
              confirmButtonColor:"#4a4fea",
              cancelButtonColor:"#f34e4e",
              
            allowOutsideClick:!1
              
          }).then(function(e){
              $.post("include/function_do.php?deleteBanner="+cn ,function(data,status){
                  if(data==1){
                        Swal.fire({
                  icon:"success",
                  title:'Banner Deleted!',
              confirmButtonColor:"#4a4fea",
              }); window.location.href = 'ManageBanners.php';
                  } else {alert ('Some Error!!');} 
              });
            });
            
    
        
      
        });
 
        </script>
        
    </body>
</html>