<?PHP
$titel=str_replace("_"," ",substr(__FILE__,strpos(__FILE__,"opdracht"),-4));
include('opdracht_begin.php');
/****************************
TYP HIERONDER JOUW PHPCODE
****************************/

$tekst="Ik heb een bijbaantje bij de Aldi. De Aldi betaalt goed hoor.";
echo "$tekst";
$tekst=str_replace('Aldi','Albert Heijn',$tekst);
echo '<h4>'.$tekst.'</h4>';
$tekst=strstr($tekst,"De");
$lengte=strlen($tekst);
$tekst=substr($tekst,10,5);
/****************************
EINDE VAN JOUW PHPCODE
****************************/
include('opdracht_eind.php');
?>