<?php 
    session_start();
    //if(isset($_SESSION['username'])){
      //  header('location: includes/admin.php'); 
    //}
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
                    if(isset($_SESSION['username'])){
                        echo "<br/>Welcome ".$_SESSION['username'];
                    }else{
                        header('location: index.php');
                    }
                ?></p>
            </font>
        </b>
    </div>
    
    <div id="wrapper2">
        <ul id="menu">
            <li><a href="employee.php" >Trang Chủ </a></li>
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
		<div id="content2">
		<div id="boxpost">
		<?php
			$conn = mysql_connect("localhost", "root", "") or die("Can't connect to database");
			mysql_select_db("employee", $conn);
			mysql_query("set names 'utf8'");
			$sql="select * from `news` WHERE `id`='$_GET[thread]'";
			$query=mysql_query($sql,$conn);
			$row=mysql_fetch_array($query);
			echo "<span id='date' style='float:right'><strong>$row[date]</strong></span><BR>";
			echo "<a href='read.php?thread=$row[id]'><h2>$row[subject]</h2></a><BR>";
			echo "$row[content]";
		?>
		</div>
		</div>
    </div>

</body>
</html>

