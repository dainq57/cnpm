<?php
    session_start();
?>
<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8" />
	<meta name="author" content="a4dse" />

	<title></title>
    
</head>

<body>

<?php
	
     require("config.php");
     $id = $_GET['userid'];
	 $sql = "select * from connect where id = '$id'";
	 $query = mysql_query($sql);
     $sql2 = "delete from connect where id = '$id'";
     mysql_query($sql2);
     header("location: Connected2.php");
     exit();
?>
</body>
</html>
