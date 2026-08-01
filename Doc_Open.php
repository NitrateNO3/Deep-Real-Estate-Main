<? include 'include/header.php';
$dpath=$_GET['dpath'];
$dname=$_GET['dname'];

?>
<style>
    #downloadThisDoc:hover{ color:#ffffff;font-weight:bold;}
</style>
    <!-- Agents Start -->
        <section class="agents-wrapper text-center index section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
                        <h1><?=$dname?></h1>
                   <a href="admin/assets/<?=$dpath?>" id="downloadThisDoc" class="btn-2 btn-3" style="margin-bottom:20px" >Download</a>
                    </div>
                    <div id="mapDocsSection" class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
                        <iframe style="width:80%;height:1042px;" scrolling="yes"
                        src="https://docs.google.com/viewer?url=https://deeprealestate.in/<?=basename(dirname(__FILE__))?>/admin/assets/<?=$dpath?>&embedded=true" 
                        style="background-color:antiquewhite;" frameborder='0'></iframe>
                        
                    
                    
                    </div>
                    
                </div>
            </div>
        </section>
    <!-- Agents End -->

    <!-- Subscribe Start -->
        <section class="subscribe-wrapper bg3 reveal index">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-10 col-md-offset-1">
                        <p>Get latest updates in your inbox</p>
                        <div class="subscribe">
                            <input type="text" name="email" placeholder='Email Address'>
                            <button class="btn-1 bg2 font1"><span>subscribe now !</span></button>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    <!-- Subscribe End -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   <? include 'include/footer.php'?>
   <script>
   var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   
    $("#downloadThisDoc").click(function(e){
         e.preventDefault(e); 
         var mylinkdoc=$(this).attr("href");
         
         Swal.fire({
  title: 'Please provide your email address',
  input: 'text',
  inputAttributes: {
    autocapitalize: 'off'
  },
  showCancelButton: true,
  confirmButtonText: 'Submit',
  showLoaderOnConfirm: true,
  preConfirm: (email) => {
      if(regex.test(email) == true){
          return fetch('include/function_do.php?emailForDoc='+email+'&file='+mylinkdoc.split('/').pop())
      .then(response => {
         
          if (!response.ok) {
          throw new Error(response.statusText)
        }
       // 
 return response.json()
      })
      .catch(error => {
        Swal.showValidationMessage(
          `Request failed: ${error}`
        )
      })
  }}
 
}).then((result) => {
     console.log(result);
  if (result.value==1) {
       newwindow=window.open(mylinkdoc,'name','height=200,width=150');
     newwindow.focus();
    return setTimeout(function() {
    newwindow.close();
    }, 3000);
  }
})
        
    })
    
</script>