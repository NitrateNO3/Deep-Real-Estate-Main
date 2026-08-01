<? include 'include/adminHeader.php';?>

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title">Managing Category</h4>
                                <div class="row">
                                    <div class="card col-4">
                                    <div class="card-body">
                                        
                                       
                                           
                                            <div class="row align-items-center"> 
                                                    <div class="mb-3 ">
                                                        
                                                    
                                                        
    <div class="mb-3">
                                                                <label for="newCategorytoAdd" class="form-label">Add New Category</label>
                                                                <input class="form-control" type="text" required="" id="newCategorytoAdd" placeholder="Enter Category Name">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="forWhichType" class="form-label">Select Type</label>
                                                                <a href="ManagePType.php" style='float:right' >Add Type</a>
                                                                 <select class="form-select" id="forWhichType" name="forWhichType">
                                                            <? if(isset($_GET['cpid'])){echo getSelectedPTypeList($_GET['cpid']);} else {echo getPTypeList();} ?>
            
                                                        </select>
                                                            </div>
                                                            <div class="mb-2 text-center">
                                                                <button class="btn rounded-pill btn-primary" id="saveSubCat">Save</button>
                                                            </div>
    
                                                      
    
                                                    </div>
                                                </div>
  
                                            </div> <!-- end col -->

                                             <!-- end col -->
                                        </div>
                                        <!-- end row-->
 <div class="card col-7" style="margin-left:40px;">
                                    <div class="card-body">
                                        <div class="row align-items-center"> 
                                              <div class="col-xl-12">
                                                   <h4 class="header-title mt-0 mb-3 text-primary">Existing Subtypes in our List
                                                   <select id="filterSType" class="form-select" style='float:right;width: 120px;'>
                                                       <option value='0'>Filter SubType</option>
                                                       <?=getPTypeList();?>
                                                       </select>
                                                   </h4>

                            <div class="card">
                                
                                <div class="card-body taskboard-box">
                                    

                                   
                                    <ul class="sortable-list list-unstyled taskList ui-sortable" id="upcoming">
                                   <? $cityL=DB::query("SELECT * FROM category ORDER BY catid,category ASC");
                                                                    foreach($cityL as $cL){ ?>
                                                                    <li class="ui-sortable-handle">
                                            <div class="kanban-box">
                                              <div class="kanban-detail">
                                                   <h4 class="mt-1" style="float:left"><?=typeName($cL['ptype'])." : ".$cL['category']?></h4>
                                                    <ul class="list-inline" style="float:right">
                                                      <li class="list-inline-item">
                                                            <a href="<?=$cL['catid'].'^'.$cL['category']?>" data-bs-toggle="tooltip" 
                                                            data-bs-placement="top" title="Edit This Sub-Type!" class="editSType">
                                                                <i style='color:blue' class="fe-edit"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="<?=$cL['catid']?>" data-bs-toggle="tooltip" data-bs-placement="top" 
                                                            title="Delete this Sub-Type!" class="deleteSType">
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
        
        $("#filterSType").on("change",function(){
           
             $("#upcoming").load("include/function_do.php?getCatTypeWise="+$(this).val(),function(){
                  ////////Edit City ////////
         $(".editSType").click(function(e){
              e.preventDefault(e); 
              var ln = $(this).attr('href').split("^");
         Swal.fire({
              title:"Editing SubType",
              html:'<div class="mb-3"><label for="SubTypetoEdit" class="form-label">Add New Location</label>'+
                    '<input class="form-control" type="text" required="" id="SubTypetoEdit" value="'+ln[1] +'"></div>',
              showCancelButton:!0,
              confirmButtonText:"Edit",
              
              confirmButtonColor:"#4a4fea",
              cancelButtonColor:"#f34e4e",
              
            allowOutsideClick:!1
              
          }).then(function(res){
             
              $.post("include/function_do.php?SubTypetoEdit="+ln[0] +"&sname="+$("#SubTypetoEdit").val(),function(data,status){
                  if(data==1){
                        Swal.fire({
                  icon:"success",
                  title:'SubType Edited!',
              confirmButtonColor:"#4a4fea",
              }); window.location.href = 'ManageCateg.php';
                  } else {alert ('Some Error!!');} 
              });
            }); 
        
      
        });
 ////////Delete City ////////
         $(".deleteSType").click(function(e){
                       e.preventDefault(e); 
              var ln = $(this).attr('href');
          Swal.fire({
              title:"Are you sure!!",
              text:'You want to delete this SubType?',
              showCancelButton:!0,
              confirmButtonText:"Delete",
             
              confirmButtonColor:"#4a4fea",
              cancelButtonColor:"#f34e4e",
              
            allowOutsideClick:!1
              
          }).then(function(res){
              $.post("include/function_do.php?deleteSType="+ln ,function(data,status){
                  if(data==1){
                        Swal.fire({
                  icon:"success",
                  title:'SubType Deleted!',
              confirmButtonColor:"#4a4fea",
              }); window.location.href = 'ManageCateg.php';
                  } else {alert ('Some Error!!');} 
              });
            });
            
    
        
      
        });
                 
             });
        })
    
        ////////Add City ////////
         $("#saveSubCat").click(function(e){
              e.preventDefault(e); 
        var newCategorytoAdd = $("#newCategorytoAdd").val();
        var forWhichType = $("#forWhichType").val();
        $.ajax({
                    type: "POST",  
                    url: "include/function_do.php?newCategorytoAdd="+newCategorytoAdd+"&ncatp="+forWhichType, 
                  dataType: "text",
                    data	: {'1':1},
                  success: function (data) {
                        if(data==1){ alert('Sub-Category added!');
                            window.location.href = 'ManageCateg.php';
                        } else {
                                                     alert(data);}},  
                  error: function(jqXhr, textStatus, errorMessage){
                            console.log("Error: ", errorMessage);
                        },
                  cache: false,
                   });
        });
  ////////Edit City ////////
         $(".editSType").click(function(e){
              e.preventDefault(e); 
              var ln = $(this).attr('href').split("^");
         Swal.fire({
              title:"Editing SubType",
              html:'<div class="mb-3"><label for="SubTypetoEdit" class="form-label">Add New Location</label>'+
                    '<input class="form-control" type="text" required="" id="SubTypetoEdit" value="'+ln[1] +'"></div>',
              showCancelButton:!0,
              confirmButtonText:"Edit",
              
              confirmButtonColor:"#4a4fea",
              cancelButtonColor:"#f34e4e",
              
            allowOutsideClick:!1
              
          }).then(function(res){
             
              $.post("include/function_do.php?SubTypetoEdit="+ln[0] +"&sname="+$("#SubTypetoEdit").val(),function(data,status){
                  if(data==1){
                        Swal.fire({
                  icon:"success",
                  title:'SubType Edited!',
              confirmButtonColor:"#4a4fea",
              }); window.location.href = 'ManageCateg.php';
                  } else {alert ('Some Error!!');} 
              });
            }); 
        
      
        });
 ////////Delete City ////////
         $(".deleteSType").click(function(e){
                       e.preventDefault(e); 
              var ln = $(this).attr('href');
          Swal.fire({
              title:"Are you sure!!",
              text:'You want to delete this SubType?',
              showCancelButton:!0,
              confirmButtonText:"Delete",
             
              confirmButtonColor:"#4a4fea",
              cancelButtonColor:"#f34e4e",
              
            allowOutsideClick:!1
              
          }).then(function(res){
              $.post("include/function_do.php?deleteSType="+ln ,function(data,status){
                  if(data==1){
                        Swal.fire({
                  icon:"success",
                  title:'SubType Deleted!',
              confirmButtonColor:"#4a4fea",
              }); window.location.href = 'ManageCateg.php';
                  } else {alert ('Some Error!!');} 
              });
            });
            
    
        
      
        });
 
        </script>
        
    </body>
</html>