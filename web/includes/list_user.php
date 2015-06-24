<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
	<meta name="a  uthor" content="duong" />
    <script src="../js/jquery.confirmDelete.js"></script>
    <script src="../js/jquery.confirmReset.js"></script>
	<title>DANH SÁCH NHÂN VIÊN</title>

</head>
    <style>
		#nhan h1{
			margin: 20px 320px;
			text-align: center;
		}
        table{background-color: #CFE9FF;margin: 0 auto;margin-top: 40px;}
        table, th, td {border:1px solid black;border-collapse:collapse;text-align: center;}
        ul.page{margin: 15px 480px;}
        ul.page li { display: inline; float: left;margin: 0px 2px;background: #8AB1FE;}
        ul.page li a {color: white;text-decoration: none;display: block; padding: 3px 8px;}
        ul.page li:hover {background: #3A7ABE;}
        ul.page li.current {font-weight: bold; padding: 3px 8px; }
    </style>
    
<html>
<body>
    <?php
        require("admin.php");
        // Xác định bao nhiêu dòng xuất hiện

        if(isset($_POST['submit'])){
            $display = $_POST['radio'];
        }else{
            $display = 15;
        }
    ?>
    
	<div id = "nhan">
		<h1>Danh Sách Nhân Viên</h1>
	</div>
    <table lang="VI" align="center" width="1200px" border="1">
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>Level</th>
            <th>ResetPassword</th>
            <th>Delete</th>
            <th>Profile</th>
        </tr>
        <?php


            // Tính tổng số trang cần hiện thị
            if(isset($_GET['page']) && (int) $_GET['page']){
                $page = $_GET['page'];
            }else{// nếu chưa xác định thì tìm số trang
                require("config.php");
                $numSql = "SELECT COUNT(id) FROM account";
                $numQuery = mysql_query($numSql);
                $numRow = mysql_fetch_array($numQuery);
                $record = $numRow[0];
                // Tổng sô dòng trong databale lớn hơn tổng số hàng cần hiện trong 1 trang
                if($record > $display){
                    $page = ceil($record/$display);
                }else{
                    $page = 1;
                }
            }

            if(isset($_GET['start']) && (int) $_GET['start']){
                $start = $_GET['start'];
            }else{
                $start = 0;
            }
            $stt = $start;
            require("config.php");
            $sql = "select * from account order by username ASC LIMIT $start, $display";
            $query = mysql_query($sql);
            if(mysql_num_rows($query) == ""){
                echo "Dữ liệu rỗng";
            }else{
                while($row = mysql_fetch_array($query)){
                    $stt++;
                    echo "<tr>";
                    echo "<td>$stt</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['pword'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    if($row['level'] == 1){
                        echo "<td>Admin</td>";
                        echo "<td colspan='2'><a href='change_pass.php?level=$row[level]'>Change pass</a></td>";
                        echo "<td><a href='profile_admin.php?userid=$row[id]'>Profile</a></td>";
                    }
                    else if($row['level'] == 2){
                        echo "<td>Member</td>";
                        echo "<td><a href='reset_user.php' onclick='javascript:return confirmReset(".$row['id'].")'>reset</a></td>";
                        echo "<td><a href='del_user.php' onclick='javascript:return confirmDelete(".$row['id'].")'>Delete</a></td>";
                        echo "<td><a href='profile_admin.php?userid=$row[id]'>Profile</a></td>";
                    }
                    echo "</tr>";
                }
            }
        ?>
        
    </table>
    <ul class="page">
        <?php
        if($page > 1){
            $next = $start + $display;
            $prev = $start - $display;
            $current = $start/$display + 1;

            // TH: Lấy giá trị minIndex, maxIndex chỉ in ra số thứ tựu của 5 trang
            if($current + 2 > $page){
                $maxIndex = $page;
            }else{
                $maxIndex = $current + 2;
            }
            if($current - 2 < 1){
                $minIndex = 1;
            }else{
                $minIndex = $current - 2;
            }

            $j=1;
            if(isset($_GET['index'])){
                $j = $_GET['index'];
                echo "<li><a>Trang[".$j."/".$page."]</a></li>";
            }else{
                echo "<li><a>Trang[1/".$page."]</a></li>";
            }

            if($current != 1){
                echo "<li><a href='list_user.php?start=$prev&page=$page&index=".($j-1)."'>Previous</a></li>";
            }

            for($i=$minIndex; $i<=$maxIndex; $i++)
                if($current != $i){
                    echo "<li><a href='list_user.php?start=".$display*($i-1)."&page=$page&index=$i'>$i</a></li>";
                }else{
                    echo "<li class='current' >$i</li>";
                }

            if($current != $page){
                echo "<li><a href='list_user.php?start=$next&page=$page&index=".($j+1)."'>Next</a></li>";
            }
        }
        ?>
    </ul>
</body>
</html>