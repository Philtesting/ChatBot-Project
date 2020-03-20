<?php
$current = "login";
$current_name = "Identification";
include('include/header.php');
?>
         <?php
            if($_SESSION['id'] != NULL)
            {
                error_access();
            }
            else
            {

            ?>  
    <section class="contact-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                            <?php echo $mlogin; ?>
                    <form action="" method="post" class="contact-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="check-form" type="text" name="email" placeholder="Adresse e-mail">
                                    <span><i class="ti-check"></i></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="check-form" type="password" name="mdp" placeholder="Mot de passe">
                                    <span><i class="ti-check"></i></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button name="co" class="site-btn sb-gradients mt-4">Se connecter</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 mt-5 mt-lg-0">
                                        <div class="widget-area">
                        <h4 class="widget-title">Non inscrit ?</h4>
                            <a href="<?php echo $url; ?>register.php"class="site-btn sb-full-- sb-gradients">S'inscrire !</a>
                    </div>
                </div>
            </div>
        </div>
    </section> 

<?php
}
include('include/footer.php');
?>
