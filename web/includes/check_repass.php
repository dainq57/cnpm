<?php
    if($_POST['action'] == "check_repass" || $_POST['action'] == "change_repass"){
        $pass_new = $_POST['pass_new'];
        $repass_new = $_POST['repass_new'];
        if($repass_new !== "" && $pass_new != $repass_new){
            echo "<i style='float: right;center;color: red;padding-right: 20px;'>Mật khẩu xác nhận không đúng.</i>";
        }
    }