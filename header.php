<?php include('config.php'); ?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>EXATEC</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/slick.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <?php
    if(defined('environment') && environment == 'DEV'){ ?>
      <base href='<?php echo devURL; ?>'>
<?php }
    else {?>
      <base href='<?php echo prodURL; ?>'>
  <?php }
  ?>
  <?php 
  // <base href="http://www.tagindex.net/html/">
  ?>
  <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
  
  <meta name="theme-color" content="#fafafa">
</head>

<body>
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <header class="header">
    <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2 offset-lg-1 col-sm-12">
            <div class="logo">
                <a class="logo-a" href="#" title='Premios Exatec'><span class="logo-s">Logo</span></a>
            </div>
          </div>
          <div class="col-lg-8 offset-lg-1 col-sm-12"> 
            <div class="menu">
              <nav class="navbar navbar-expand-lg navbar-light justify-content-sm-start">
                  <a class="navbar-brand hidden order-1 order-lg-0 ml-lg-0 ml-2 mr-auto" href="">Brand</a>
                  <button class="navbar-toggler align-self-start" type="button">
                    <span class="icon-bar"></span>
                    <span class="icon-bar size-line"></span>
                    <span class="icon-bar"></span>
                  </button>
            
                  <div class="collapse navbar-collapse d-flex flex-column flex-lg-row flex-xl-row justifity-content-lg-end p-3 p-lg-0 mt-lg-0 mobileMenu" id="navbarSupportedContent">
                    <div class="d-block d-lg-none d-xl-none">
                      <i class="fas fa-times"></i>
                      <div class="logo" id="logo-movil"></div>
                    </div>    
                      <ul class="navbar-nav align-self-stretch">

                          <li class="nav-item">
                              <a class="nav-link" id="txt-menu" href="#link-premios">Premios Exatec</a>
                          </li> 

                          <li class="nav-item">
                              <a class="nav-link" id="txt-menu" href="aquiennominar.php">¿A quién nominar?</a>
                          </li> 

                          <li class="nav-item">
                              <a class="nav-link" id="txt-menu" href="#link-ganadores">Galería de ganadores</a>
                          </li>
                      
                          <li class="nav-item">
                              <a class="nav-link" id="txt-menu" href="questions.php">Preguntas Frecuentes</a>
                          </li>

                          <li class="nav-item">
                              <a id="txt-menu" class="btn-none-movil nav-link button-general button-primary button-menu-header" href="proceso1.php">Nomina a un Exatec</a>
                          </li>                                    
                      </ul>
                  </div>
                </nav>
                <div class="overlay"></div>
              <div class="btn-movil d-block d-lg-none d-xl-none">
                <a id="txt-menu" class="nav-link button-general button-primary button-menu-header" href="proceso1.php">Nomina a un Exatec</a>
              </div>
            </div>
          </div>
        </div>
    </div>



  </header>

  