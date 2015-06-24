<?php
    $check_email = $_POST['action'];
    if(isset($_POST['email_new']) && $check_email == "check_email"){
        $email_new = $_POST['email_new'];

        if(strpos($email_new, "@") !== false && (strpos($email_new, ".com") !== false || strpos($email_new, ".vn") !== false) ){
            checkEmail($email_new);
        }else{
            if($email_new !== "")
                echo "<i style='float: right;center;color: red;padding-right: 80px;'>Email không hợp lệ.</i>";
        }
    }

    function checkEmail($email){
        require("config.php");
        $sql = "SELECT email from account where email = '".$email."' ";
        $query = mysql_query($sql);
        if(mysql_num_rows($query) != ""){
            echo "<i style='float: right;center;color: red;'>Email <strong>$email</strong> đã tồn tại.</i>";
        }else{
            if($_POST['email_new'] != "")
                echo "<i style='float: right;center;color: red;padding-right: 30px;'>Bạn có thể dùng email này.</i>";
        }
        mysql_close();
    }