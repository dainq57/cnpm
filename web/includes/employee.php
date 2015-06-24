<?php session_start();
?>
<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
	<meta name="author" content="a4dse" />
    <link rel="stylesheet" type="text/css" href="admin.css" />

	<title>Trang chủ</title>
</head>
<style>
    /*body{
        background-color: #0bf7e9;
    }*/
</style>
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
            <li><a href="user_structure.php" >Trang chủ</a></li>
            <li><a href="#" >Nhân Sự </a>
                <ul id="nSu" >
            <li><a href="profile_user.php" >Cập nhật hồ sơ</a></li>
            <li><a href="change_pass.php" >Đổi mật khẩu</a></li>
                </ul>
            </li>
            <li><a href="#" >Tài Chính </a>
		<ul id="tChinh" >
		    <li><a href="cocauluong_nhanvien.php" >Cơ Cấu Lương</a></li>
		    <!--<li><a href="#" >Bảng Chấm Công</a></li>-->
		    <li><a href="khenthuong_nhanvien.php" >Khen Thưởng</a></li>
		</ul>
	    </li>
            <li><a href="Connected.php" >Liên Hệ </a></li>
	    <li><a href="logout.php">Thoát</a></li>
        </ul>
    </div>
	<!--<div id="content">
        <h2> Tin Hoạt Động </h2>
			<?php
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
							echo "<a href='read.php?thread=$row[id]'>$row[subject]</a><BR>";
					}
				}
			?>	
	</div>-->
</body>
</html>

