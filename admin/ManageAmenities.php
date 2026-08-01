<? include 'include/adminHeader.php';?>

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-8">
                                <h4 class="header-title">Managing Amenities</h4>
                                <div class="card">
                                    <div class="card-body">
                                         <form id="addProperty">
                                        
                                       
                                           
                                            <div class="row align-items-center"> 
                                                    <div class="mb-3 col-6">
                                                        
                                                    
                                                        
    <div class="mb-3">
                                                                <label for="newCitytoAdd" class="form-label">Add New Amenity</label>
                                                                <input class="form-control" type="text" required="" id="newAmenitytoAdd" placeholder="Enter Amenity Name">
                                                            </div>
                                                            <div class="mb-2 text-center">
                                                                <button class="btn rounded-pill btn-primary" id="saveAmenity">Save</button>
                                                            </div>
    
                                                      
    
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
                                                   <h4 class="header-title mt-0 mb-3 text-primary">Existing Amenity in our List</h4>

                            <div class="card">
                                
                                <div class="card-body taskboard-box">
                                    

                                   
                                    <ul class="sortable-list list-unstyled taskList ui-sortable" id="upcoming">
                                   <? $cityL=DB::query("SELECT * FROM amenities ORDER BY ame_name ASC");
                                                                    foreach($cityL as $cL){ ?>
                                                                    <li class="ui-sortable-handle">
                                            <div class="kanban-box">
                                              <div class="kanban-detail">
                                                   <h4 class="mt-1" style="float:left"><?=$cL['ame_name']?></h4>
                                                    <ul class="list-inline" style="float:right">
                                                   
                                                         <li class="list-inline-item">
                                                            <a href="<?=$cL['ame_id']."^".$cL['ame_name']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit This Amenity!" class="editAme">
                                                                <i style='color:blue' class="fe-edit"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="<?=$cL['ame_id']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete this Amenity!" class="deleteAme">
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
         $("#saveAmenity").click(function(e){
              e.preventDefault(e); 
        var newAmenitytoAdd = $("#newAmenitytoAdd").val();
        
        $.ajax({
                    type: "POST",  
                    url: "include/function_do.php?newAmenitytoAdd="+newAmenitytoAdd, 
                  dataType: "text",
                    data	: {'1':1},
                  success: function (data) {
                        if(data=='Amenity Added!'){ alert('Amenity added!');
                            window.location.href = 'ManageAmenities.php';
                        } else {
                                                     alert(data);}},  
                  error: function(jqXhr, textStatus, errorMessage){
                            console.log("Error: ", errorMessage);
                        },
                  cache: false,
                   });
        });
  ////////Edit City ////////
         $(".editAme").click(function(e){
              e.preventDefault(e); 
              var cn = $(this).attr('href').split("^");
          Swal.fire({
              title:"Editing City",
              html:'<div class="mb-3"><label for="newCitytoAdd" class="form-label">Add New City</label>'+
                    '<input class="form-control" type="text" required="" id="AmetoEdit" value="'+cn[1] +'"></div>',
              showCancelButton:!0,
              confirmButtonText:"Edit",
              showLoaderOnConfirm:!0,
              confirmButtonColor:"#4a4fea",
              cancelButtonColor:"#f34e4e",
              
            allowOutsideClick:!1
              
          }).then(function(e){
              $.post("include/function_do.php?editAme="+cn[0] +'&aname='+$("#AmetoEdit").val(),function(data,status){
                  if(data==1){
                        Swal.fire({
                  icon:"success",
                  title:'Amenity Edited!',
              confirmButtonColor:"#4a4fea",
              }); window.location.href = 'ManageAmenities.php';
                  } else {alert ('Some Error!!');} 
              });
            });
            
    
        
      
        });
 ////////Delete City ////////
         $(".deleteAme").click(function(e){
                       e.preventDefault(e); 
              var cn = $(this).attr('href');
          Swal.fire({
              title:"Are you sure!!",
              text:'You want to delete this Amenity?',
              showCancelButton:!0,
              confirmButtonText:"Delete",
              showLoaderOnConfirm:!0,
              confirmButtonColor:"#4a4fea",
              cancelButtonColor:"#f34e4e",
              
            allowOutsideClick:!1
              
          }).then(function(e){
              $.post("include/function_do.php?deleteAme="+cn ,function(data,status){
                  if(data==1){
                        Swal.fire({
                  icon:"success",
                  title:'Amenity Deleted!',
              confirmButtonColor:"#4a4fea",
              }); window.location.href = 'ManageAmenities.php';
                  } else {alert ('Some Error!!');} 
              });
            });
            
    
        
      
        });
 
        </script>
        
    </body>
</html>