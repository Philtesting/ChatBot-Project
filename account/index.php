<?php
$current = "account";
$current_name = "Mon Compte";
include('../include/header.php');
?>

<?php
if($_SESSION['id'] != NULL)		
{
?>

<?php
			if(isset($_POST['changemdp']))
			{
				if(($_POST['mdp'] == NULL)||($_POST['pwd'] == NULL)||($_POST['confirm'] == NULL))
				{
					echo '<div class="box-warning">Merci de remplir tous les champs</div>';
				}
				elseif($_POST['pwd'] != $_POST['confirm'])
				{
					echo '<div class="box-warning">Confirmation invalide !</div>';
				}
				elseif(strlen($_POST['pwd']) <= 4)
				{
				echo '<div class="box-warning">Votre nouveau mot de passe est trop court</div>';
				}
				elseif(!preg_match("/^[0-9A-Z@]{6,20}$/i", $_POST['pwd']))
				{
				echo '<div class="box-warning">Votre nouveau mot de passe contient des caractères invalides</div>';
				}
				
				else
				{	
					$mdp = md5($_POST['mdp']);
					$requete = "SELECT * FROM users WHERE id = '$id' AND mdp = '$mdp'";
					$query = $connexion->query($requete);
					$resultat = $query->rowCount();
					if($resultat == 1)
					{
						$pwd = md5($_POST['pwd']);
						$requete = "UPDATE users SET mdp = '$pwd' WHERE id = '$id'";
						$query = $connexion->query($requete);
						
						if($query)
						{
							echo '<div class="box-download">Votre mot de passe a été modifié avec succès</div>';
						}
						else
						{
							echo '<div class="box-warning">Une erreur a eu lieu ...</div>';	
						}
					}
					else
					{
						echo '<div class="box-warning">Mauvais mot de passe</div>';
					}
				}
			}
				if(isset($_POST['changeinfo'])) 
		   	{ 
				if(($_POST['email'] == NULL)||($_POST['pwd'] == NULL))
				{
					echo '<div class="box-warning">Merci de remplir tous les champs</div>';
				}
				elseif(!verifmail($_POST['email']))
				{
					echo '<div class="box-warning">Email Invalide</div>';
				}
				else
				{
					$mdp = md5(secure($_POST['pwd']));
					$requete = "SELECT * FROM users WHERE id = '$id' AND mdp = '$mdp'";
					$query = $connexion->query($requete);
					$resultat = $query->rowCount();
					if($resultat == 1)
					{
						$email = secure($_POST['email']);
						$requete = "UPDATE users SET email = '$email' WHERE id = '$id'";
	   					$query = $connexion->query($requete);
						if($query)
						{
							echo '<div class="box-download">Vos informations ont été modifées avec succès</div><br />';
						}
						else
						{
							echo '<div class="box-warning">Une erreur a eu lieu ...</div>';	
						}
					}
					else
					{
						echo '<div class="box-warning">Mauvais mot de passe</div>';
					}
				}
			}
	$births = explode("-", $birth);

		?>
		    <section class="contact-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                   <div class="container">
			<div class="section-title">
				<h3>Mettre à jour ses informations</h3>
			</div>
		</div>
                    <form action="" method="post" class="contact-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                	<input placeholder="Mot de passe" pattern=".{5,}" required type="password" class="check-form" name="pwd"/>
                                    <span><i class="ti-check"></i></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                	<input placeholder="Adresse e-mail" required type="email" class="check-form" name="email" value="<?php echo $email ?>" />
                                    <span><i class="ti-check"></i></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button name="changeinfo" class="site-btn sb-gradients mt-4">Mettre à jour</button>
                            </div>
                        </div>
                    </form>
                    <hr />
                  			<div class="section-title">
				<h3>Modifier son mot de passe</h3>
			</div>  
			<form action="" method="post" class="contact-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                	<input placeholder="Mot de passe actuel" pattern=".{5,}" required type="password" class="form-input" name="mdp" value="" />
                                    <span><i class="ti-check"></i></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                	<input placeholder="Nouveau mot de passe" pattern=".{5,}" required type="password" class="form-input" name="pwd" value=""/>
                                    <span><i class="ti-check"></i></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                	<input placeholder="Confirmation du mot de passe" pattern=".{5,}" required="required" type="password" class="form-input" name="confirm"/>
                                    <span><i class="ti-check"></i></span>
                                </div>
                            </div>                            
                            <div class="col-md-12">
                                <button name="changemdp" class="site-btn sb-gradients mt-4">Modifier</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 mt-5 mt-lg-0">
                                        <div class="widget-area">
                        <h4 class="widget-title">Mon Profil</h4>
                                     <ul class="zebra" style="margin-left:15px">
            <li>Prénom : <strong><?php echo $firstname ?></strong></li>
            <li>Nom : <strong><?php echo $lastname ?></strong></li>
	        <li>Date d'enregistrement : <strong> <?php echo date('d/m/Y', $register);?></strong></li>
			</ul>
			<br />
			<?php if($group >= 100){ echo "<p><a href='".$url."admin' class='site-btn sb-full-- sb-gradients'>Administration</a></p><br />"; } ?>
			<p><a href='<?php echo $url; ?>?action=deco' class='site-btn sb-full-- sb-gradients'>Se déconnecter</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section> 

			<?php
			}
					else
			{
		     echo '<div class="box-warning">Vous ne pouvez pas accéder à cette page :
				  <br />
				  <br />
		          <li>Vous n\'etes pas connecté : <a href="'.$url.'login">Se connecter</a></li>
		          <li>Vous n\'etes pas encore inscrit : <a href="'.$url.'register">S\'inscrire</a></li>
	              </div>';
				  
				  }

?>
</div>
</div>
</div>
</section>
<?php 
include('../include/footer.php'); 
?>
		