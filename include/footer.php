<section class="subscribe-wrapper bg3 reveal index">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
                    <p>Get latest updates in your inbox</p>
                    <div class="subscribe">
                        <input type="text" id="emailForLatestUpdate" name="email" placeholder='Email Address'>
                        <button id="buttonForLatestUpdate" class="btn-1 bg2 font1"><span>subscribe now !</span></button>
                    </div>
                </div>
            </div>
        </div>
</section>
    <!-- Quick Links Tab End -->

    <!-- Footer Start -->
        <footer>
            <div class="container">
                <div class="footer-wrapper section-padding">
                    <div class="row">
                        <div class="col-xs-6 col-sm-3 col-md-3">
                            <a href="#" class="footer-logo">
                                <img src="/admin/assets/myAdmin/<?=$admin['Logo']?>" alt="<?=$admin['CompanyName']?>">
                            </a>
                            <p><?=$admin['Address']?> <?=$admin['Address2']?><?=$admin['City']?>, <?=$admin['State']?>-<?=$admin['Pin']?>, <?=$admin['Country']?></p>
                            <ul class="social-icons text-center">
                                <?if($admin['facebook'] != ''){ ?><li class="facebook">
                                    <a href="<?=$admin['facebook']?>"><i class="fa fa-facebook"></i></a>
                                </li> <? } ?>
                                <?if($admin['twitter'] != ''){ ?><li class="twitter">
                                    <a href="<?=$admin['twitter']?>"><i class="fa fa-twitter"></i></a>
                                </li><? } ?>
                                <?if($admin['linkdin'] != ''){ ?><li class="linkedin">
                                    <a href="<?=$admin['linkdin']?>"><i class="fa fa-linkedin"></i></a>
                                </li><? } ?>
                                <?if($admin['youtube'] != ''){ ?><li class="youtube">
                                    <a href="<?=$admin['youtube']?>"><i class="fa fa-youtube"></i></a>
                                </li><? } ?>
                                <?if($admin['instag'] != ''){ ?><li class="instag">
                                    <a href="<?=$admin['instag']?>"><i class="fa fa-instagram"></i></a>
                                </li><? } ?>
                            </ul>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-3">
                            <h6>company</h6>
                            <ul class="company-links">
                                <? $menu1=DB::query("SELECT * FROM menu WHERE menu_cat='1' ORDER BY menu_id");
                                foreach($menu1 as $mn1){
                                echo '<li><a href="'.$mn1['menu_url'].'">'.$mn1['menu_name'].'</a></li>';}?>

                            </ul>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-3">
                            <h6>information</h6>
                            <ul class="info-links">
                                 <? $menu1=DB::query("SELECT * FROM menu WHERE menu_cat='0' ORDER BY menu_id");
                                foreach($menu1 as $mn1){
                                echo '<li><a href="'.$mn1['menu_url'].'">'.$mn1['menu_name'].'</a></li>';}?>
                            </ul>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-md-3">
                            <h6>Connect with Us</h6>
                            <p>Phone: <?=$admin['Phone1']?><br />
Email: <?=$admin['Email1']?> <br />
Mobile.:
<?=$admin['OwnerName']?> <br />
<?=$admin['Mobile1']?> <br />
</p>
<ul class="social-icons text-center">
                                <li class="facebook" style="background: lightgray;">
                                    <a style="width: 200px;" href="SubmitProperty.php">Register a Property</a>
                                </li></ul>

                        </div>
                    </div>
                </div>
                <p class="copyright text-center"><i class="fa fa-copyright"></i> Copyright 2005-<?=date('Y')?> <?=$admin['CompanyName']?>. All Rights Reserved.</p>
            </div>
        </footer>
    <!-- Footer End -->

    <!--Login Modal Start -->
        <section class="login-modal">
            <div class="container">
                <!-- Modal -->
                <div class="modal fade" id="login" role="dialog">
                    <div class="modal-dialog modal-xs">
                        <div class="modal-content">
                             <a href="#" class="modal-close" data-dismiss="modal">
                                <span></span>
                                <span></span>
                            </a>
                            <div class="login-wrapper" id="quickquerymysection">
                                <div class="modal-header">
                                    <h2 class="text-center text-uppercase">We will call you.</h2>
                                    <div class="dis-title text-center" style="margin-bottom:0px !important;">
                                        <p>We know that you may be running with lack of time and want most suitable deal.
                                        Please provide some of your details and we assure you that we will connect with you at our earliest.</p>
                                    </div>
                                </div>
                                <div class="modal-body text-center">
                                    <input type="text" id="qp_name" placeholder="Full name *">
                            <input type="text" id="qp_email" placeholder="Email address *">
                            <input type="text" id="qp_phone" placeholder="Telephone *">
                            <textarea style="margin-bottom:20px;height:40px" id="qp_message"></textarea>
                                    <button class="btn-1" id="SubmitQueryProperty">
                                        <span>Request a Call</span>
                                    </button>


                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!--Login Modal End -->

<script
  src="https://code.jquery.com/jquery-1.12.0.min.js"
  integrity="sha256-Xxq2X+KtazgaGuA2cWR1v3jJsuMJUozyIXDB3e793L8="
  crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.bxslider.min.js"></script>
<script src="assets/js/ion.rangeSlider.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/lightbox.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.js"></script>
<script src="assets/js/custom.js"></script>

<script src="assets/js/autocomplete.js"></script>
<script src="admin/assets/libs/sweetalert2/sweetalert2.all.min.js"></script>

<script>
<? if($thisPage=="Maps.php"){ ?>
    $("#btnMaps").click(function(){
        var mn = $("#selectMaps").val();
        $("#mapSectionList").prepend('<img id="theImg" src="assets/images/bx_loader.gif" style="width:100px" />');
    $.ajax({
        type: "POST",
        url: "include/function_do.php?mkey="+mn,
        cache: false,
        success: function(response) { $("#mapSectionList").empty();

        $("#mapSectionList").prepend(response);

        }

    });
    });

         $("#zlvl").change(function(e){
                e.preventDefault(e);
               var src=$(this).val();

              var srcVal = $("#reloadMap").attr("src").split("&zoomlevel");;

              var newPreview= srcVal[0] + "&zoomlevel=" + src;
              document.getElementById("reloadMap").setAttribute("src", newPreview);
            });
    <? } else if($thisPage=="Developers.php"){
        ?>
     $("#myDevList").keypress(function(){
        var mn = $(this).val();
        $("#devsSection").prepend('<img id="theImg" src="assets/images/bx_loader.gif" style="width:100px" />');
    $.ajax({
        type: "POST",
        url: "include/function_do.php?getdev="+mn,
        cache: false,
        success: function(response) {
            $("#devsSection").empty();
        $("#devsSection").html(response);



        }

    });
    });<?
    } else if($thisPage=="Docs.php"){ ?>
     $("#myDocList").keypress(function(){
        var mn = $(this).val();
        $("#docsSection").prepend('<img id="theImg" src="assets/images/bx_loader.gif" style="width:100px" />');
    $.ajax({
        type: "POST",
        url: "include/function_do.php?dockey="+mn,
        cache: false,
        success: function(response) {
            $("#docsSection").empty();
        var docs=response.split("hjhjhj");
        docs = $.grep(docs, n => n == 0 || n);
        $.each(docs, function(i,y){


            var x = y.split("^");
            newHTM ='<div class="col-xs-6 col-sm-6 col-md-3">'+
                        '<div class="agent">'+
                            '<figure>'+
                               ' <a href="Doc_Open.php?dpath='+x[3]+'&dname='+x[1]+'" target="_blank">'+
                                   ' <img src="assets/images/'+x[4]+'">'+
                                    '<span class="overlay-1"></span>'+
                                '</a>'+
                           ' </figure>'+
                            '<div class="agents-details text-left">'+
                                '<h6><a href="administrator/'+x[3]+'"  target="_blank">'+x[1]+'</a></h6>'+
                                '<p>'+x[2]+'</p>'+

                            '</div>'+
                        '</div>'+
                    '</div>';
            $("#docsSection").prepend(newHTM);
        });

        }

    });
    });

    <? }
    else if($thisPage=='Contacts_Us.php'){ ?>
        $("#contactButton").click(function(e){
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            e.preventDefault(e);
            fname=$("#fullname").val();
           mobile=$("#mobileno").val();
           emailid=$("#emailid").val();
           subject=$("#subject").val();
           message=$("#message").val();
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          if(regex.test(emailid) == true){
           $.ajax({
         url:"include/function_do.php?doContact=ok",
          type: "POST",
           data: { 'fname': fname, 'mobile':mobile,'emailid':emailid,'subject':subject,'message':message},
        cache: false,
         success: function(response) {
          if(response==1){ alert('Message Successfully sent!');
return false;} else {alert('some error, please contact admin at <?=$admin['Phone1']?>.') }
		} });} else {alert('Please provide a valid email id!');}

        });


   <? }
    else if($thisPage=='PropertiesDetails.php'){ ?>
        $("#sendEnq").click(function(e){
             e.preventDefault(e);
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            fname=$("#p_name").val();
           mobile=$("#p_phone").val();
           emailid=$("#p_email").val();
           pid=$("#p_pid").val();
           pname=$("#p_pname").val();
           message=$("#p_message").val();

          if(regex.test(emailid) == true){
           $.ajax({
         url:"include/function_do.php?doPropEnq=ok",
          type: "POST",
           data: { 'fname': fname, 'mobile':mobile,'emailid':emailid,'pid':pid,'pname':pname,'message':message},
        cache: false,
         success: function(response) {
          if(response==1){ alert('Message Successfully sent!');
return false;} else {alert('some error, please contact admin at <?=$admin['Phone1']?>.') }
		} });} else {alert('Please provide a valid email id!');}

        });


   <? }
   else if($thisPage=='SubmitProperty.php'){ ?>
       $("#SubmitPropertybyUser").click(function(e){
           e.preventDefault(e);
           var selectedValues='';
           var countChecked=$(".ameVal:checked").length;
           $(".ameVal:checked").each(function(i, obj) {
    selectedValues += $(this).attr("name");
    if(i+1 < countChecked){selectedValues += ',';}
});
            if($("#purpose").val() == ''){alert('"Property On" cannot be Empty!');} else
                if($("#ptype").val() == ''){alert('Type cannot be Empty!');} else
                if($("#subtype").val() == ''){alert('Sub-type cannot be Empty!');} else
                if($("#city").val() == ''){alert('City cannot be Empty!');} else
                if($("#location").val() == ''){alert('Location cannot be Empty!');} else
                if($("#pname").val() == ''){alert('Property Title cannot be Empty!');} else
                if($("#psize").val() == ''){alert('Dimension cannot be Empty!');} else
                if(isNaN($("#psize").val())) { alert('Only Numbers allowed in size.!');} else
                if($("#unit").val() == ''){alert('Dimention Unit cannot be Empty!');} else
                if($("#did").val() == ''){alert('Developer cannot be Empty!');} else
                if($("#price").val() == ''){alert('Price cannot be Empty!');} else

                 if(isNaN($("#price").val())) { alert('Only Numbers allowed in price.!');} else
                if($("#unit1").val() == ''){alert('Price Unit cannot be Empty!');} else
                if($("#movein").val() == ''){alert('Possession cannot be Empty!');} else
                if($("#details").val() == ''){alert('Description cannot be Empty!');} else
                if(selectedValues == ''){alert('Amenities cannot be Empty!');} else
                if($("#contact_person").val() == ''){alert('Contact Person cannot be Empty!');} else
                if($("#contact_no").val() == ''){alert('Contact No. cannot be Empty!');}
                else {
                $.ajax({
                    type: "POST",
                    url: "admin/include/function_do.php?addProperty=1",
                    data: {'purpose':$("#purpose").val(),'ptype':$("#ptype").val(),'subtype':$("#subtype").val(),'city':$("#city").val(),
                        'location':$("#location").val(),'sublocation':$("#sublocation").val(),'pname':$("#pname").val(),'psize':$("#psize").val(),
                        'unit':$("#unit").val(),'did':$("#did").val(),'price':$("#price").val(),'unit1':$("#unit1").val(),
                        'movein':$("#movein").val(),'details':$("#details").val(),'amenities':selectedValues,'contact_person':$("#contact_person").val(),
                        'contact_no':$("#contact_no").val()
                    },
                    dataType: "text",
                success: function (data) {
                data1=data.split("^");
                if(data1[1]=='Property Added!'){ window.location.href = 'SubmitProperty2.php?pid='+data1[0];} else {
                alert(data);}
        },  error: function(jqXhr, textStatus, errorMessage){
      console.log("Error: ", errorMessage);
   },

        cache: false,

    });}
       })
  <? }
  else if($thisPage=='SubmitProperty2.php'){ ?>
       $("#SubmitPicturebyUser").click(function(e){
           e.preventDefault(e);

           var fd = new FormData();
var files = $("#fuDocument").get(0).files; // this is my file input in which We can select multiple files.
fd.append("pid", <?=$_GET['pid']?>);

for (var i = 0; i < files.length; i++) {
    fd.append("file[]", files[i]);
}

$.ajax({
    type: "POST",
    url: 'admin/include/function_do.php?upload=yes',
    contentType: false,
    processData: false,
    data: fd,
    success: function (data) {

        if(data=='Picture Added!'){alert('Property Added and under review! We will update you once your propety is alive on our website.');
        window.location.href = 'index.php';} else {
                alert(data);}

    }
 })


       })
  <? }
    ?>

    $("#buttonForLatestUpdate").click(function(){
        var emailid=$("#emailForLatestUpdate").val();
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          if(regex.test(emailid) == true){
         $.ajax({
         url:"include/function_do.php?doLatestUpdate=ok",
          type: "POST",
           data: { 'emailid':emailid},
        cache: false,
         success: function(response) {
          if(response==1){ alert('Email added successfully');
return false;} else {alert('some error, please contact admin at <?=$admin['Phone1']?>.') }
		} });
          } else{ alert('Please provide a valid email address.');}


    });

    $("#SubmitQueryProperty").click(function(e){
        e.preventDefault(e);

              var p_name= $("#qp_name").val();
              var p_email = $("#qp_email").val();
              var p_phone = $("#qp_phone").val();
              var p_message = $("#qp_message").val();
              $.post("include/function_do.php?sendQuickEnq=yes",{pname:p_name,pemail:p_email,pphone:p_phone,pmsg:p_message},function(data,status){
                  if(data==1){
                      $("#quickquerymysection").html("Enquiry Sent. We will contact your soon!");

                  } else {alert ('Some Error!!'+data);}
              });
            });



</script>
</body>
</html>