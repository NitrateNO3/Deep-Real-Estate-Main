<? include 'include/header.php'?>

    <!-- Agents Start -->
        <section class="agents-wrapper text-center index section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
                        <h1>Find an Document from a list related to property transactions</h1>
                        <p>These documents are prepared and checked from the Department of MCG and Haryana Government for diffrent sections of Property Laws for smooth property transaction and a guided ownership.</p>
                        <div class="search-agents">
                            <input id="myDocList" type="search" name="search" placeholder="Enter the name of document">
                            
                        </div>
                    </div>
                    <div id="docsSection" class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
                        <? $docs=DB::query("SELECT * FROM documents WHERE dname <> '' ");
                        foreach($docs as $d){
                            $fileType=pathinfo(basename($d['dpath']), PATHINFO_EXTENSION);
                            if($fileType=='doc' || $fileType=='docx'  ){$ext='docx.png';} else
                            if($fileType=='pdf'  ){$ext='pdf.png';} else
                            if($fileType=='xls' || $fileType=='xlsx'  ){$ext='xls.png';} 
                            echo '<div class="col-xs-6 col-sm-6 col-md-3">
                        <div class="agent">
                            <figure>
                                <a  href="Doc_Open.php?dpath='.$d['dpath'].'&dname='.$d['dname'].'" target="_blank">
                                    <img src="assets/images/'.$ext.'">
                                    <span class="overlay-1"></span>
                                </a>
                            </figure>
                            <div class="agents-details text-left">
                                <h6><a class="thisDoc" href="Doc_Open.php?dpath='.$d['dpath'].'&dname='.$d['dname'].'"  target="_blank">'.$d['dname'].'</a></h6>
                                <p>'.$d['dcat'].'</p>
                                
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