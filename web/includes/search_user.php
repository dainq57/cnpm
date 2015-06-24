<?php
    function convert_vi_to_en($str) {
          $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
          $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
          $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
          $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
          $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
          $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
          $str = preg_replace("/(đ)/", 'd', $str);
          $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
          $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
          $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
          $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
          $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
          $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
          $str = preg_replace("/(Đ)/", 'D', $str);
          return $str;
    }
?>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
	<meta name="author" content="duong" />

	<title>Tìm Kiếm</title>
</head>
<style>
    table{background-color: #CFE9FF;margin: 0 auto;margin-top: 40px;}
    table, th, td {border:1px solid black;border-collapse:collapse;text-align: center;}
    ul.page{margin: 15px 480px;}
    ul.page li { display: inline; float: left;margin: 0px 2px;background: #8AB1FE;}
    ul.page li a {color: white;text-decoration: none;display: block; padding: 3px 8px;}
    ul.page li:hover {background: #3A7ABE;}
    ul.page li.current {font-weight: bold; padding: 3px 8px; }
</style>
<body>
    <?php
        require("admin.php");
    ?>
    <table align="center" width="1200px" border="1">
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Password</th>
            <th>Email</th>
            <th>Level</th>
            <th>Reset</th>
            <th>Delete</th>
            <th>Profile</th>
        </tr>
        <?php
            if(isset($_POST['submit_search'])){
                $key = $_POST['info_search'];
                $key = trim($key);
                // convert thành chuỗi gồm tất cả các ký tự thường
                $key = mb_convert_case($key, MB_CASE_LOWER, "UTF-8");
                // convert thành chuỗi không dấu
                $key = convert_vi_to_en($key);
                require("config.php");
                // lấy tất cả dữ liệu, lấy theo chiều sắp xếp tăng dần của username
                $sql = "select * from account order by username ASC";
                $query = mysql_query($sql);
                if(mysql_num_rows($query) != ""){
                    $check = 0;
                    while($row = mysql_fetch_array($query)){
                        // convert thành chuỗi gồm tất cả các ký tự thường
                        $value1 = mb_convert_case($row['username'], MB_CASE_LOWER, "UTF-8");
                        $value2 = mb_convert_case($row['name'], MB_CASE_LOWER, "UTF-8");
                        // convert row['name'] thành chuỗi không dấu
                        $value2 = convert_vi_to_en($value2);
                        if($key !== "" && (strpos($value1, $key) !== false || strpos($value2, $key) !== false) ){
                            $check = 1;
                            echo "<tr>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $row['pword'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            if($row['level'] == 1){
                                echo "<td>Admin</td>";
                                echo "<td colspan='2'><a href='change_pass.php?level=$row[level]'>Change pass</a></td>";
                                echo "<td ><a href='profile_admin.php?userid=$row[id]'>Profile</a></td>";
                            }else if($row['level'] == 2){
                                echo "<td>Member</td>";
                                echo "<td><a href='reset_user.php?userid=$row[id]'>reset</a></td>";
                                echo "<td><a href='del_user.php?userid=$row[id]'>Delete</a></td>";
                                echo "<td><a href='profile_admin.php?userid=$row[id]'>Profile</a></td>";
                            }
                            echo "</tr>";
                        }
                    }
                    if($check == 0){
                        echo "Không có nhân viên <strong>$key</strong> trong danh sách.";
                    }
                }
            }
        ?>
    </table>

</body>
</html>