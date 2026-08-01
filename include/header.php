<? include 'admin/include/MeecroDB.php';
 $thisPage= basename(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));//$_SERVER['REQUEST_URI']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
<link rel="manifest" href="assets/favicon/site.webmanifest">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/jquery.bxslider.min.css">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,600,700,800,900%7CSintony:400,700" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="assets/css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="assets/css/lightbox.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <title><?=$admin['CompanyName']?> - Gurgaon Best Deals, Gurgaon Sale and Rent of properties. Buy property in Sectors and DLF.</title>
</head>
<body>
    <!-- Header Start -->
        <header  class="<?if($thisPage=='index.php' || $thisPage=='/' || $thisPage==''){echo "first";} else{echo "fifth";}?>-header scroll">
            <nav class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="open-btn navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="icon-bar"></span>
                    </button>

                    <a class="logo" href="/">
                        <img src="/admin/assets/myAdmin/<? if($thisPage=='index.php' || $thisPage=='/' || $thisPage==''){echo $admin['Logo'];}
                        else{echo $admin['ThirdLogo'];}?>" alt="<?=$admin['CompanyName']?>">
                    </a>
                </div>
                <div class="collapse navbar-collapse nopad" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav text-uppercase font1">
                        <li>
                            <a href="/">home</a>

                        </li>
                        <li>
                            <a href="About_Us.php">about</a>

                        </li>
                        <li><a href="Residentials.php">Residentials</a></li>
                        <li><a href="Commercials.php">Commercials</a></li>

                        <li><a href="Maps.php">Maps</a></li>
                        <li><a href="Docs.php">Documents</a></li>

                        <li><a href="Contact_Us.php">contact</a></li>
                    </ul>
                </div>
                <? if($thisPage=='index.php' || $thisPage=='/' || $thisPage==''){ ?>
                <a href="SubmitProperty.php" class="btn-1 btn-2 btn-3 text-center"><span>Sell Your  Property</span></a> <? } else { ?>
                <div class="header-right">
                    <ul>
                        <li>
                            <a href="tel:+0128229058">
                                <i class="fa fa-phone"></i>
                                <span><?=$admin['Phone1'] ?></span></a>
                        </li>
                        <li class="btn-2 btn-3"> <a href="#" class="log" data-toggle="modal" data-target="#login"> <span>Sell Your Property</span></a>

                        </li>
                    </ul>
                </div><? } ?>

                <div id="mySidenav" class="sidenav font1">
                    <div class="closebtn-wrapper">
                        <p class="closebtn">
                            <span></span>
                        </p>
                    </div>
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="/">HOME </a>
                                </h4>
                            </div>

                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="About_Us.php">About </a>
                                </h4>
                            </div>

                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="Residentials.php">Residentials </a>
                                </h4>
                            </div>

                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="Commercials.php">Commercials </a>
                                </h4>
                            </div>

                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="Maps.php">Sector Maps </a>
                                </h4>
                            </div>

                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="Docs.php">Documents </a>
                                </h4>
                            </div>

                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="Contact_Us.php">CONTACT</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>


    <!-- Heder End -->