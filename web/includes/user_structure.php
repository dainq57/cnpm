<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
	<meta name="a  uthor" content="dai" />
	<link rel="stylesheet" type="text/css" href="structure.css" />
	<title>Cơ Cấu Tổ Chức</title>
    
</head>
  
<html>
<body>
    <?php
        require("employee.php")
    ?>
	<div id="box">
		<div id="box-left">
			<ul id="menu">
				<li><a href = "user_structure.php"><b>CƠ CẤU TỔ CHỨC</b></a></li>
				<li><a href = "user_hoiDong.php">Hội đồng thành viên</a></li>
				<li><a href = "user_banGD.php">Ban giám đốc</a></li>
				<li><a href = "user_phongBan.php">Phòng kinh doanh</a></li>
				<li><a href = "user_phongBan.php">Tổ chức hành chính</a></li>
				<li><a href = "user_phongBan.php">Kế toán</a></li>
				<li><a href = "user_phongBan.php">Kỹ thuật</a></li>
			</ul>
		</div>
		<div id="box-right">
			<div id="node">
				<ul id="title">
					<li><b><u>I. SƠ ĐỒ TỔ CHỨC</b></u></li>
				</ul>
			</div>
			<div id="images"></div>
			<div id="produce">
				<ul id = "title">
					<li><b><u> II. CƠ CẤU</u></b></li>
						<ul id="list">
							<li id=>1. Hội đồng thành viên</li>
							<li id=>2. Ban giám đốc</li>
							<li id=>3. Phòng kinh doanh</li>
							<li id=>4. Tổ chức hành chính</li>
							<li id=>5. Kế toán</li>
							<li id=>6. Kỹ thuật</li>							
						</ul>
				</ul>
			</div>
		</div>
		<div id="footer">
			<ul id="title">
				<li>Developed by A4DSE, 2014, Unversity of Techology and Engineering , 
				E3 144 Xuân Thủy - Cầu Giấy - Hà Nội,
				Email: a4dse1994@gmail.com</li>
			</ul>
		</div>
	</div>
</body>
</html>