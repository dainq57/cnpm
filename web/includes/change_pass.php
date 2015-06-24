<?php
    if(isset($_GET['level']) && $_GET['level'] == 1){
        require("admin.php");
    }else{
        require("employee.php");
    }
?>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
	<meta name="author" content="duong" />
    <link rel="stylesheet" type="text/css" href="add_user.css" />
	<title>Thêm Nhân Viên</title>
    <script lang="javascript" src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
    <script lang="javascript" src="../js/jquery.validate.min.js" type="text/javascript"></script>
    <script lang="javascript">
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

        $(document).ready(function() {


            $("#pass_old").blur(function() {

                if($(this).val() != ''){
                    // Gán text cho class thongbao trước khi AJAX response
                    $(".nofityPassOld").html('<i style="float: right; padding-right: 90px;">Đang kiểm tra...</i>');
                }
                // Dữ liệu sẽ gởi đi
                var form_data = {action: 'change_passOld_user', pass_old: $(this).val()};

                $.ajax({
                    type: "POST",				// Phương thức gởi đi
                    url: "../includes/check_pass.php",			// File xử lý dữ liệu được gởi
                    data: form_data,			// Dữ liệu gởi đến cho url
                    success: function(result) { // Hàm chạy khi dữ liệu gởi thành công
                        $(".nofityPassOld").html(result);
                    }
                });

            });

        });

        // check password
        $(document).ready(function() {

            // Sự kiện khi focus vào pass_name
            $("#pass_new").blur(function() {

                if($(this).val() != ''){
                    // Gán text cho class thongbao trước khi AJAX response
                    $(".nofityPass").html('<i style="float: right; padding-right: 90px;">Đang kiểm tra...</i>');
                }
                // Dữ liệu sẽ gởi đi
                var form_data = {action: 'change_pass',	pass_new: $(this).val()};

                $.ajax({
                    type: "POST",				// Phương thức gởi đi
                    url: "../includes/check_pass.php",			// File xử lý dữ liệu được gởi
                    data: form_data,			// Dữ liệu gởi đến cho url
                    success: function(result) { // Hàm chạy khi dữ liệu gởi thành công
                        $(".nofityPass").html(result);
                    }
                });

            });

        });

        // check re-password
        $(document).ready(function() {

            // Sự kiện khi focus vào pass_name
            $("#repass_new").blur(function() {

                if($(this).val() != ''){
                    // Gán text cho class thongbao trước khi AJAX response
                    $(".nofityRePass").html('<i style="float: right; padding-right: 90px;">Đang kiểm tra...</i>');
                }
                // Dữ liệu sẽ gởi đi
                var form_data = {action: 'change_repass', pass_new: $("#pass_new").val(), repass_new: $(this).val()};

                $.ajax({
                    type: "POST",				// Phương thức gởi đi
                    url: "../includes/check_repass.php",			// File xử lý dữ liệu được gởi
                    data: form_data,			// Dữ liệu gởi đến cho url
                    success: function(result) { // Hàm chạy khi dữ liệu gởi thành công
                        $(".nofityRePass").html(result);
                    }
                });

            });

        });

    </script>
</head>
<body>

    <form id="wrapper" action="change_pass.php?level=<?php echo ''.$_GET['level'];?>" method="post">
        <h3>Hoàn thành đầy đủ form dưới đây</h3>
        <h4>
            <?php
                if(isset($_POST['submit_new'])){
//                    $user_new = $_POST['user_new'];
                    $pass_old = $_POST['pass_old'];
                    $pass_new = $_POST['pass_new'];$repass_new = $_POST['repass_new'];

//                    if( (strlen($user_new) >= 6 && is_numeric($user_new) && strpos($user_new, ".") === false ) || $user_new === "admin"
//                       && strlen($_POST['pass_new']) >= 6 &&  $pass_new == $repass_new){
                    if(strlen($_POST['pass_new']) >= 6 &&  $pass_new == $repass_new){
                        if($pass_old && $pass_new && $repass_new){
                            require("config.php");
                            $pp_old = sha1($pass_old);
                            $sql = "select pword from account where pword = '".$pp_old."' ";
                            $query = mysql_query($sql);
                            $pp = sha1($pass_new);
                            if(mysql_num_rows($query) != ""){
                                $sql1 ="UPDATE account SET pword = '".$pp."' where username = '".$_SESSION['username']."'";
                                mysql_query($sql1);
                                echo "<i style='color: blue'>Thay đổi mật khẩu thành công.</i>";
                            }else{
                               echo "<i style='color: red; padding-right: 20px;'>Lỗi thay đổi mật khẩu.</i>";
                            }
                          }
                        }else{
                            echo "<i style='color: red; padding-right: 20px;'>Lỗi thay đổi mật khẩu.</i>";
                        }
                    }
            ?>
        </h4>
<!--        <label for="Tài Khoản <font color=red >*</font>" >Tài Khoản <font color=red >*</font>: </label><input id="user_new" class="table" type="text" name="user_new" required size="35px"/>-->
        <br><br><div class="nofityUser" ></div><br>
        <label for="Mật Khẩu <font color=red >*</font>" >Mật Khẩu Cũ <font color=red >*</font>:</label><input id="pass_old" class="table" type="password" name="pass_old" required size="35px" /><br /><br />
        <div class="nofityPassOld" ></div><br>
        <label for="Mật Khẩu <font color=red >*</font>" >Mật Khẩu Mới <font color=red >*</font>:</label><input id="pass_new" class="table" type="password" name="pass_new" required size="35px" /><br /><br />
        <div class="nofityPass" ></div><br>
        <label for="Lại-Mật Khẩu <font color=red >*</font>" >Lại-Mật Khẩu Mới <font color=red >*</font>: </label><input id="repass_new" class="table" type="password" name="repass_new" required size="35px" /><br /><br />
        <div class="nofityRePass" ></div>
        <input class="add_user" type="submit" name="submit_new"  value="Hoàn Thành" />
    </form>

</body>
</html>