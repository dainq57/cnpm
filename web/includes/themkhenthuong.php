<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
	<meta name="author" content="duong" />
    <link rel="stylesheet" type="text/css" href="add_user.css" />
	<title>Khen Thuong Nhân Viên</title>
	<script lang="javascript" src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
    <script lang="javascript" src="../js/jquery.validate.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {


            $("#user_new").blur(function() {

                if($(this).val() != ''){
                    // Gán text cho class thongbao trước khi AJAX response
                    $(".nofityUser").html('<i style="float: right; padding-right: 90px;">Đang kiểm tra...</i>');
                }
                // Dữ liệu sẽ gởi đi
                var form_data = {action: 'change_pass_user', user_new: $(this).val()};

                $.ajax({
                    type: "POST",				// Phương thức gởi đi
                    url: "../includes/check_user.php",			// File xử lý dữ liệu được gởi
                    data: form_data,			// Dữ liệu gởi đến cho url
                    success: function(result) { // Hàm chạy khi dữ liệu gởi thành công
                        $(".nofityUser").html(result);
                    }
                });

            });

        });
	</script>
</head>

    <style>
     
    </style>
<body>
    <?php
        require("admin.php");
    ?>
    <form id="wrapper" action="themkhenthuong.php" method="post" autocomplete="on">
        <h3>Hoàn thành đầy đủ form dưới đây</h3>
        <h4>    
		<?php
                if(isset($_POST['submit_new'])){
                    $u = $t = $l =" ";
                    echo "<ul>";
                    if($_POST['username'] == NULL)
                        echo "<li><i><font color=blue>Mã nhân viên </font></i></li>";
                    else
                        $u = $_POST['username'];
                    if($_POST['thuong'] == NULL)
                        echo "<li><i><font color=blue>Tiền thưởng</font></i></li>";
                    else
                        $t = $_POST['thuong'];
                    if($_POST['lydo'] == NULL)
                        echo "<li><i><font color=blue>Lý do </font></i></li>";
					else 
						$l = $_POST['lydo'];
                    echo "</ul>";
                    if($u && $t && $l){
                        if(strlen($u) >= 6 && is_numeric($u) && strpos($u, ".") === false && is_numeric($t)){
                            require("config.php");
                            $sql1 ="insert into khenthuong(username,thuong,lydo) values ('".$u."', '".$t."', '".$l."') ";
                            $query1 = mysql_query($sql1);
                            echo "<i style='margin: 0 0 0 65px;'><font color = blue >Thành công.</font></i>";
                            header("location: khenthuong.php");
                        }else{
                            echo "<i style='margin: 0 0 0 60px;'><font color = red >Vui lòng nhập lại.</font></i>";
                        }
                    }
                }
            ?>
        </h4><br>
        <label for="Tài Khoản <font color=red >*</font>" >Tài Khoản <font color=red >*</font>: </label><input id="user_new" class="table" type="text" name="username" required size="35px"/><br />
		<div class="nofityUser" ></div><br>
        <br><label for="Khen Thưởng " >Khen Thưởng <font color=red ></font>:</label><input class="table" name="thuong" required size="35px" /><br /><br />
        <br><label for="Lý Do <font color=red >*</font>" >Lý Do <font color=red ></font>: </label><textarea class="table-lydo" name="lydo" required size="70px" /></textarea><br /><br />
        <input class="add_user" type="submit" name="submit_new" value="Hoàn Thành" />
    </form>
</body>
</html>