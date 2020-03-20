<?php
$current = "admin";
$current_name = "Gestion du Chatbot";
include('../include/header.php');
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
		if(isset($_POST['upconfig']))
				{
					if(empty($_POST['name']) || empty($_POST['message1']) || empty($_POST['message2']) || empty($_POST['message3']) || empty($_POST['color']))
					{
						echo '<div class="box-warning">Bah alors ! On essaye de passer sans les required ! Malin ... enfin non !</div>';
					}
					else {

		                $name = str_replace("'","\'",($_POST['name']));
						$message1 = str_replace("'","\'",($_POST['message1']));
						$message2 = str_replace("'","\'",($_POST['message2']));
						$message3 = str_replace("'","\'",($_POST['message3']));
						$color = str_replace("'","\'",($_POST['color']));

						$requete = "UPDATE settings_chatbot SET name = '$name', message1 = '$message1', message2 = '$message2', message3 = '$message3', color = '$color'";
	   					$query = $connexion->query($requete);
						if($query)
						{
							echo '<div class="box-download">Mise à jour des paramètres</div>';
						}
						else
						{
							echo '<div class="box-warning">Une erreur à eu lieu ...</div>';
						}
					}
				}




					?>
					<?php


					$requete = "SELECT * FROM settings_chatbot";
					$query = $connexion->query($requete);
					$nbres = $query->rowCount();
					if($nbres != 0)
					{
						while($config = $query->fetch())
						{
							?>

    <section class="contact-page spad">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                	<h2>Paramétres du ChatBot</h2>
                    <form action="" method="post" class="contact-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="name" value="<?php echo $config['name'];?>" class="check-form" placeholder="Mettre un prénom" required>
                                    <span><i class="ti-check"></i></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="message1" value="<?php echo $config['message1'];?>" class="check-form" placeholder="Premier message" required>
                                    <span><i class="ti-check"></i></span>
                                </div>
                            </div>                                                    	
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="message2" value="<?php echo $config['message2'];?>" class="check-form" placeholder="Second message" required>
                                    <span><i class="ti-check"></i></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="message3" value="<?php echo $config['message3'];?>" class="check-form" placeholder="Troisième message" required>
                                    <span><i class="ti-check"></i></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="color" value="<?php echo $config['color'];?>" class="check-form" placeholder="Background du chatbot" required>
                                    <span><i class="ti-check"></i></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button name="upconfig" class="site-btn sb-gradients mt-4">Mettre à jour</button>
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
						else
						{
							echo '<div class="box-warning">ALERTE ROUGE UN PROBLEME !</div>';
						}
						?>


<?php
}
?>

<?php
include('../include/footer.php');
?>
