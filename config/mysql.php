<?php 
session_start();
//give the url for the refresh of page
$url = 'http://localhost:8888/'; 
//this is exemple, if you're in server use your domain link

$time = mktime(date("H"));
$requete = "SELECT * FROM settings";
$query = $connexion->query($requete);
$config = $query->fetch();
$mailweb = $config['mail'];
$title = $config['title'];

$requete = "SELECT * FROM settings_chatbot";
$query = $connexion->query($requete);
$chatbot = $query->fetch();
$m1 = $chatbot['message1'];
$m2 = $chatbot['message2'];
$m3 = $chatbot['message3'];
$colorbot = $chatbot['color'];
$namebot = $chatbot['name'];

$mlogin = '';
if(isset($_POST['co']))
{
	$email = addslashes(htmlentities($_POST['email']));
	$mdp = md5(htmlentities($_POST['mdp']));
	$requete = "SELECT * FROM  users WHERE email = '$email' AND mdp = '$mdp'";
	$query = $connexion->query($requete);
	$resultat = $query->rowCount();
	if($resultat == 1)
	{
		$donnees = $query->fetch();
			$email = unsecure($donnees['email']);
			$regdate = $donnees['regdate'];
			$id = $donnees['id'];
			$expire = $time + 31536000;
			setcookie('id', $donnees['id'], $expire);
			setcookie('mdp', $mdp, $expire); 
			$mlogin = '<div class="box-download">Connexion en cours ...</div>';
			echo '<META HTTP-EQUIV="Refresh" CONTENT="2;URL='.$url.'"> ';
	}
	else
	{
		$mlogin = '<div class="box-warning">Vos identifiants sont invalides !</div>';
	}
}

if(isset($_GET['action']))
{
	if($_GET['action'] == 'deco')
	{
	setcookie('id', '', -1);
	setcookie('mdp', '', -1);

	echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL='.$url.'"> ';
}
}
if (isset ($_COOKIE['id']) && ($_COOKIE['mdp']) && empty($id))
{
	$_SESSION['id'] = $_COOKIE['id']; 
	$id = $_SESSION['id'];
	$mdp = $_COOKIE['mdp'];
	$requete = "SELECT * FROM users  WHERE id = '$id' AND mdp = '$mdp'";
	$query = $connexion->query($requete);
	$resultat = $query->rowCount();
	if($resultat == 1)
	{
		$donnees = $query->fetch();
	        
			$register = $donnees['regdate'];
			$email = unsecure($donnees['email']);
			$group = $donnees['group'];
			$lastname = $donnees['lastname'];
			$firstname = $donnees['firstname'];
			$password = $donnees['mdp'];
	}
	else
	{
		$_SESSION['id'] = NULL;
		setcookie('id', '', -1);
		setcookie('mdp', '', -1);
	}
}
if (!isset ($_COOKIE['email']) && empty($id))
{
	$_SESSION['id'] = NULL;
}
if (!isset ($_COOKIE['mdp']) && empty($id))
{
	$_SESSION['id'] = NULL;
}

$conv_group = array("1" => "Utilsateur Standard", "100" => "Admin");

function error_access() 
{ 

/* $_SESSION['message_pop'] = '
                  <div class="box-warning">Accès non autorisé ! Vous n\'êtes pas connecté ou vous ne faites pas parti du staff !
                  </div>
            
            '; */
            $url_bis =  'https://flipe.vexp.fr/v1/';
            echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL='.$url_bis.'">';
}

function message_pop() 
{ 
if(isset($_SESSION['message_pop']))
{

echo $_SESSION['message_pop']; 

unset($_SESSION['message_pop']);
}
}

?>