<?php
$current = "register";
$current_name = "Inscription";
include('include/header.php');
?>
            <?php
			if($_SESSION['id'] != NULL)
			{
				error_access();
			}
			else
			{

				if(isset($_POST['inscr']))
				{
					$msg = '';
					if($_POST['email'] == NULL)
					{
						$msg .= '<li>Champ "E-mail" vide</li>';
					}
					else
					{
						if(!verifmail($_POST['email']))
						{
							$msg .= '<li>E-mail Invalide</li>';
						}
					}
					if($_POST['mdp'] == NULL)
					{
						$msg .= '<li>Champ "Mot de Passe" vide</li>';
					}
					elseif(strlen($_POST['mdp']) <= 4)
					{
					$msg .= '<li>Mot de passe trop court</li>';
					}
					elseif(!preg_match("/^[0-9A-Z@]{6,20}$/i", $_POST['mdp']))
					{
					$msg .= '<li>Votre mot de passe contient des caractères invalides</li>';
					}
					if($_POST['firstname'] == NULL)
					{
					    $msg .= '<li>Champ "Prénom" vide</li>';
					}
						if($_POST['lastname'] == NULL)
					{
					    $msg .= '<li>Champ "Nom" vide</li>';
					}

					if($msg == '')
					{
					$lastname = str_replace("'","\'",($_POST['lastname']));;
					$firstname = str_replace("'","\'",($_POST['firstname']));;
					$mdp = secure($_POST['mdp']);
					$confirm = secure($_POST['confirm']);
					$email = secure($_POST['email']);
							$requete = "SELECT id FROM users WHERE email = '$email'";
							$query = $connexion->query($requete);
							$resultat = $query->rowCount();
							if($resultat > 0)
							{
								echo '<section id="breadcrumbs"><div class="box-warning">Cette adresse est déjà utilisée</div></section>';
							}

							else
							{
							        $ip = $ip = $_SERVER['REMOTE_ADDR'];
									$mdp = md5($mdp);
									$regdate = $time;
									$requete = "INSERT INTO users VALUES('0','$email','$mdp','$lastname','$firstname','1','$regdate','','','$ip')";
									$query = $connexion->query($requete);

									if($query)
									{
									$births = explode("-", $birth);
										$inscrit = 1;
										$expire = $time + 365*24*3600;
										$requete = "SELECT id FROM users WHERE email = '$email'";
										$query = $connexion->query($requete);
										$donnees = $query->fetch();
										$id = $donnees['id'];

										setcookie('id', $donnees['id'], $expire);
										setcookie('mdp', $mdp, $expire);

                   

										echo '<section id="breadcrumbs"><div class="box-download">Vous êtes désormais inscrit sur notre site ! Nous vous souhaitons la bienvenue.</div></section>';

									}
									else
									{
										echo '<section id="breadcrumbs"><div class="box-warning">Une erreur a eu lieu ...</div></section>';
									}

								}


					}

					else
					{
						echo '<section id="breadcrumbs"><div class="box-warning">
		Il y a des erreurs :
		<ol>
					'.$msg.'</li>
					</ol>
					</div></section>';
					}
					}
					else{

				?>
    <section class="contact-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <form action="" method="post" class="contact-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="check-form" type="text" name="firstname" placeholder="Prénom">
                                    <span><i class="ti-check"></i></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="check-form" type="text" name="lastname" placeholder="Nom">
                                    <span><i class="ti-check"></i></span>
                                </div>
                            </div>                                                    	
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="check-form" type="text" name="email" placeholder="Adresse e-mail">
                                    <span><i class="ti-check"></i></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="check-form" type="password" name="mdp" pattern=".{5,}" placeholder="Mot de passe">
                                    <span><i class="ti-check"></i></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button name="inscr" class="site-btn sb-gradients mt-4">S'inscrire</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 mt-5 mt-lg-0">
                                        <div class="widget-area">
                        <h4 class="widget-title">Déjà inscrit ?</h4>
                            <a href="<?php echo $url; ?>login.php"class="site-btn sb-full-- sb-gradients">Se connecter !</a>
                    </div>
                </div>
            </div>
        </div>
    </section> 

	<?php
	}
				}

			?>


<?php
include('include/footer.php');
?>
