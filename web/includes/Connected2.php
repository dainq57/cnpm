<?php
if(!isset($_SESSION)){
    session_start();
}
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html" charset="utf-8">
<meta name="author" content="a4dse">
<link rel="stylesheet" type="text/css" href="admin.css" />
<script src="../js/jquery.confirmDeletecontent.js"></script>
<title>Liên Hệ </title>
</head>

<body>
	<style>
		#nhan h1{
			margin: 20px 320px;
			text-align: center;
		}
        table{
            background-color: #CFE9FF;
            margin: 0 auto;
            margin-top: 40px;
        }
        table, th, td {
            border:1px solid black;
            border-collapse:collapse;
            text-align: center;
        }
  
	</style> 


	<?php
		require("admin.php");
		?>
	<div id = "nhan">
		<h1>DANH SÁCH PHẢN HỒI CỦA NHÂN VIÊN</h1>
	</div>
		<center>
		 <table lang="II" align="center" width="1200px" border="1">
			<tr>
				<th>STT</th>
				<th>Name</th>
				<th>Username</th>
				<th>Title</th>
				<th>Information</th>
				<th>Delete</th>
			</tr>
		</center>
<?php

		
	require("config.php");
		$sql = "select * from connect";
		$squery=mysql_query($sql);
		if (mysql_num_rows($squery)==""){
			echo "Không có phản hồi!" ;
		}
		else{
			$stt=0;
				while($row = mysql_fetch_array($squery)){
					$stt++;
					echo "<tr>";
					echo "<td>$stt</td>";
					echo "<td>" . $row['name_c'] . "</td>";
					echo "<td>" . $row['username_c'] . "</td>";
					echo "<td>" . $row['Title'] . "</td>";
                    echo "<td>" . $row['Information'] . "</td>";
					echo "<td><a href='del_user2.php' onclick='javascript:return confirmDeletecontent(".$row['id'].")'>Delete</a></td>";
				}
		}
	?>
	</table>
</body>
</html>