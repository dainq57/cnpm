<?php
include("config.php");
if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);

$luongcb=mysql_escape_String($_POST['luongcb']);
$phucap=mysql_escape_String($_POST['phucap']);
$cquydinh=mysql_escape_String($_POST['cquydinh']);
$cthucte=mysql_escape_String($_POST['cthucte']);
    $baohiem = 0.02 * $luongcb;
    $nghi = $cquydinh - $cthucte;
    $luongtt = $luongcb * $cquydinh / $cthucte + $phucap - $luongcb * $nghi / 26;
$sql = "update cocauluong set luongcb='".$luongcb."',phucap='".$phucap."',cquydinh='".$cquydinh."',cthucte='".$cthucte."', nghi='$nghi', baohiem='$baohiem', luongtt='$luongtt' where pid='$id'";
mysql_query($sql);
    echo "ok";

}
?>