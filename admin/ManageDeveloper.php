<? include 'include/adminHeader.php';?>

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-8">
                                <h4 class="header-title">Managing Developers</h4>
                                <div class="card">
                                    <div class="card-body">
                                         <form id="addProperty">
                                        
                                       
                                           
                                            <div class="row align-items-center"> 
                                                    <div class="mb-3 col-6">
                                                        
                                                    
                          <? if(isset($_GET['editDev'])){
                              $dev=DB::query("SELECT * from developers where did='$_GET[editDev]'")[0];
                          ?>                               
    <div class="mb-3">
    <label for="newDevelopertoAdd" class="form-label">Edit Developer</label>
    <input class="form-control" type="text" required="" id="editDevelopertoAdd" value="<?=$dev['name']?>">
</div>    <div class="form-row"><div class="mb-3 ">
    <label for="newDeveloperLogo" class="form-label">Pick Logo</label>
      <input class="form-control" id="editDeveloperLogo" type="file"  > 
      
</div>
<div class="mb-3 "><img src="assets/uploadedDevelopersLogo/<?=$dev['logo']?>" width="100" ></div>
</div> <div class="mb-3">
    <label for="newDevelopertoDetails" class="form-label">Write Developer Details</label>
 <textarea class="form-control" id="editDevelopertoDetails" rows="8" cols="50" placeholder="Write here"><?=$dev['details']?></textarea>
</div>
<div class="mb-2 text-center">
    <button class="btn rounded-pill btn-primary" id="editDeveloper">Save</button>
</div> <?
                          } else { ?>                               
    <div class="mb-3">
    <label for="newDevelopertoAdd" class="form-label">Add New Developer</label>
    <input class="form-control" type="text" required="" id="newDevelopertoAdd" placeholder="Enter Developer Name">
</div>    <div class="mb-3">
    <label for="newDeveloperLogo" class="form-label">Pick Developer Logo</label>
      <input class="form-control" id="newDeveloperLogo" type="file"  > 
</div> <div class="mb-3">
    <label for="newDevelopertoDetails" class="form-label">Write Developer Details</label>
 <textarea class="form-control" id="newDevelopertoDetails" rows="8" cols="50" placeholder="Write here"></textarea>
</div>
<div class="mb-2 text-center">
    <button class="btn rounded-pill btn-primary" id="saveDeveloper">Save</button>
</div> <? } ?>
    
                                                      
    
                                                    </div>
                                                </div>
    </form>
                                            </div> <!-- end col -->

                                             <!-- end col -->
                                        </div>
                                        <!-- end row-->
 <div class="card">
                                    <div class="card-body">
                                        <div class="row align-items-center"> 
                                              <div class="col-xl-12">
                                                   <h4 class="header-title mt-0 mb-3 text-primary">Existing Developers in our List</h4>

                            <div class="card">
                                
                                <div class="card-body taskboard-box">
                                    

                                   
                                    <ul class="sortable-list list-unstyled taskList ui-sortable" id="upcoming">
                                   <? $devL=DB::query("SELECT * FROM developers ORDER BY name ASC");
        foreach($devL as $dL){ ?>
        <li class="ui-sortable-handle">
                                            <div class="kanban-box">
                                                <div class="checkbox-wrapper float-start">
                                                    <div class="form-check form-check-success ">
                                                        <img src="assets/uploadedDevelopersLogo/<?=$dL['logo']?>" alt="<?=$dL['name']?>" class="avatar-sm ">
                                                            
                                                    </div>
                                                </div>
                                              <div class="kanban-detail" style='padding-left:40px !important'>
                                                   <a href="../DevelopersDetails.php?did=<?=$dL['did']?>" target="_blank" ><h4 class="mt-1" style="float:left"><?=$dL['name']?></h4></a>
                                                    <ul class="list-inline" style="float:right">
                                                        
                                                      
                                                         <li class="list-inline-item">
<a href="?editDev=<?=$dL['did']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit This Developer!" >
    <i style='color:blue' class="fe-edit"></i>
</a>
                                                        </li>
                                                        <li class="list-inline-item">
<a href="<?=$dL['did']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete this Developer!" class="deleteDev">
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
                                        </div>
                                
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
         $("#saveDeveloper").click(function(e){
              e.preventDefault(e); 
              var dname=$("#newDevelopertoAdd");
              var dlogo=$("#newDeveloperLogo");
              var dtext=$("#newDevelopertoDetails");
              if(dname.val()==''){alert('Developer Name can not be left blank!!');dname.focus(); } else
              if(dlogo.val()==''){alert('Developer Logo must be attached!!'); } else
              if(dtext.val()==''){alert('Developer Details can not be left blank!!'); dtext.focus();} else
              {
         var formData = new FormData();
formData.append('file[]', dlogo[0].files[0]);
formData.append('dname', dname.val());
formData.append('dtext', dtext.val());

$.ajax({
       url : 'include/function_do.php?newDevelopertoAdd=yes',
       type : 'POST',
       data : formData,
       processData: false,  // tell jQuery not to process the data
       contentType: false,
       enctype: 'multipart/form-data',// tell jQuery not to set contentType
       success: function(data){
                        if(data=='Developer Added!'){ alert('Developer added!');
                            window.location.href = 'ManageDeveloper.php';
                        } else {
                                                     alert(data);}},  
                  error: function(jqXhr, textStatus, errorMessage){
                            console.log("Error: ", errorMessage);
                        },
                  cache: false,
                   });}
        });
  ////////Edit City ////////
  <? if(isset($_GET['editDev'])) { ?>
         $("#editDeveloper").click(function(e){
              e.preventDefault(e); 
            
               var dname=$("#editDevelopertoAdd");
              var dlogo=$("#editDeveloperLogo");
              var dtext=$("#editDevelopertoDetails");
              if(dname.val()==''){alert('Developer Name can not be left blank!!');dname.focus(); } else
              if(dlogo.val()==''){alert('Developer Logo must be attached!!'); } else
              if(dtext.val()==''){alert('Developer Details can not be left blank!!'); dtext.focus();} else
              {
                   var formData = new FormData();
formData.append('file[]', dlogo[0].files[0]);
formData.append('dname', dname.val());
formData.append('dtext', dtext.val());

         $.ajax({
       url : 'include/function_do.php?editDeveloper=<?=$_GET['editDev']?>',
       type : 'POST',
       data : formData,
       processData: false,  // tell jQuery not to process the data
       contentType: false,
       enctype: 'multipart/form-data',// tell jQuery not to set contentType
       success: function(data){
                        if(data=='Developer edited!'){ alert('Developer edited!');
                           window.location.href = 'ManageDeveloper.php';
                        } else {
                                                     alert(data);}},  
                  error: function(jqXhr, textStatus, errorMessage){
                            console.log("Error: ", errorMessage);
                        },
                  cache: false,
                   });}
    
        }); <? } ?>
 ////////Delete City ////////
         $(".deleteDev").click(function(e){
                       e.preventDefault(e); 
              var cn = $(this).attr('href');
          Swal.fire({
              title:"Are you sure!!",
              text:'You want to delete this Developer?',
              showCancelButton:!0,
              confirmButtonText:"Delete",
              showLoaderOnConfirm:!0,
              confirmButtonColor:"#4a4fea",
              cancelButtonColor:"#f34e4e",
              
            allowOutsideClick:!1
              
          }).then(function(e){
              $.post("include/function_do.php?deleteDev="+cn ,function(data,status){
                  if(data==1){
                        Swal.fire({
                  icon:"success",
                  title:'Developer Deleted!',
              confirmButtonColor:"#4a4fea",
              }); window.location.href = 'ManageDeveloper.php';
                  } else {alert ('Some Error!!');} 
              });
            });
            
    
        
      
        });
 
        </script>
        
    </body>
</html>