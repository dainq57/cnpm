<?php
    // load library
    require 'php-excel.class.php';

    //Ket noi CSDL
    require("config.php");
    //lay du lieu tu bang "account"
    $sql = "SELECT * FROM account ORDER BY username ASC";
    $result = mysql_query($sql);

    //Khai bao bien mang, gan tieu de
    $data = array(array('STT', 'Họ và Tên', 'Tài Khoản', 'Email')); //Them tiep neu muon lay nhieu cot hon nua
    $i = 1;
    while ( $row = mysql_fetch_array($result) )
    {
        //lay gia tri tu csdl gan cho mang
        $data[] = array ($i, $row['name'], $row['username'] . "", $row['email']); //Them tiep neu muon lay nhieu cot hon nua
        $i++;
    }

    // generate file (constructor parameters are optional)
    $xls = new Excel_XML('UTF-8', false, 'Sheet 1');
    $xls->addArray($data);
    $xls->generateXML('ds_account');