<!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
	<meta name="author" content="duong" />
    <link rel="stylesheet" type="text/css" href="add_user.css" />
	<title>Thêm Nhân Viên</title>
    <script lang="javascript" src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
    <script lang="javascript" src="../js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="../js/checkInfo.js"></script>
</head>
<body>
    <?php
        require("admin.php");
    ?>
    <form id="wrapper" action="add_user.php" method="post">
        <h3>Hoàn thành đầy đủ form dưới đây</h3>
        <h4>       <?php
                if(isset($_POST['submit_new'])){
                    $email_new = $_POST['email_new'];$name = $_POST['name_new'];$user_new = $_POST['user_new'];
                    $pass_new = $_POST['pass_new'];$repass_new = $_POST['repass_new'];$level = $_POST['level'];

                    if(strpos($email_new, "@") !== false && (strpos($email_new, ".com") !== false || strpos($email_new, ".vn") !== false)
                       && strlen($user_new) >= 6 && is_numeric($user_new) && strpos($user_new, ".") === false
                       && strlen($_POST['pass_new']) >= 6 &&  $pass_new == $repass_new){

                        if($email_new && $name && $user_new && $pass_new && $repass_new && $level){
                            require("config.php");
                            $sql = "select email, username from account where email = '".$email_new."' or username = '".$user_new."' ";
                            $query = mysql_query($sql);
                            $pp = sha1($pass_new);
                            if(mysql_num_rows($query) != ""){
                                $row = mysql_fetch_assoc($query);
                                echo "<ul>";
                                if($email_new == $row['email']){
                                    echo "<li><i style='color: red'>Email này đã tồn tại.</i></li>";
                                }
                                if($user_new == $row['username']){
                                    echo "<li><i style='color: red'>Tài khoản này đã tồn tại.</i></li>";
                                }
                                echo "</ul>";
                            }else{
                                $sql1 ="insert into account(name, username, pword, email, level) values ('".$name."', '".$user_new."', '".$pp."', 
								'".$email_new."', '".$level."')";
                                $query1 = mysql_query($sql1);
                                $sql2 = "insert into cocauluong(username, name, luongcb, phucap, cquydinh, cthucte) values ('".$user_new."', '".$name."', 0, 0 , 0 , 0) ";
                                $query2 = mysql_query($sql2);
                                echo "<i style='color: blue'>Đã thêm nhân viên mới thành công.</i>";
                            }
                        }
                    }else{
                        echo "<i style='color: blue; padding-right: 20px;'>Thêm nhân viên mới không thành công.</i>";
                    }
                }
            ?>
        </h4>
        <br><label for="Cấp Độ" >Cấp Độ: </label>
        <select  class="select" name="level" style="background-color: #FDFFDE; padding:10px 15px 5px 10px;" >
            <option value="2">Member</option>
            <option value="1">Admin</option>
        </select><br /><br />
        <label for="Email <font color=red >*</font>" >Email <font color=red >*</font>: </label><input id="email_new" class="table" type="text" name="email_new" required size="35px"/>
        <br><br><div class="nofityEmail" ></div><br>
        <label for="Họ Tên <font color=red >*</font>" >Họ Tên <font color=red >*</font>: </label><input id="name_new" class="table" type="text" name="name_new" required size="35px"/><br /><br />
        <label for="Tài Khoản <font color=red >*</font>" >Tài Khoản <font color=red >*</font>: </label><input id="user_new" class="table" type="text" name="user_new" required size="35px"/>
        <br><br><div class="nofityUser" ></div><br>
        <label for="Mật Khẩu <font color=red >*</font>" >Mật Khẩu <font color=red >*</font>:</label><input id="pass_new" class="table" type="password" name="pass_new" required size="35px" /><br /><br />
        <div class="nofityPass" ></div><br>
        <label for="Lại-Mật Khẩu <font color=red >*</font>" >Lại-Mật Khẩu <font color=red >*</font>: </label><input id="repass_new" class="table" type="password" name="repass_new" required size="35px" /><br /><br />
        <div class="nofityRePass" ></div>
        <input class="add_user" type="submit" name="submit_new" style="" value="Hoàn Thành" />
    </form>

</body>
</html>