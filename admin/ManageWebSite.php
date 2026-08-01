<? include 'include/adminHeader.php';?>

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <h3 class="header-title">Managing Administration Informations</h3>
                  <style>.card{margin-left:20px !important;}</style>              
                                <div class="row">
                                <div class="card col-4">
                                    <div class="card-body">
                                          
                                            <div class="row align-items-center"> 
                                                    <div class=" mb-3">
                                                        
                                            <h4 class="header-title">Website Info</h4>
                                         
<div class="mb-3 " style="padding-top:40px"><input class="form-control" id="CompanyName" type="text" placeholder="Company name"  value="<?=$admin['CompanyName']?>"  > </div>
<div class="mb-3 "> <input class="form-control" id="Slogan" type="text" placeholder="Company Tag line"  value="<?=$admin['Slogan']?>"  > </div>
<div class="mb-3 "> <input class="form-control" id="Address" type="text" placeholder="Address Line 1"  value="<?=$admin['Address']?>" > </div>
<div class="mb-3 "> <input class="form-control" id="Address2" type="text" placeholder="Addres Line 2"  value="<?=$admin['Address2']?>"  > </div>
<div class="mb-3 "> <input class="form-control" id="City" type="text" placeholder="City"  value="<?=$admin['City']?>" > </div>
<div class="mb-3 "> <input class="form-control" id="Pin" type="text" placeholder="Pin"  value="<?=$admin['Pin']?>" > </div>
<div class="mb-3 "> <input class="form-control" id="State" type="text" placeholder="State"  value="<?=$admin['State']?>" > </div>
<div class="mb-3 "> <input class="form-control" id="Country" type="text" placeholder="Country"  value="<?=$admin['Country']?>" > </div>
<div class="mb-2 text-center">
    <button class="btn rounded-pill btn-primary" id="SaveDetails1">Save Details</button>
</div>                                
 </div> </div> </div> </div>
 <div class="card col-4">
                                    <div class="card-body">
                                          
                                            <div class="row align-items-center"> 
                                                     <div class="mb-3">
                                                        
                                            <h4 class="header-title">Contact Information</h4>
                                         
<div class="mb-3 " style="padding-top:40px"><input class="form-control" id="Phone1" type="text" placeholder="Landline 1"  value="<?=$admin['Phone1']?>" > </div>
<div class="mb-3 "> <input class="form-control" id="Phone2" type="text" placeholder="Landline 2"  value="<?=$admin['Phone2']?>" > </div>
<div class="mb-3 "> <input class="form-control" id="Fax" type="text" placeholder="Fax"  value="<?=$admin['Fax']?>" > </div>
<div class="mb-3 "> <input class="form-control" id="Mobile1" type="text" placeholder="Mobile 1"  value="<?=$admin['Mobile1']?>" > </div>
<div class="mb-3 "> <input class="form-control" id="Mobile2" type="text" placeholder="Mobile 2"  value="<?=$admin['Mobile2']?>" > </div>
<div class="mb-3 "> <input class="form-control" id="Mobile3" type="text" placeholder="Mobile 3"  value="<?=$admin['Mobile3']?>" > </div>
<div class="mb-3 "> <input class="form-control" id="Mobile4" type="text" placeholder="Mobile 4"  value="<?=$admin['Mobile4']?>" > </div>
<div class="mb-3 "> <input class="form-control" id="Email1" type="text" placeholder="Email 1"  value="<?=$admin['Email1']?>" > </div>
<div class="mb-3 "> <input class="form-control" id="Email2" type="text" placeholder="Email 2"  value="<?=$admin['Email2']?>" > </div>
<div class="mb-3 "> <input class="form-control" id="Website1" type="text" placeholder="Website 1"  value="<?=$admin['Website1']?>" > </div>
<div class="mb-3 "> <input class="form-control" id="Website2" type="text" placeholder="Website 1"  value="<?=$admin['Website2']?>" > </div>
<div class="mb-2 text-center"> 
    <button class="btn rounded-pill btn-primary" id="SaveDetails2">Save Details</button>
</div>                                
</div></div> </div> </div>
 <div class="card col-3">
                                    <div class="card-body">
                                          
                                            <div class="row align-items-center"> 
                                                     <div class="mb-3">
                                                        
                                            <h4 class="header-title">Socials Information</h4>
                                         
<div class="mb-3 " style="padding-top:40px"><input class="form-control" id="facebook" type="text" placeholder="FaceBook Link"  value="<?=$admin['facebook']?>" > </div>
<div class="mb-3 "> <input class="form-control" id="twitter" type="text" placeholder="Twitter Link"  value="<?=$admin['twitter']?>" > </div>
<div class="mb-3 "> <input class="form-control" id="linkdin" type="text" placeholder="LinkedIn Link"  value="<?=$admin['linkdin']?>" > </div>
<div class="mb-3 "> <input class="form-control" id="youtube" type="text" placeholder="Youtube Link"  value="<?=$admin['youtube']?>" > </div>
<div class="mb-3 "> <input class="form-control" id="instag" type="text" placeholder="Instagram Link"  value="<?=$admin['instag']?>" > </div>
<div class="mb-2 text-center"> 
    <button class="btn rounded-pill btn-primary" id="SaveDetails3">Save Details</button>
</div>        </div></div> </div> </div>
 <div class="card col-4">
                                    <div class="card-body">
                                          
                                            <div class="row align-items-center"> 
                                                     <div class="mb-3">
                                                        
                                            <h4 class="header-title">Owner Information</h4>
                                         
       <div class="mb-3 " style="padding-top:40px">
<input class="form-control" id="OwnerName" type="text" placeholder="Name of Owner"  value="<?=$admin['OwnerName']?>" > </div>
<div class="mb-3 "> <input class="form-control" id="OwnerTitle" type="text" placeholder="Designation/Title"  value="<?=$admin['OwnerTitle']?>" > </div>
<div class="mb-3 "> <input class="form-control" id="OwnerPic" type="file" accept="image/*"  > </div>
<div class="mb-3 "> <textarea class="form-control" id="OwnerInfo"  placeholder="Bio of Owner"  > <?=$admin['OwnerInfo']?> </textarea> </div>
<div class="mb-2 text-center"> 
    <button class="btn rounded-pill btn-primary" id="SaveDetails4">Save Details</button>
</div>             </div></div> </div> </div>
 <div class="card col-4">
                                    <div class="card-body">
                                          
                                            <div class="row align-items-center"> 
                                                    <div class="mb-3">
                                                        
                                            <h4 class="header-title">Logo/Brand </h4>
                                         
<div class="mb-3 " style="padding-top:40px">
    <label for="purpose" class="form-label">Company Logo Home Page</label>
<input class="form-control" id="Logo" type="file"  accept="image/*"  > </div>
<div class="mb-3 "> 
<label for="purpose" class="form-label">Logo - Other Page</label>
<input class="form-control" id="SecondLogo"  type="file"  accept="image/*" > </div>
<div class="mb-3 "> 
<label for="purpose" class="form-label">Logo - Footer</label>
<input class="form-control" id="ThirdLogo"  type="file"  accept="image/*"  > </div>
<div class="mb-2 text-center"> 
    <button class="btn rounded-pill btn-primary" id="SaveDetails5">Save Details</button>
</div>                                
     
    
                                                      
    
                                                    </div>
                                                </div>
    
                                            </div> <!-- end col -->

                                             <!-- end col -->
                                        </div>
                                        <!-- end row-->
 
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
     $("#SaveDetails1").click(function(e){
          e.preventDefault(e); 
              var CompanyName=$("#CompanyName").val();
              var Slogan=$("#Slogan").val();
              var Address=$("#Address").val();
              var Address2=$("#Address2").val();
              var City=$("#City").val();
              var Pin=$("#Pin").val();
              var State=$("#State").val();
              var Country=$("#Country").val();
             
              $.ajax({
       url : 'include/function_do.php?updateWebOwner=phase1',
       type : 'POST',
       data : {'CompanyName':CompanyName,'Slogan':Slogan,'Address':Address,
       'Address2':Address2,'City':City,'Pin':Pin,'State':State,'Country':Country},
     
        success: function(data){
                        if(data==1){ alert('Information Updated!');
                         window.location.href = 'ManageWebSite.php';
                        } else { alert(data);}},  
                  error: function(jqXhr, textStatus, errorMessage){
                            console.log("Error: ", errorMessage);
                        },
                  cache: false,
                   });
    });
   $("#SaveDetails2").click(function(e){
          e.preventDefault(e); 
          
              var Phone1=$("#Phone1").val();
              var Phone2=$("#Phone2").val();
              var Fax=$("#Fax").val();
              var Mobile1=$("#Mobile1").val();
              var Mobile2=$("#Mobile2").val();
              var Mobile3=$("#Mobile3").val();
              var Mobile4=$("#Mobile4").val();
              var Email1=$("#Email1").val();
              var Email2=$("#Email2").val();
              var Website1=$("#Website1").val();
              var Website2=$("#Website2").val();
             
              $.ajax({
       url : 'include/function_do.php?updateWebOwner=phase1',
       type : 'POST',
       data : {'Phone1':Phone1,'Phone2':Phone2,'Fax':Fax,'Mobile1':Mobile1,'Mobile2':Mobile2,'Mobile3':Mobile3,'Mobile4':Mobile4,
       'Email1':Email1,'Email2':Email2,'Website1':Website1,'Website2':Website2},
     
        success: function(data){
                        if(data==1){ alert('Information Updated!');
                         window.location.href = 'ManageWebSite.php';
                        } else { alert(data);}},  
                  error: function(jqXhr, textStatus, errorMessage){
                            console.log("Error: ", errorMessage);
                        },
                  cache: false,
                   });
    });
    $("#SaveDetails3").click(function(e){
          e.preventDefault(e); 
             var facebook=$("#facebook").val();
              var twitter=$("#twitter").val();
              var linkdin=$("#linkdin").val();
              var youtube=$("#youtube").val();
              var instag=$("#instag").val();
              $.ajax({
       url : 'include/function_do.php?updateWebOwner=phase1',
       type : 'POST',
       data : {'facebook':facebook,'twitter':twitter,'linkdin':linkdin,'youtube':youtube,'instag':instag},
        success: function(data){
                        if(data==1){ alert('Information Updated!');
                         window.location.href = 'ManageWebSite.php';
                        } else { alert(data);}},  
                  error: function(jqXhr, textStatus, errorMessage){
                            console.log("Error: ", errorMessage);
                        },
                  cache: false,
                   });
    });
   $("#SaveDetails4").click(function(e){
         e.preventDefault(e); 
            
               var OwnerName=$("#OwnerName");
              var OwnerPic=$("#OwnerPic");
              var OwnerTitle=$("#OwnerTitle");
              var OwnerInfo=$("#OwnerInfo");
              var formData = new FormData();
formData.append('file[]', OwnerPic[0].files[0]);
formData.append('OwnerName', OwnerName.val());
formData.append('OwnerInfo', OwnerInfo.val());
formData.append('OwnerTitle', OwnerTitle.val());

         $.ajax({
       url : 'include/function_do.php?updateWebOwner=phase2',
       type : 'POST',
       data : formData,
       processData: false,  // tell jQuery not to process the data
       contentType: false,
       enctype: 'multipart/form-data',// tell jQuery not to set contentType
       success: function(data){
                        if(data==1){ alert('Information Updated!');
                           window.location.href = 'ManageWebSite.php';
                        } else {alert(data);}},  
                  error: function(jqXhr, textStatus, errorMessage){
                            console.log("Error: ", errorMessage);
                        },
                  cache: false,
                   });
    
   });  
   $("#SaveDetails5").click(function(e){
         e.preventDefault(e); 

               var Logo=$("#Logo");
              var SecondLogo=$("#SecondLogo");
              var ThirdLogo=$("#ThirdLogo");
              var formData = new FormData();
formData.append('Logo[]', Logo[0].files[0]);
formData.append('SecondLogo[]', SecondLogo[0].files[0]);
formData.append('ThirdLogo[]', ThirdLogo[0].files[0]);

         $.ajax({
       url : 'include/function_do.php?updateWebOwner=phase3',
       type : 'POST',
       data : formData,
       processData: false,  // tell jQuery not to process the data
       contentType: false,
       enctype: 'multipart/form-data',// tell jQuery not to set contentType
       success: function(data){
                        if(data==1){ alert('Information Updated!');
                           window.location.href = 'ManageWebSite.php';
                        } else {alert(data);}},  
                  error: function(jqXhr, textStatus, errorMessage){
                            console.log("Error: ", errorMessage);
                        },
                  cache: false,
                   });
    
   }); 
 
        </script>
        
    </body>
</html>