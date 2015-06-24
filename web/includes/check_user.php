<?php
    $check_user = $_POST['action'];
    $user_new = $_POST['user_new'];
    if($user_new === "admin" || strlen($user_new) >= 6){

        if( (($check_user === "check_user" || $check_user === "change_pass_user") && is_numeric($user_new) && strpos($user_new, ".") === false) || $user_new === "admin"){
//            echo "".$user_new."<br>";
            checkUser($user_new, $check_user);
        }else{
            if($_POST['user_new'] != "")
                echo "<i style='float: right;center;color: red;'>Tài khoản là số, không ký tự đặc biệt.</i>";
        }
    }else{
        if($_POST['user_new'] != "" && $user_new !== "admin")
            echo "<i style='float: right;center;color: red;padding-right: 10px;'>Tài khoản tối thiểu phải có 6 ký tự.</i>";
    }

    function checkUser($user, $check_user){
        require("config.php");
        $sql = "SELECT username from account where username = '".$user."' ";
        $query = mysql_query($sql);
        if(mysql_num_rows($query) != ""){
            if($check_user === "check_user"){
                echo "<i style='float: right;center;color: red;padding-right: 30px;'>Tài khoản: <strong>$user</strong> đã tồn tại.</i>";
            }
            /*else if($check_user === "change_pass_user"){
                echo "<i style='float: right;center;color: red;padding-right: 40px;'>Tài khoản: <strong>$user</strong> đúng.</i>";
            }*/
        }else{
            if($_POST['user_new'] === "check_user"){
                echo "<i style='float: right;center;color: red;padding-right: 30px;'>Bạn có thể dùng tài khoản này.</i>";
            }else if($check_user === "change_pass_user"){
                echo "<i style='float: right;center;color: red;padding-right: 40px;'>Tài khoản: <strong>$user</strong> sai.</i>";
            }
        }
        mysql_close();
    }