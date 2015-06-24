<?php
    if(isset($_POST['action']) && ($_POST['action'] === "check_pass" || $_POST['action'] === "change_pass")){
        if(strlen($_POST['pass_new']) < 6 && strlen($_POST['pass_new']) > 0){
            echo "<i style='float: right;center;color: red;padding-right: 10px;'>Mật khẩu tối thiểu phải có 6 ký tự.</i>";
        }else{
            if(!checkChar($_POST['pass_new']))
                echo "<i style='float: right;center;color: red;'>Mật khẩu không được chứa ký tự đặc biệt.</i>";
        }
    }else if($_POST['action'] === "change_passOld_user"){
        $pass_old = $_POST['pass_old'];
        $pp = sha1($pass_old);
        require("config.php");
        $sql = "SELECT pword from account where pword = '".$pp."' ";
        $query = mysql_query($sql);
        if(mysql_num_rows($query) == ""){
            echo "<i style='float: right;center;color: red;padding-right: 50px;'>Mật khẩu cũ không đúng.</i>";
        }
        mysql_close();
    }
    function checkChar($str){
        $specialChar="~`!@#$%^&*()-+=|\{}[]:;><,.?/".'"';
        for ($i=0; $i<strlen($specialChar); $i++)
            if (strpos($str, $specialChar[$i]) !== false)
                return false;
        return true;
    }