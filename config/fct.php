
<?php

function connexionBD()
{
	$db_login = USER;
	$db_password = PASS;
	$db = 'mysql:host='.HOST.';dbname='.DB.'';
	try
	{
		$connexion = new PDO($db, $db_login, $db_password, array(PDO::ATTR_PERSISTENT=>true,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $connexion;
	}
	catch (PDOException $ex)
	{
		die("
              <div style='text-align: center' class='cadre'>
              <p><img src='../img/maintenance.gif' width='282' height='168'><br></p>
		Bonjour,<br />
		Le site est en maintenance ...<br />
		Il sera à nouveau opérationnel d'ici peu !<br /><br />
		Merci de votre compréhension.<br />
		Le Staff,
		       </div>
              </div>
");
		return false;
	}
}
$connexion = connexionBD();

function verifmail($mail)
{
   $syntaxe = '#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#';
   if(preg_match($syntaxe,$mail))
      return true;
   else
     return false;
}

function month($str)
{
	$str = str_replace('01', 'Jan', $str);
	$str = str_replace('02', 'Fév', $str);
	$str = str_replace('03', 'Mars', $str);
	$str = str_replace('04', 'Avr', $str);
	$str = str_replace('05', 'Mai', $str);
	$str = str_replace('06', 'Juin', $str);
	$str = str_replace('07', 'Juil', $str);
	$str = str_replace('08', 'Août', $str);
	$str = str_replace('09', 'Sept', $str);
	$str = str_replace('10', 'Oct', $str);
	$str = str_replace('11', 'Nov', $str);
	$str = str_replace('12', 'Déc', $str);
	return $str;
}


function encrypt_password($password, $salt=SB_SALT)
{
	return sha1(sha1($salt . $password));
}
function secure($str)
{
	$str = addslashes(htmlentities(trim($str)));
	return $str;
}
function unsecure($str)
{
	$str = stripslashes(html_entity_decode($str));
	return $str;
}
?>
