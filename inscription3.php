<?php
include "connect.php";
$vConn = fConnect();
# recupération des info  à partir de $_POSR
echo "<pre>";	
print_r($_POST);
echo "</pre>";
$vLogin = $_POST['login'];
$vPw = $_POST['password'];
$vNumSession = $_POST['session'];
#passer la requete sur pg
#Test si login et pw correspondent : 
$vSql1 = "Select pklogin, apassword from tGroupe where pklogin = '$vLogin' and apassword = '$vPw';";
$vQuery = pg_query($vConn, $vSql1);
$vResult = pg_fetch_array($vQuery);
echo "<pre>";	
print_r($vResult);
echo "</pre>";
echo "<pre>";	
print_r($vResult);
echo "</pre>";
$vLog = $vResult['pklogin'];
$vPw2 = $vResult['apassword'];
if ($vLog == $vLogin and $vPw2 == $vPw) {
	#Update si < 6
	$vSql3 = "Update tGroupe Set session = '$vNumSession' where pkLogin = '$vLogin' and apassword = '$vPw' and 
	(Select count(tG.pkLogin) as compte 
	from tSession as tS left outer join tGroupe as tG on tG.session = tS.pkNum 
	where session = '$vNumSession'
	) 
	< 6";

	echo("<p>Inscription de $vLogin au pw $vPw a la session $vNumSession</p>");
	echo ("<br />");
}
else
{
	echo("<p>Echec Inscription de $vLogin au pw $vPw a la session $vNumSession</p>");
	echo ("<br />");
}
	
echo("<a href='inscription1.php'> Retour accueil </a>");

?>

