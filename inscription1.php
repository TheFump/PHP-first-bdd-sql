<?php
include "connect.php";
$vConn = fConnect();
echo ("<h1> Présentation des sessions : </h1>");
$vSql = "Select tS.aDebut as Deb, tS.aFin as Fin, tS.pkNum as Num, count(tG.pkLogin) as compte from tSession as tS left outer join tGroupe as tG on tG.session = tS.pkNum group by tS.aDebut, tS.aFin, tS.pkNum Having count(tG.pkLogin) < 6 order by Num";
$vQuery = pg_query($vConn, $vSql);
echo ("<table border = \"2\">");
echo("<tr><th>'Numero'</th><th>'Date Debut'</th><th>'Date Fin'</th><th>'Nombre de groupes'</th></tr>");
while($vResult = pg_fetch_array($vQuery)):
#echo "<pre>";	
#print_r($vResult);
#echo "</pre>";
	$vNum = $vResult['num'];
	$vDebut = $vResult['deb'];
	$vFin = $vResult['fin'];
	$vNbG = $vResult['compte'];
	echo(" <tr><td>'$vNum'</td><td>'$vDebut'</td><td>'$vFin'</td><td>'$vNbG'</td></tr>");
endwhile;
echo("</table>");
echo ("<br />");
echo("<a href='inscription2.html'> S'inscrire </a>");
?>
