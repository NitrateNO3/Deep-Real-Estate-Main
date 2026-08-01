<? include 'include/adminHeader.php';?>

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-8">
                                <h4 class="header-title">Managing Location</h4>
                                <div class="card">
                                    <div class="card-body">
                                         <form id="addProperty">
                                        
                                       
                                           
                                            <div class="row align-items-center"> 
                                                    <div class="mb-3 col-6">
                                                        
                                                    
                                                        
    <div class="mb-3">
                                                                <label for="newLocationtoAdd" class="form-label">Add New Location</label>
                                                                <input class="form-control" type="text" required="" id="newLocationtoAdd" placeholder="Enter Location Name">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="forWhichCity" class="form-label">Select City</label>
                                                                <a href="ManageCity.php" style='float:right' >Add City</a>
                                                                 <select class="form-select" id="forWhichCity" name="forWhichCity">
                                                            <? if(isset($_GET['cityid'])){echo getSelectedCityList($_GET['cityid']);} else {echo getCityList();} ?>
            
                                                        </select>
                                                            </div>
                                                            <div class="mb-2 text-center">
                                                                <button class="btn rounded-pill btn-primary" id="saveLocation">Save</button>
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
                                                   <h4 class="header-title mt-0 mb-3 text-primary">Existing Location in our List
                                                   <select id="filterCity" class="form-select" style='float:right;width: 200px;'>
                                                       <option value='0'>Filter City</option>
                                                       <?=getCityList();?>
                                                       </select>
                                                   </h4>

                            <div class="card">
                                
                                <div class="card-body taskboard-box">
                                    

                                   
                                    <ul class="sortable-list list-unstyled taskList ui-sortable" id="upcoming">
                                   <? $cityL=DB::query("SELECT * FROM cityLocations ORDER BY cityid,locationName ASC");
                                                                    foreach($cityL as $cL){ ?>
                                                                    <li class="ui-sortable-handle">
                                            <div class="kanban-box">
                                              <div class="kanban-detail">
                                                   <h4 class="mt-1" style="float:left"><?=cityName($cL['cityid'])." : ".$cL['locationName']?></h4>
                                                    <ul class="list-inline" style="float:right">
                                                      <li class="list-inline-item">
                                                            <a href="<?=$cL['loc_id'].'^'.$cL['locationName']?>" data-bs-toggle="tooltip" 
                                                            data-bs-placement="top" title="Edit This Location!" class="editlocation">
                                                                <i style='color:blue' class="fe-edit"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="<?=$cL['loc_id']?>" data-bs-toggle="tooltip" data-bs-placement="top" 
                                                            title="Delete this Location!" class="deletelocation">
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
        
        $("#filterCity").on("change",function(){
           
             $("#upcoming").load("include/function_do.php?getLocationCityWise="+$(this).val(),function(){
                 $(".editlocation").on("click",function(e){
                     e.preventDefault(e);
              var ln = $(this).attr('href').split("^");
         Swal.fire({
              title:"Editing Location",
              html:'<div class="mb-3"><label for="LocationtoEdit" class="form-label">Add New Location</label>'+
                    '<input class="form-control" type="text" required="" id="LocationtoEdit" value="'+ln[1] +'"></div>',
              showCancelButton:!0,
              confirmButtonText:"Edit",
              target: 'top',
              confirmButtonColor:"#4a4fea",
              cancelButtonColor:"#f34e4e",
              
            allowOutsideClick:!1
              
          }).then(function(res){
             
              $.post("include/function_do.php?editLocation="+ln[0] +"&lname="+$("#LocationtoEdit").val(),function(data,status){
                  if(data==1){
                        Swal.fire({
                  icon:"success",
                  target: 'top',
                  title:'Location Edited!',
              confirmButtonColor:"#4a4fea",
              }); window.location.href = 'ManageLocation.php';
                  } else {alert ('Some Error!!');} 
              });
            });    
                 });
                  $(".deletelocation").click(function(e){
                       e.preventDefault(e); 
              var ln = $(this).attr('href');
          Swal.fire({
              title:"Are you sure!!",
              text:'You want to delete this Location?',
              showCancelButton:!0,
              confirmButtonText:"Delete",
             
              confirmButtonColor:"#4a4fea",
              cancelButtonColor:"#f34e4e",
              
            allowOutsideClick:!1
              
          }).then(function(res){
              $.post("include/function_do.php?deleteLocation="+ln ,function(data,status){
                  if(data==1){
                        Swal.fire({
                  icon:"success",
                  title:'Location Deleted!',
              confirmButtonColor:"#4a4fea",
              }); window.location.href = 'ManageLocation.php';
                  } else {alert ('Some Error!!');} 
              });
            });
            
    
        
      
        });
                 
             });
        })
    
        ////////Add City ////////
         $("#saveLocation").click(function(e){
              e.preventDefault(e); 
        var newLocationtoAdd = $("#newLocationtoAdd").val();
        var newcity = $("#forWhichCity").val();
        $.ajax({
                    type: "POST",  
                    url: "include/function_do.php?newLocationtoAdd="+newLocationtoAdd+"&ncity="+newcity, 
                  dataType: "text",
                    data	: {'1':1},
                  success: function (data) {
                        if(data=='Location Added!'){ alert('Location added!');
                            window.location.href = 'ManageLocation.php';
                        } else {
                                                     alert(data);}},  
                  error: function(jqXhr, textStatus, errorMessage){
                            console.log("Error: ", errorMessage);
                        },
                  cache: false,
                   });
        });
  ////////Edit City ////////
         $(".editlocation").click(function(e){
              e.preventDefault(e); 
              var ln = $(this).attr('href').split("^");
         Swal.fire({
              title:"Editing Location",
              html:'<div class="mb-3"><label for="LocationtoEdit" class="form-label">Add New Location</label>'+
                    '<input class="form-control" type="text" required="" id="LocationtoEdit" value="'+ln[1] +'"></div>',
              showCancelButton:!0,
              confirmButtonText:"Edit",
              
              confirmButtonColor:"#4a4fea",
              cancelButtonColor:"#f34e4e",
              
            allowOutsideClick:!1
              
          }).then(function(res){
             
              $.post("include/function_do.php?editLocation="+ln[0] +"&lname="+$("#LocationtoEdit").val(),function(data,status){
                  if(data==1){
                        Swal.fire({
                  icon:"success",
                  title:'Location Edited!',
              confirmButtonColor:"#4a4fea",
              }); window.location.href = 'ManageLocation.php';
                  } else {alert ('Some Error!!');} 
              });
            }); 
        
      
        });
 ////////Delete City ////////
         $(".deletelocation").click(function(e){
                       e.preventDefault(e); 
              var ln = $(this).attr('href');
          Swal.fire({
              title:"Are you sure!!",
              text:'You want to delete this Location?',
              showCancelButton:!0,
              confirmButtonText:"Delete",
             
              confirmButtonColor:"#4a4fea",
              cancelButtonColor:"#f34e4e",
              
            allowOutsideClick:!1
              
          }).then(function(res){
              $.post("include/function_do.php?deleteLocation="+ln ,function(data,status){
                  if(data==1){
                        Swal.fire({
                  icon:"success",
                  title:'Location Deleted!',
              confirmButtonColor:"#4a4fea",
              }); window.location.href = 'ManageLocation.php';
                  } else {alert ('Some Error!!');} 
              });
            });
            
    
        
      
        });
 
        </script>
        
    </body>
</html>