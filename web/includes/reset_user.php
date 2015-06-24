<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8" />
	<meta name="author" content="duong" />

</head>

<body>
<?php
    require("config.php");
    $id = $_GET['userid'];
    $sql = "select id, username from account where id = '".$id."' ";
    $query = mysql_query($sql);
    $row = mysql_fetch_array($query);
    $pp = sha1($row['username']);
    $sql1 = "UPDATE account SET pword = '".$pp."' where id = '".$id."' ";
    mysql_query($sql1);
    header("location: list_user.php");
?>

</body>
</html>