connect.php
-----------
<?php
mb_internal_encoding("UTF-8");
function fConnect()
{
return pg_connect("host=tuxa.sme.utc port=5432 dbname=dbnf17p032 user=nf17p032 password=niWCjsM5");
};
?>

