<?php
if(!isset($_SESSION)){
    session_start();
}
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
        <h1>QUẢN TRỊ VIÊN</h1>
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
            <li><a href="ad_structure.php" >Trang chủ</a></li>
            <li><a href="#" >Nhân Sự </a>
                <ul id="nSu" >
                    <li><a href="list_user.php" >Danh Sách Nhân Viên </a></li>
                    <li><a href="add_user.php" >Thêm Nhân Viên </a></li>
		            <li><a href="end_user.php" >Đã Nghỉ Việc</a></li>		            
                    <li><a href="export_xls.php" >Export</a></li>
                </ul>
            </li>
            <li><a href="#" >Tài Chính </a>
		<ul id="tChinh" >
		    <li><a href="cocauluong.php" >Cơ Cấu Lương</a></li>
<!--		    <li><a href="#" >Bảng Chấm Công</a></li>-->
		    <li><a href="khenthuong.php" >Khen Thưởng</a></li>
		</ul>
	    </li>
            <li><a href="Connected2.php" >Liên Hệ </a></li>
	    <li><a href="logout.php">Thoát</a></li>
        </ul>
        <form action="search_user.php" method="post">
            <input class="searchBox" type="text" placeholder="Mã nhân viên hoặc họ tên nhân viên" name="info_search" />
            <input class="submit" type="submit" value="Tìm kiếm" name="submit_search"/>
        </form>
    </div>

</body>
</html>

