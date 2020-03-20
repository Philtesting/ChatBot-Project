<?php
$current = "admin";
$current_name = "Gestion des Utilisateurs";
include('../include/header.php');
?>


					<?php $valid ='
					<section class="newsletter-section gradient-bg">
		<div class="container text-white">
			<div class="row">
				<div class="col-lg-12 col-md-8 offset-lg-0 offset-md-2">
					<form class="newsletter-form" action="" method="post">
						<input name="search" type="text" placeholder="Email">
						<button name="research">Rechercher</button>
					</form>
				</div>
			</div>
		</div>
	</section>
					';

					?>
					<?php
					if($group < 100)
					{

						error_access();
					}
					else
					{
						?>




						<?php
						if(!isset($_GET['action']) && !isset($_GET['editid']))
						{
							?>
							<?php
							if(isset($_POST['research']))
							{
								if($_POST['search'] == NULL)
								{
									echo '<div class="box-warning" style="margin-top:0px;">Merci de remplir le champ</div>';
								}
								else
								{

									$search = $_POST['search'];
									$requete = "SELECT * FROM users WHERE email LIKE '%$search%'";
									$query = $connexion->query($requete);
									$nbres = $query->rowCount();
									if($nbres != 0)
									{
										?>

										    <section class="contact-page spad">
        <div class="container">
        											<div class="container">
			<div class="section-titler">
				<h3>Recherche - Utilisateur :</h3>
			</div>
		</div>
            <div class="row">
            	<?php
										while($searched = $query->fetch())
										{
											?>


											<div class="member">
					<h2><?php echo $searched['firstname']; ?> <?php echo $searched['lastname']; ?></h2>

				<div class="member-social">
					<a href="?editid=<?php echo $searched['id']; ?>"><i class="fa fa-edit"></i></a>
					<a href="?action=removemember&id=<?php echo $searched['id']; ?>" onclick="if (window.confirm('Voulez-vous vraiment supprimer ce Membre ?') ) { return true; } else { return false; }"><i class="fa fa-trash"></i></a>
				</div>
			</div>

											<?php
										}
										?>
										
            </div>
        </div>
    </section> 
    <?php
									}
									else
									{
										$msgaffi = '<div class="box-warning" style="margin-top:0px;">Aucun résultat</div>';
										echo $msgaffi;
										echo $valid;
									}
								}
							}
							else
							{
								?>
								<?php
								echo $valid;
								?>

								<?php
							}
							?>


							<?php
						}
						if(isset($_GET['action']))
						{
							if($_GET['action'] == 'removemember')
							{
								?>
								<h2 class="form-h">Suppression d'un Utilisateur</h2>
								<?php
								if(isset($_GET['id'])&&is_numeric($_GET['id']))
								{
									$usersid = $_GET['id'];
									$requete = "SELECT * FROM users WHERE id = '$usersid'";
									$query = $connexion->query($requete);
									$resultat = $query->rowCount();
									if($resultat == 0)
									{
										echo '<div class="box-warning">Utilisateur introuvable</div>';
									}
									else
									{
										$requete = "DELETE FROM users WHERE id = '$usersid'";
										$query = $connexion->query($requete);
										if($query)
										{
											echo '<div class="box-download">Utilisateur supprimé</div>';
										}
										else
										{
											echo '<div class="box-warning">Une erreur a eu lieu ...</div>';
										}
									}
								}
								else
								{
									echo '<div class="box-warning">Aucun utilisateur n\'est spécifié</div>';
								}
								?>
								<?php
							}
						}
						if(isset($_GET['editid']))
						{
							?>

							<?php
							if(is_numeric($_GET['editid']))
							{
								$seid = $_GET['editid'];
								if(isset($_POST['modifhim']))
								{
									if(empty($_POST['email'])||empty($_POST['lastname'])||empty($_POST['firstname']))
									{
										echo '<div class="box-warning">Merci de remplir tous les champs</div>';
									}
									elseif(!verifmail($_POST['email']))
									{
										echo '<div class="box-warning">Un email valide ...</div>';
									}
									else
									{
										$elastname = $_POST['lastname'];
										$efirstname = $_POST['firstname'];
										$eemail = $_POST['email'];
										$egroup = $_POST['group'];
										$eid = $_POST['mid'];
										$requete = "UPDATE users SET email = '$eemail', lastname = '$elastname', firstname = '$efirstname' WHERE id = '$eid'";
										$query = $connexion->query($requete);
										if($query)
										{
											echo '<div class="box-download">Utilisateur modifié avec succès !</div>';
										}
									}
								}
								else
								{
									$rq = "SELECT * FROM users WHERE id = '$seid'";
									$qr = $connexion->query($rq);
									$resultat = $qr->rowCount();
									if($resultat == 0)
									{
										echo '<div class="box-warning">ID Invalide</div>';
									}
									else
									{
										$client = $qr->fetch();
										?>        											<div class="container">
			<div class="section-titler">
				<h3>Modification d'un Utilisateur</h3>
			</div>
		</div>
									    <section class="contact-page spad">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="post" class="contact-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="check-form" type="text" name="firstname" value="<?php echo $client['firstname']; ?>">
                                    <span><i class="ti-check"></i></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="check-form" type="text" name="lastname" value="<?php echo $client['lastname']; ?>">
                                    <span><i class="ti-check"></i></span>
                                </div>
                            </div>                                                    	
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="check-form" type="text" name="email" value="<?php echo $client['email']; ?>">
                                    <span><i class="ti-check"></i></span>
                                </div>
                            </div>
											<select name="group" class="check-form" />
											<?php if($resultat != 0)
											{
												?>
												<option value="<?php echo $client['group']; ?>" selected><?php echo $conv_group[$client['group']]; ?></option>
												<?php
											}
											?>
											<option value="1">Utilisateur standart</option>
											<option value="100">Admin</option>
										</select>
										<input type="hidden" name="mid" value="<?php echo $client['id']; ?>" />                            
                            <div class="col-md-12">
                                <button name="modifhim" class="site-btn sb-gradients mt-4">Modifier</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section> 
									<?php
								}
							}
						}
						else
						{
							echo '<div class="box-warning">ID Invalide</div>';
						}
						?>


						<?php
					}
					?>

	<?php
	}
	?>
	</div>
	</div>
	</div>
	</section>
	<?php
	include('../include/footer.php');
	?>
