<?php
    require("config.php");
    $sql = "select * from profile where id = '".$_GET['userid']."' ";
    $query = mysql_query($sql);
    if(mysql_num_rows($query) != ""){
        $dl = mysql_fetch_assoc($query);
    }
?>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="duong" charset="utf-8" />

	<title>Cập Nhật Hình Ảnh</title>
 
</head>

<body>
    <?php
      $check = "";
      if(isset($_POST['submit'])){ // Người dùng đã ấn submit
        if($_FILES['file']['name'] == ""){
            echo "<font color = red>File chưa được chọn.</font>";
        }else{
            // Tiến hành code upload file
            if($_FILES['file']['type'] == "image/jpeg"
                || $_FILES['file']['type'] == "image/png"
                || $_FILES['file']['type'] == "image/gif"){
                // là file ảnh
                // Tiến hành code upload
                if($_FILES['file']['size'] > 1048576){
                    echo "File không được lớn hơn 1mb";
                }else{
                    // Kiểm tra ảnh, nếu đã có ảnh rồi thì xóa nó đi
                    if(isset($dl) && $dl['avatar'] != ""){
                        unlink($dl['avatar']);
                    }
                    // file hợp lệ, tiến hành upload
                    $name = $_FILES['file']['name'];
                    $path = "../avatar/" . $name; // file sẽ lưu vào thư mục data
                    $tmp_name = $_FILES['file']['tmp_name'];
                    $type = $_FILES['file']['type'];
                    $size = $_FILES['file']['size'];
                    // Upload file
                    move_uploaded_file($tmp_name,$path);

                    if(mysql_num_rows($query) == ""){
                        $str = "INSERT into profile values ('".$_GET['userid']."', '".$_GET['username']."', '', '".$path."', '', '', ''
                                                , '', '', '', '', '', '', ''
                                                , '', '', '', ''
                                                , '', '', '', '' )";
                    }else{
                        $str = "UPDATE profile SET avatar = '".$path."' where id = '".$_GET['userid']."' ";
                    }
                    mysql_query($str);
                    $check = "ok";

                }
            }else{
                // không phải file ảnh
                echo "<font color = red>Kiểu file không hợp lệ.</font>";
            }
        }
      }
    ?> 
    
    <h2 style="text-align: center;"><font color="blue">Cập nhật ảnh sinh viên</font></h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file" />
        <input type="text" name="true" value="OK" hidden="hidden" />
        <input type="submit" name="submit" value="Up" />
    </form>
    <br /><a style="text-align: center;"><i>Lưu ý: File ảnh không được quá 1MB</i></a>
    <script>
        var str = "<?php echo "" .$check; ?>";
        document.write(str);
        if(str != ""){
            window.opener.location.reload();
            window.close();
            
        }
    </script>
</body>
</html>