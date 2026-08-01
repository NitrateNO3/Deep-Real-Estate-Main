<? include 'include/header.php'; ?>

    <!-- Submit Property Detail Start -->
        <section class="submit-property-wrapper index inner-section-padding">
            <div class="container">
                <h2 class="main-title text-center"> Submit Properties - Add Images</h2>
          <style>
              .upload input.upload-image{width: 500px;
    border: 1px solid gray;
    height: 65px;
    padding: 20px;}
          </style>     
                <form enctype="multipart/form-data" method="post" action="">
                    <h5>Select Images</h5>
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 form-group">
                            <div class="upload">
                                <label>Press Control/Command button to select multiple files.</label>
                                <input id="fuDocument" type="file" class="upload-image" accept="image/*" multiple="multiple" />
                                
                                
                            </div>   
                       
                        
                        <button id="SubmitPicturebyUser" style="margin-top:50px" class="btn-1 flat-btn upload-btn">
                                    <span>Upload</span>
                                </button> </div>
                    </div>
                </form>
               
            </div>
        </section>
    <!-- Submit Property Detail Start -->

   <? include 'include/footer.php'; ?>