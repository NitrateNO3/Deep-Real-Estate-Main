<? include 'include/adminHeader.php';?>

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title">Managing Property Type</h4>
                                <div class="row"><div class="card col-4">
                                    <div class="card-body">
                                         <form id="addProperty">
                                        
                                       
                                           
                                            <div class="row align-items-center"> 
                                                    <div class="col-12">
                                                        
                                                    
                                                        
    <div class="mb-3">
                                                                <label for="newCitytoAdd" class="form-label">Add New Property Type</label>
                                                                <input class="form-control" type="text" required="" id="newPropertyTypetoAdd" placeholder="Enter Type Name">
                                                            </div>
                                                            <div class="mb-2 text-center">
                                                                <button class="btn rounded-pill btn-primary" id="saveType">Save</button>
                                                            </div>
    
                                                      
    
                                                    </div>
                                                </div>
    </form>
                                            </div> <!-- end col -->

                                             <!-- end col -->
                                        </div> 
 <div class="card col-7" style="margin-left:20px">
                                    <div class="card-body ">
                                        <div class="row align-items-center"> 
                                              <div class="col-xl-12">
                                                   <h4 class="header-title mt-0 mb-3 text-primary">Existing Types in our List</h4>

                            <div class="card">
                                
                                <div class="card-body taskboard-box">
                                    

                                   
                                    <ul class="sortable-list list-unstyled taskList ui-sortable" id="upcoming">
                                   <? $cityL=DB::query("SELECT * FROM catp ORDER BY cp_name ASC");
                                                                    foreach($cityL as $cL){ ?>
                                                                    <li class="ui-sortable-handle">
                                            <div class="kanban-box">
                                              <div class="kanban-detail">
                                                   <h4 class="mt-1" style="float:left"><?=$cL['cp_name']?></h4>
                                                    <ul class="list-inline" style="float:right">
                                                         
                                                      <li class="list-inline-item">
                                                            <a href="ManageCateg.php?cpid=<?=$cL['cp_id']?>" data-bs-toggle="tooltip" 
                                                            data-bs-placement="top" title="Add Location in <?=$cL['cp_name']?> !">
                                                                <i style='color:green' class="fe-log-in"></i>
                                                            </a>
                                                        </li>
                                                         <li class="list-inline-item">
                                                            <a href="<?=$cL['cp_id']."^".$cL['cp_name']?>" data-bs-toggle="tooltip" 
                                                            data-bs-placement="top" title="Edit This Property Type!" class="editPType">
                                                                <i style='color:blue' class="fe-edit"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="<?=$cL['cp_id']?>" data-bs-toggle="tooltip" 
                                                            data-bs-placement="top" title="Delete this Property Type!" class="deletePType">
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
   
                                            </div></div> <!-- end col -->

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
         $("#saveType").click(function(e){
              e.preventDefault(e); 
        var newPropertyTypetoAdd = $("#newPropertyTypetoAdd").val();
        
        $.ajax({
                    type: "POST",  
                    url: "include/function_do.php?newPropertyTypetoAdd="+newPropertyTypetoAdd, 
                  dataType: "text",
                    data	: {'1':1},
                  success: function (data) {
                        if(data=='Type Added!'){ alert('Type Added!');
                            window.location.href = 'ManagePType.php';
                        } else {
                                                     alert(data);}},  
                  error: function(jqXhr, textStatus, errorMessage){
                            console.log("Error: ", errorMessage);
                        },
                  cache: false,
                   });
        });
  ////////Edit City ////////
         $(".editPType").click(function(e){
              e.preventDefault(e); 
              var cn = $(this).attr('href').split("^");
          Swal.fire({
              title:"Editing Proprty Type",
              html:'<div class="mb-3"><label for="TypetoEdit" class="form-label">Add New City</label>'+
                    '<input class="form-control" type="text" required="" id="TypetoEdit" value="'+cn[1] +'"></div>',
              showCancelButton:!0,
              confirmButtonText:"Edit",
              showLoaderOnConfirm:!0,
              confirmButtonColor:"#4a4fea",
              cancelButtonColor:"#f34e4e",
              
            allowOutsideClick:!1
              
          }).then(function(e){
              $.post("include/function_do.php?newTypetoAdd="+cn[0] +'&cpname='+$("#TypetoEdit").val(),function(data,status){
                  if(data==1){
                        Swal.fire({
                  icon:"success",
                  title:'Type Edited!',
              confirmButtonColor:"#4a4fea",
              }); window.location.href = 'ManagePType.php';
                  } else {alert ('Some Error!!');} 
              });
            });
            
    
        
      
        });
 ////////Delete City ////////
         $(".deletePType").click(function(e){
                       e.preventDefault(e); 
              var cn = $(this).attr('href');
          Swal.fire({
              title:"Are you sure!!",
              text:'You want to delete this Type?',
              showCancelButton:!0,
              confirmButtonText:"Delete",
              showLoaderOnConfirm:!0,
              confirmButtonColor:"#4a4fea",
              cancelButtonColor:"#f34e4e",
              
            allowOutsideClick:!1
              
          }).then(function(e){
              $.post("include/function_do.php?deletePType="+cn ,function(data,status){
                  if(data==1){
                        Swal.fire({
                  icon:"success",
                  title:'Type Deleted!',
              confirmButtonColor:"#4a4fea",
              }); window.location.href = 'ManagePType.php';
                  } else {alert ('Some Error!!');} 
              });
            });
            
    
        
      
        });
 
        </script>
        
    </body>
</html>