<? include 'include/adminHeader.php';?>

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-8">
                                <h4 class="header-title">Managing City</h4>
                                <div class="card">
                                    <div class="card-body">
                                         <form id="addProperty">
                                        
                                       
                                           
                                            <div class="row align-items-center"> 
                                                    <div class="mb-3 col-6">
                                                        
                                                    
                                                        
    <div class="mb-3">
                                                                <label for="newCitytoAdd" class="form-label">Add New City</label>
                                                                <input class="form-control" type="text" required="" id="newCitytoAdd" placeholder="Enter City Name">
                                                            </div>
                                                            <div class="mb-2 text-center">
                                                                <button class="btn rounded-pill btn-primary" id="saveCity">Save</button>
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
                                                   <h4 class="header-title mt-0 mb-3 text-primary">Existing Cities in our List</h4>

                            <div class="card">
                                
                                <div class="card-body taskboard-box">
                                    

                                   
                                    <ul class="sortable-list list-unstyled taskList ui-sortable" id="upcoming">
                                   <? $cityL=DB::query("SELECT * FROM cities ORDER BY cityName ASC");
                                                                    foreach($cityL as $cL){ ?>
                                                                    <li class="ui-sortable-handle">
                                            <div class="kanban-box">
                                              <div class="kanban-detail">
                                                   <h4 class="mt-1" style="float:left"><?=$cL['cityName']?></h4>
                                                    <ul class="list-inline" style="float:right">
                                                         
                                                      <li class="list-inline-item">
                                                            <a href="ManageLocation.php?cityid=<?=$cL['city_id']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Add Location in <?=$cL['cityName']?> !">
                                                                <i style='color:green' class="fe-log-in"></i>
                                                            </a>
                                                        </li>
                                                         <li class="list-inline-item">
                                                            <a href="<?=$cL['city_id']."^".$cL['cityName']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit This City!" class="editcity">
                                                                <i style='color:blue' class="fe-edit"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="<?=$cL['city_id']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete this City!" class="deletecity">
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
         $("#saveCity").click(function(e){
              e.preventDefault(e); 
        var newCitytoAdd = $("#newCitytoAdd").val();
        
        $.ajax({
                    type: "POST",  
                    url: "include/function_do.php?newCitytoAdd="+newCitytoAdd, 
                  dataType: "text",
                    data	: {'1':1},
                  success: function (data) {
                        if(data=='City Added!'){ alert('City added!');
                            window.location.href = 'ManageCity.php';
                        } else {
                                                     alert(data);}},  
                  error: function(jqXhr, textStatus, errorMessage){
                            console.log("Error: ", errorMessage);
                        },
                  cache: false,
                   });
        });
  ////////Edit City ////////
         $(".editcity").click(function(e){
              e.preventDefault(e); 
              var cn = $(this).attr('href').split("^");
          Swal.fire({
              title:"Editing City",
              html:'<div class="mb-3"><label for="newCitytoAdd" class="form-label">Add New City</label>'+
                    '<input class="form-control" type="text" required="" id="CitytoEdit" value="'+cn[1] +'"></div>',
              showCancelButton:!0,
              confirmButtonText:"Edit",
              showLoaderOnConfirm:!0,
              confirmButtonColor:"#4a4fea",
              cancelButtonColor:"#f34e4e",
              
            allowOutsideClick:!1
              
          }).then(function(e){
              $.post("include/function_do.php?editCity="+cn[0] +'&cname='+$("#CitytoEdit").val(),function(data,status){
                  if(data==1){
                        Swal.fire({
                  icon:"success",
                  title:'City Edited!',
              confirmButtonColor:"#4a4fea",
              }); window.location.href = 'ManageCity.php';
                  } else {alert ('Some Error!!');} 
              });
            });
            
    
        
      
        });
 ////////Delete City ////////
         $(".deletecity").click(function(e){
                       e.preventDefault(e); 
              var cn = $(this).attr('href');
          Swal.fire({
              title:"Are you sure!!",
              text:'You want to delete this city?',
              showCancelButton:!0,
              confirmButtonText:"Delete",
              showLoaderOnConfirm:!0,
              confirmButtonColor:"#4a4fea",
              cancelButtonColor:"#f34e4e",
              
            allowOutsideClick:!1
              
          }).then(function(e){
              $.post("include/function_do.php?deleteCity="+cn ,function(data,status){
                  if(data==1){
                        Swal.fire({
                  icon:"success",
                  title:'City Deleted!',
              confirmButtonColor:"#4a4fea",
              }); window.location.href = 'ManageCity.php';
                  } else {alert ('Some Error!!');} 
              });
            });
            
    
        
      
        });
 
        </script>
        
    </body>
</html>