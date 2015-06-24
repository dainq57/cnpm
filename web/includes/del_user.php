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
	if(isset($_GET['start']) && (int) $_GET['start']){
        $start = $_GET['start'];
    }else{
        $start = 0;
    }
	$stt = $start;
     require("config.php");
     $id = $_GET['userid'];
	 $sql = "select * from account where id = '$id'";
	 $query = mysql_query($sql);
	 if(mysql_num_rows($query) == ""){
        echo "Dữ liệu rỗng";
     }else{
		while($row = mysql_fetch_array($query)){
			 $stt ++;
			 $id_end = $row['id'];
			 $name_end = $row['name']; 
			 $user_end = $row['username'];
             $sql3 = "delete from cocauluong where username = '".$row['username']."' ";
             mysql_query($sql3);
			 $pword_end = $row['pword']; 
			 $email_end = $row['email']; 
			 $level_end = $row['level'];
			 $sql1 ="insert into end_account(id,name, username, pword, email, level) values ('".$id_end."', '".$name_end."', '".$user_end."', '".$pword_end."', 
			 '".$email_end."', '".$level_end."')";
			 $query1 = mysql_query($sql1);
		}
	}
     $sql2 = "delete from account where id = '$id'";
	
     mysql_query($sql2);
    
     header("location: list_user.php");
     exit();
?>
</body>
</html>
