<? include 'include/adminHeader.php';?>

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <h4 class="header-title">Managing Docs</h4>
                                <div class="row">
                                <div class="card col-4">
                                    <div class="card-body">
                                         <form id="addProperty">
                                        
                                       
                                           
                                            <div class="row align-items-center"> 
                                                    <div class="mb-3 ">
                                                        
                                                    
                          <? if(isset($_GET['editDoc'])){
                              $map=DB::query("SELECT * from documents where d_id='$_GET[editDoc]'")[0];
                               $fileType=pathinfo(basename($map['dpath']), PATHINFO_EXTENSION);
                            if($fileType=='doc' || $fileType=='docx'  ){$ext='docx.png';} else
                            if($fileType=='pdf'  ){$ext='pdf.png';} else
                            if($fileType=='xls' || $fileType=='xlsx'  ){$ext='xlsx.png';} 
                          ?>                               
    <div class="mb-3">
    <label for="editDoctoAdd" class="form-label">Edit Doc</label>
    <input class="form-control" type="text" required="" id="editDoctoAdd" value="<?=$map['dname']?>">
</div>    <div class="form-row"><div class="mb-3 ">
    <label for="editDocFile" class="form-label">Pick Document</label>
      <input class="form-control" id="editDocFile" type="file"  > 
      
</div>
<div class="mb-3 "><img src="../assets/images/<?=$ext?>" width="50" ></div>
</div> 
<div class="mb-2 text-center">
    <button class="btn rounded-pill btn-primary" id="editThisDoc">Save</button>
</div> <?
                          } else { ?>                               
    <div class="mb-3">
    <label for="newDoctoAdd" class="form-label">Add New Doc</label>
    <input class="form-control" type="text" required="" id="newDoctoAdd" placeholder="Enter Doc Name">
</div>    <div class="mb-3">
    <label for="newDocFile" class="form-label">Pick Doc </label>
      <input class="form-control" id="newDocFile" type="file"  > 
</div> 
<div class="mb-2 text-center">
    <button class="btn rounded-pill btn-primary" id="saveDoc">Save</button>
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
                                                   <h4 class="header-title mt-0 mb-3 text-primary">Existing Docs in our List</h4>

                            <div class="card">
                                
                                <div class="card-body taskboard-box">
                                    

                                   
                                    <ul class="sortable-list list-unstyled taskList ui-sortable" id="upcoming">
                                   <? $devL=DB::query("SELECT * FROM documents ORDER BY dname ASC");
        foreach($devL as $dL){
         $fileType=pathinfo(basename($dL['dpath']), PATHINFO_EXTENSION);
                            if($fileType=='doc' || $fileType=='docx'  ){$ext='docx.png';} else
                            if($fileType=='pdf'  ){$ext='pdf.png';} else
                            if($fileType=='xls' || $fileType=='xlsx'  ){$ext='xlsx.png';} 
        ?>
        <li class="ui-sortable-handle">
                                            <div class="kanban-box">
                                                <div class="checkbox-wrapper float-start">
                                                    <div class="form-check form-check-success ">
                                                        <a href="../Docs_Detailed.php?mid=<?=$dL['d_id']?>" target="_blank" >
                                                            <img src="../assets/images/<?=$ext?>" alt="<?=$dL['dname']?>" style="width:50px;margin-right:40px; height:40px !important" class="avatar-sm ">
                                                         </a>   
                                                    </div>
                                                </div>
                                              <div class="kanban-detail" style='padding-left:40px !important'>
                                                   <a href="../Docs_Detailed.php?mid=<?=$dL['d_id']?>" target="_blank" >
                                                       <h4 class="mt-1" style="float:left"><?=$dL['dname']?></h4></a>
                                                    <ul class="list-inline" style="float:right">
                                                        
                                                      
                                                         <li class="list-inline-item">
<a href="?editDoc=<?=$dL['d_id']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit This Doc!" >
    <i style='color:blue' class="fe-edit"></i>
</a>
                                                        </li>
                                                        <li class="list-inline-item">
<a href="<?=$dL['d_id']?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete this Doc!" class="deleteDoc">
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
         $("#saveDoc").click(function(e){
              e.preventDefault(e); 
              var dname=$("#newDoctoAdd");
              var dlogo=$("#newDocFile");
             
              if(dname.val()==''){alert('Doc Name can not be left blank!!');dname.focus(); } else
              if(dlogo.val()==''){alert('Doc must be attached!!'); } else
              {
         var formData = new FormData();
formData.append('file[]', dlogo[0].files[0]);
formData.append('dname', dname.val());


$.ajax({
       url : 'include/function_do.php?newDoctoAdd=yes',
       type : 'POST',
       data : formData,
       processData: false,  // tell jQuery not to process the data
       contentType: false,
       enctype: 'multipart/form-data',// tell jQuery not to set contentType
       success: function(data){
                        if(data==1){ alert('Doc added!');
                            window.location.href = 'ManageDocs.php';
                        } else {
                                                     alert(data);}},  
                  error: function(jqXhr, textStatus, errorMessage){
                            console.log("Error: ", errorMessage);
                        },
                  cache: false,
                   });}
        });
  ////////Edit City ////////
  <? if(isset($_GET['editDoc'])) { ?>
         $("#editThisDoc").click(function(e){
              e.preventDefault(e); 
            
               var dname=$("#editDoctoAdd");
              var dlogo=$("#editDocFile");
            
              if(dname.val()==''){alert('Doc Name can not be left blank!!');dname.focus(); } else
              if(dlogo.val()==''){alert('Doc must be attached!!'); } else
            
              {
                   var formData = new FormData();
formData.append('file[]', dlogo[0].files[0]);
formData.append('dname', dname.val());


         $.ajax({
       url : 'include/function_do.php?editDoc=<?=$_GET['editDoc']?>',
       type : 'POST',
       data : formData,
       processData: false,  // tell jQuery not to process the data
       contentType: false,
       enctype: 'multipart/form-data',// tell jQuery not to set contentType
       success: function(data){
                        if(data==1){ alert('Doc edited!');
                         window.location.href = 'ManageDocs.php';
                        } else {
                                                     alert(data);}},  
                  error: function(jqXhr, textStatus, errorMessage){
                            console.log("Error: ", errorMessage);
                        },
                  cache: false,
                   });}
    
        }); <? } ?>
 ////////Delete City ////////
         $(".deleteDoc").click(function(e){
                       e.preventDefault(e); 
              var cn = $(this).attr('href');
          Swal.fire({
              title:"Are you sure!!",
              text:'You want to delete this Doc?',
              showCancelButton:!0,
              confirmButtonText:"Delete",
              showLoaderOnConfirm:!0,
              confirmButtonColor:"#4a4fea",
              cancelButtonColor:"#f34e4e",
              
            allowOutsideClick:!1
              
          }).then(function(e){
              $.post("include/function_do.php?deleteDoc="+cn ,function(data,status){
                  if(data==1){
                        Swal.fire({
                  icon:"success",
                  title:'Doc Deleted!',
              confirmButtonColor:"#4a4fea",
              }); window.location.href = 'ManageDocs.php';
                  } else {alert ('Some Error!!'+data);} 
              });
            });
            
    
        
      
        });
 
        </script>
        
    </body>
</html>