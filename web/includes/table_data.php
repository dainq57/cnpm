<head>
    <style>
        table, th, td {border:1px solid black;border-collapse:collapse;text-align: center;}
    </style>
</head>
<html>
<?php
require("config.php");
$query_pag_data = "SELECT * from cocauluong LIMIT $start, $per_page";
$result_pag_data = mysql_query($query_pag_data) or die('MySql Error' . mysql_error());
$finaldata = $tabledata ="";
$tablehead="<tr><th>Username</th><th>Lương CB</th><th>Phụ Cấp</th><th>Công QD</th><th>Công TT</th><th>Ngày Nghỉ</th><th>Bảo Hiểm</th><th>Lương TT</th></tr>";
while($row = mysql_fetch_array($result_pag_data)) 
{

$id=$row['pid'];
$luongcb=htmlentities($row['luongcb']);
$phucap=htmlentities($row['phucap']);
$cquydinh=htmlentities($row['cquydinh']);
$cthucte=htmlentities($row['cthucte']);
$nghi=htmlentities($row['nghi']);
$baohiem=htmlentities($row['baohiem']);
$luongtt=htmlentities($row['luongtt']);
$tabledata.="<tr id='$id' class='edit_tr'>

<td class='edit_td'>".$row['username']."</td>

<td class='edit_td' >
<span id='one_$id' class='text'>$luongcb</span>
<input type='text' value='$luongcb' class='editbox' id='one_input_$id' />
</td>

<td class='edit_td' >
<span id='two_$id' class='text'>$phucap</span> 
<input type='text' value='$phucap' class='editbox' id='two_input_$id'/>
</td>

<td class='edit_td' >
<span id='three_$id' class='text'>$cquydinh</span>
<input type='text' value='$cquydinh' class='editbox' id='three_input_$id'/>
</td>

<td class='edit_td' >
<span id='four_$id' class='text'>$cthucte</span>
<input type='text' value='$cthucte' class='editbox' id='four_input_$id'/>
</td>

<td class='edit_td'>$nghi</td>
<td class='edit_td'>$baohiem</td>
<td class='edit_td'>$luongtt</td>

</tr>";
}
$finaldata = "<table width='100%'>". $tablehead . $tabledata . "</table><br>"; // Content for Data


/* Total Count */
$query_pag_num = "SELECT COUNT(*) AS count FROM cocauluong";
$result_pag_num = mysql_query($query_pag_num);
$row = mysql_fetch_array($result_pag_num);
$count = $row['count'];
$no_of_paginations = ceil($count / $per_page);

?>
</html>