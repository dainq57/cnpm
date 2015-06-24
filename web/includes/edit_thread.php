<?php session_start(); 
?>
<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
	<meta name="author" content="a4dse" />
    <link rel="stylesheet" type="text/css" href="admin.css" />

	<title>Quản lí nhân viên</title>
</head>
<body>
    <div id="wrapper1">
        <h1>PORTAL NHÂN VIÊN</h1>
        <b class="logout">
            <font color="black" >
                 <p><?php
                    if(isset($_SESSION['name'])){
                        echo "<br/>Welcome ".$_SESSION['name'];
                    }else{
                        header('location: index.php');
                    }
                ?></p>
            </font>
        </b>
    </div>
    
    <div id="wrapper2">
        <ul id="menu">
            <li><a href="admin.php" >Trang Chủ </a></li>
            <li><a href="#" >Nhân Sự </a>
                <ul id="nSu" >
                    <li><a href="list_user.php" >Danh Sách Nhân Viên </a></li>
                    <li><a href="add_user.php" >Thêm Nhân Viên </a></li>
					<li><a href="#" >Đã Nghỉ Việc</a></li>
					<li><a href="#" >Cơ Cấu Tổ Chức</a></li>
                </ul>
            </li>
            <li><a href="#" >Tài Chính </a>
				<ul id="tChinh" >
					<li><a href="#" >Cơ Cấu Lương</a></li>
					<li><a href="#" >Bảng Chấm Công</a></li>
					<li><a href="#" >Khen Thưởng</a></li>
				</ul>
			</li>
			<li><a href="#">Tin tức</a>
				<ul id="news">
					<li><a href="create_thread.php">Đăng bài mới</a></li>
					<li><a href="edit_thread.php">Sửa bài viết</a></li>
				</ul>
			</li>
            <li><a href="#" >Liên Hệ </a></li>
			<li><a href="logout.php">Thoát</a></li>
        </ul>
        <form action="search_user.php" method="post">
            <input class="searchBox" type="text" placeholder="type to search" name="info_search" />
            <input class="submit" type="submit" value="Tìm kiếm" name="submit_search"/>
        </form>
    </div>
	<BR>
	<?php
		echo "<h2>Chọn bài viết để sửa</h2>";
		$conn = mysql_connect("localhost", "root", "") or die("Can't connect to database");
		mysql_select_db("employee", $conn);
		mysql_query("set names 'utf8'");
		$sql="select * from `news` LIMIT 0,10";
		$query=mysql_query($sql,$conn);
		if(mysql_num_rows($query) == "")
		{
			echo "<tr><td colspan='5' align='center'>Chưa có tin tức</td></tr>";
		}
		else
		{
			while($row=mysql_fetch_array($query))
			{
				echo "<a href='edit_thread.php?thread=$row[id]'>$row[subject]</a><BR>";
			}
		}
		if(isset($_GET['thread']))
		{
			echo "<form action='' method='POST'>";
				echo '<center>';
				echo '<textarea name="subject" cols="120" rows="2" placeholder="subject"></textarea><BR>';
				echo '<textarea name="content" cols="120" rows="10" placeholder="content"></textarea><BR>';
				echo '<input type="submit" name="update_thread" value="Sửa bài"><input type="reset">';
				echo '</center>';
			echo "</form>";
		}
	?>
	<?php
		$time=date("Y-m-d h:i:sa");
		if(isset($_POST['update_thread']))
		{
			include("config.php");
			$sql="UPDATE `news` SET `subject`='$_POST[subject]',`content`='$_POST[content]',`author`='$_SESSION[username]',`date`='$time' WHERE id='$_GET[thread]'";
			mysql_query($sql);
			header("location:edit_thread.php");
		}
	?>
	
	</form>
</body>
</html>

