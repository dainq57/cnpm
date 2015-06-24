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
	<form action="" method="POST">
	<center>
		<textarea name="subject" cols="120" rows="2" placeholder="subject"></textarea><BR>
		<textarea name="content" cols="120" rows="10" placeholder="content"></textarea><BR>
		<input type="submit" name="create_thread" value="Tạo bài">
		<input type="reset">
	</center>
	<?php
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$time=date("Y-m-d h:i:sa");
		if(isset($_POST['create_thread']))
		{
			include("config.php");
			$sql="INSERT INTO `news` (`subject`,`content`,`author`,`date`) VALUES ('$_POST[subject]','$_POST[content]','$_SESSION[username]','$time')";
			mysql_query($sql);
		}
	?>
	
	</form>
</body>
</html>

