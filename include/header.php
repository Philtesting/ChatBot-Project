<?php
require_once('/Applications/MAMP/htdocs/Chatbot/config/constants.php'); 
// get the constants on the config/constants.php file. Use your computer path if on wamp, if on server use your server path.
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>BankAmica</title>
    <meta charset="UTF-8">
    <meta name="description" content="BankAmica">
    <meta name="keywords" content="cryptocurrency, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="<?php echo $url; ?>img/favicon.ico" rel="shortcut icon"/>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo $url; ?>css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo $url; ?>css/font-awesome.min.css"/>
    <link rel="stylesheet" href="<?php echo $url; ?>css/themify-icons.css"/>
    <link rel="stylesheet" href="<?php echo $url; ?>css/animate.css"/>
    <link rel="stylesheet" href="<?php echo $url; ?>css/owl.carousel.css"/>
    <link rel="stylesheet" href="<?php echo $url; ?>css/style.css"/>
    <link rel="stylesheet" href="<?php echo $url; ?>css/chatbot.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<?php if(empty($current)) { ?>
<body>
        <div class="container chatPos">
        <div class="col-xs-12 .col-sm-12 col-md-8 col-lg-9" style="float: right;">
            <div class="panel" style="background: <?php echo $colorbot; ?>;border:none">

                <!--Widget body-->
                <div id="demo-chat-body" class="collapse">
                    <div id="scrolltop" class="nano " style="height:380px">
                        <div class="nano-content pad-all" tabindex="0">
                            <ul id="answerbox" class="list-unstyled media-block">
                                <li class="mar-btm">
                                    <div class="media-body pad-hor mar-btm">
                                        <div style="margin-bottom: 10px;">
                                            <div class="media-left">
                                                <img src="<?php echo $url; ?>bot.png" class="img-circle img-sm" alt="Profile Picture">
                                            </div>
                                            <div class="speech">
                                                <p>
                                                    Bonjour ! Je m'appelle <strong><?php echo $namebot; ?></strong> 😊. Je suis votre assistant virtuel prêt à vous aider dans le cadre de vos activitées financières.<br>
                                                    <br>
                                                    Je vous invite à choisir une des fonctionnalités suivantes 👇
                                                </p>
                                            </div>
                                        </div>
                                        <ul>
                                            <li id="convertir" class="btn btn-primary" style="margin-bottom: 10px">
                                                💸 Conversion d’argent
                                            </li>
                                            <li id="pret"class="btn btn-primary "  style="margin-bottom: 10px;">
                                                ❓Eligibilité au prêt bancaire
                                            </li>
                                            <li id="banqMoi" class="btn btn-primary " style="margin-bottom: 10px;">
                                                🏦 Quelle banque pour moi ?
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="nano-pane">
                            <div class="nano-slider" style="height: 141px; transform: translate(0px, 0px);">
                            </div>
                        </div>
                    </div>

                    <!--Widget footer-->
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-xs-8">
                                <input id="textbox" onkeypress="pressEnter(event)" type="text" placeholder="Enter your text" class="form-control chat-input" name="question">
                            </div>
                            <div class="col-xs-4">
                                <button id="sendMessage" name="test" class="btn btn-primary btn-block" type="submit">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Heading-->
                <div class="panel-control">
                    <div class="sticky-top">
                        <img src="bot.png" class="img-circle" style="width: 90px; height: 90px;" data-toggle="collapse" data-target="#demo-chat-body" alt="Profile Picture">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header section -->
    <header class="header-section clearfix">
        <div class="container-fluid">
            <a href="<?php echo $url; ?>" class="site-logo">
                <img src="<?php echo $url; ?>img/logo.png" alt="">
            </a>
            <div class="responsive-bar"><i class="fa fa-bars"></i></div>
            <?php if($_SESSION['id'] != NULL) { ?><a href="<?php echo $url; ?>account" class="user"><i class="fa fa-user"></i></a> <?php } else { ?>  <a href="<?php echo $url; ?>login.php" class="user"><i class="fa fa-sign-in"></i></a> <?php } ?>
            <?php if($_SESSION['id'] != NULL) { ?><a href="<?php echo $url; ?>account" class="site-btn">Mon Compte</a> <?php } else { ?>  <a href="<?php echo $url; ?>login.php" class="site-btn">S'identifier</a> <?php } ?>         
            <nav class="main-menu">
                <ul class="menu-list">
                    <li><a href="#solution">Solutions</a></li>
                    <li><a href="#chatbot">Chatbot</a></li>
                    <li><a href="#team">Team</a></li>
                    <li><a href="<?php echo $url; ?>contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- Header section end -->


  <?php } else { ?>
<header class="header-section clearfix">
        <div class="container-fluid">
            <a href="<?php echo $url; ?>" class="site-logo">
                <img src="<?php echo $url; ?>img/logo.png" alt="">
            </a>
            <div class="responsive-bar"><i class="fa fa-bars"></i></div>
            <?php if($_SESSION['id'] != NULL) { ?><a href="<?php echo $url; ?>account" class="user"><i class="fa fa-user"></i></a> <?php } else { ?>  <a href="<?php echo $url; ?>login.php" class="user"><i class="fa fa-sign-in"></i></a> <?php } ?>
            <?php if($_SESSION['id'] != NULL) { ?><a href="<?php echo $url; ?>account" class="site-btn">Mon Compte</a> <?php } else { ?>  <a href="<?php echo $url; ?>login.php" class="site-btn">S'identifier</a> <?php } ?>      
            <nav class="main-menu">
                <ul class="menu-list">
                    <li><a href="<?php echo $url; ?>index.php#solution">Solutions</a></li>
                    <li><a href="<?php echo $url; ?>index.php#chatbot">Chatbot</a></li>
                    <li><a href="<?php echo $url; ?>index.php#team">Team</a></li>
                    <li><a href="<?php echo $url; ?>contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

<section class="page-info-section">
        <div class="container">
            <h2><?php echo $current_name; ?></h2>
            <div class="site-beradcamb">
                <a href="<?php echo $url; ?>">Accueil</a>
                <span><i class="fa fa-angle-right"></i> <?php echo $current_name; ?></span>
            </div>
        </div>
    </section>


    <?php } ?>