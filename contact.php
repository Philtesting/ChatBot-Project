<?php
$current = "contact";
$current_name = "Contact";
include('include/header.php');
?>
		<?php	
if(isset($_POST['envoie']))
			{	

				if(strlen($_POST['message']) <= 49)
				{
				echo '<div class="box-warning">Vous devez ecrire au minimum 50 caracteres !</div>';
				}
				else
				{
				$cltemail = $_POST['emailc'];
				$message = str_replace("'","\'",($_POST['message']));;
				$idc = $_POST['id'];
				$date = time();
			    $requete = "INSERT INTO contact VALUES('','$idc','$message','0','$date')";
				$query = $connexion->query($requete);
				
					if($query)
					{

											echo '<div class="box-download">Votre message a bien ete envoyer. Vous aurez une reponse sous 24 heures.</div>';
		                }
						}
						}
				
			?>
    <section class="contact-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <form action="" method="post" class="contact-form">
                        <div class="row">                                                	
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea placeholder="Message" class="form-textarea" name="message"></textarea>
                                    <span><i class="ti-check"></i></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                					<?php
			if($_SESSION['id'] != NULL)		
			{
?>
<input type="hidden" class="text" name="id" value="<?php echo $id; ?>" />
<input type="hidden" class="text" name="emailc" value="<?php echo $email; ?>" />

		                            <div class="col-md-12">
                                <button  name="envoie" class="site-btn sb-gradients mt-4">Envoyer</button>
                            </div>
				<?php
			}
			else{
			echo '<div class="box-warning">Vous devez etre <a href="'.$url.'login.php">connecté</a> pour pouvoir envoyer le message</div>';
			}
			?>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 mt-5 mt-lg-0">
                                        <div class="widget-area">
                        <h4 class="widget-title">Nos horaires</h4>
                    <ul class="ul-contact">
                        <li class="li-contact">De lundi a Vendredi: 8h00 a 18h00.</li>
                        <li class="li-contact">Samedi: 10h00 a 16h00.</li>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> 
  

<?php
include('include/footer.php');
?>		