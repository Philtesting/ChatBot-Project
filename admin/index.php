<?php
$current = "admin";
$current_name = "Admininistration";
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
<section class="features-section spad gradient-bg">
		<div class="container text-white">
			<div class="section-title text-center">
				<h2>Panel d'administration</h2>
			</div>
			<div class="row">
				<!-- feature -->
				<div class="col-md-6 col-lg-4 feature">
					<i class="ti-user"></i>
					<div class="feature-content">
						<h4>Gérer les utilisateurs</h4>
						<p>Modification des informations d'utilisateurs.</p>
						<a href="<?php echo $url; ?>admin/manageClients.php" class="readmore">Accéder à la page</a>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 feature">
					<i class="ti-headphone-alt"></i>
					<div class="feature-content">
						<h4>ChatBot</h4>
						<p>Gérer les paramètres modifiables du chatbot !</p>
						<a href="<?php echo $url; ?>admin/manageChatbot.php" class="readmore">Accéder à la page</a>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php
}
?>

<?php
include('../include/footer.php');
?>
