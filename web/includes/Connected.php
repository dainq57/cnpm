<?php
	require("config.php");
	if(isset($_GET['username'])){
		$sql = "select * from profile where username = '".$_SESSION['username']."' ";
		$query = mysql_query($sql);
		if(mysql_num_rows($query) != "")
        $dl = mysql_fetch_assoc($query);
		mysql_close();
	}
    
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html" charset="utf-8">
<meta name="author" content="a4dse">
	<title>Liên Hệ</title>
	<link rel="stylesheet" type="text/css" href="connected.css" />
	 <script src="../js/jquery.confirmDeletecontent.js"></script>
<title>Liên Hệ </title>

</head>

<body>
	<?php
	require("employee.php");
	?>

	<div id="wrapper6">
	<center>
	<form action ="Connected.php" method=post>
		<label> NAME<br/>
		<label for="Name"><font color=red ></font></label><input class="highlight" type="text" size="50px" 
		value="<?php echo "".$_SESSION['name']; ?>" readonly=""/><br />
		</label>
		<label> USERNAME<br/>
		<label for="Name"><font color=red ></font></label><input class="highlight" type="text" size="50px" 
		value="<?php echo "".$_SESSION['username']; ?>" readonly=""/><br />
		</label>
		<label> TITLE<br/>
		<input type ="text" name="txtTitle" id="txtTitle" placeholder="Enter title.." require size="50"><br/>
		</label>
		<label>CONTENT<br/>
		<textarea name="txtContent" name="txtContent" placeholder ="Enter Content..." cols="50" rows="12" ></textarea><br/>
		<label/>
		<label>
		<br/><br/>
		<input type ="submit" name="submit" id="submit" value="Gửi yêu cầu" style="background-color: #FFFFF; padding:10px 15px 5px 10px;">
		<label/>
	</form>
	</center>
	
	<?php
	if (isset($_POST['submit'])){
		$title=$_POST['txtTitle'];
		$information=$_POST['txtContent'];
		$name=$_SESSION['name'];
		$username=$_SESSION['username'];
		if (($_POST['txtTitle'] == "") && ($_POST['txtContent'] == "")){
				echo "Để không mất quyền lợi, vui lòng nhập đầy đủ thông tin của ban!! ";
		}
		else{
			require ("config.php");	
			$sql1 ="insert into connect(Title,Information,name_c,username_c) values ('".$title."', '".$information."','".$name."','".$username."')";
			$query = mysql_query($sql1);
			header ("location : del_user2.php");
			echo "Đã Gửi Yêu Cầu!" ;
			}
		}
	
	?>
	</div>
	<div id= "wrapper5">
		<h4>GỬI YÊU CẦU, PHẢN HỒI CỦA BẠN ĐỂ TRÁNH MẤT QUYỀN LỢI</h4>
			<ul></br> <i>Chỉ gửi những yêu cầu sau không gửi những yêu cầu có mục đích không rõ ràng </i><br/><br/>
					<ul>
						<li> Sai lương,cơ cấu lương</li>
						<li> Hỏi về thông tin trên bảng tin</li>
						<li> Góp ý tưởng</li>
						<li> Lỗi phần mềm và các vấn đề khác</li>
					</ul>
			</ul>
			<div class="picture3">
			</div>
	</div>
</body>
</html>