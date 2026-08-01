<? include 'include/header.php'?>

    <!-- Agents Start -->
        <section class="agents-wrapper text-center index section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
                        <h1>Developers showcase</h1>
                        <p>Here you can find all the details related to each developers available in Gurgaon.</p>
                        <div class="search-agents">
                            <input id="myDevList" type="search" name="search" placeholder="Enter the name of Developer">
                            
                        </div>
                    </div>
                    <div id="devsSection" class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
                        <? $docs=DB::query("SELECT * FROM developers WHERE name <> '' ");
                        foreach($docs as $d){
                        
                            echo '<div class="col-xs-6 col-sm-6 col-md-3">
                        <div class="agent">
                            <figure>
                                <a href="DevelopersDetails.php?did='.$d['did'].'" target="_blank">
                                    <img src="admin/assets/uploadedDevelopersLogo/'.$d['logo'].'">
                                    <span class="overlay-1"></span>
                                </a>
                            </figure>
                            <div class="agents-details text-left">
                                <h6><a href="DevelopersDetails.php?did='.$d['did'].'"  target="_blank">'.$d['name'].'</a></h6>
                             
                                
                            </div>
                        </div>
                    </div>';
                        }
                        ?>
                    
                    
                    </div>
                    
                </div>
            </div>
        </section>
    <!-- Agents End -->


   <? include 'include/footer.php'?>