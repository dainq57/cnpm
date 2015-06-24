<?php
    require("config.php");
    if(isset($_GET['a']) && $_GET['a'] == 1){
        require("admin.php");
    }else{
        require("employee.php");
    }
    $sql = "select * from profile where username = '".$_SESSION['username']."' ";
    $query = mysql_query($sql);
    if(mysql_num_rows($query) != ""){
        $dl = mysql_fetch_assoc($query);
    }
        
?>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
	<meta name="author" content="duong" />
    <link rel="stylesheet" type="text/css" href="profile.css" />
    <script src="../js/image_popup.js"></script>
	<title>Thông Tin Cá Nhân</title>
</head>
<html>
<?php
    if(isset($_POST['save'])){
        
        $year = $_POST['year'];$HocVi = $_POST['hocvi'];$htDaoTao = $_POST['htdaotao'];$ChuyenNganh = $_POST['chuyennganh'];
        $QuocTich = $_POST['quoctich'];$DanToc = $_POST['dantoc'];$TonGiao = $_POST['tongiao'];$SoCMT = $_POST['socmt'];
        $NoiCapCMT = $_POST['noicapcmt'];$Phone = $_POST['phone'];$SoTruong = $_POST['sotruong'];
        $Tinh1 = $_POST['tinh1'];$Huyen1 = $_POST['huyen1'];$Xa1 = $_POST['xa1'];$SoNha1 = $_POST['sonha1'];
        $Tinh2 = $_POST['tinh2'];$Huyen2 = $_POST['huyen2'];$Xa2 = $_POST['xa2'];$SoNha2 = $_POST['sonha2'];
        
        if(isset($_SESSION['username'])){
            require("config.php");
            $sql1 = "select * from profile where username = '".$_SESSION['username']."' ";
            $query1 = mysql_query($sql1);
            // Nếu bảng profile đã có giá trị username tức là đã có thông tin của nhân viên mang tài khoản $_SESSION['username ']
            if(mysql_num_rows($query1) != ""){
                $sql2 = "update profile set year = '".$year."', HocVi = '".$HocVi."' , htDaoTao = '".$htDaoTao."' , ChuyenNganh = '".$ChuyenNganh."'
                                            , QuocTich = '".$QuocTich."' , DanToc = '".$DanToc."' , TonGiao = '".$TonGiao."' , SoCMT = '".$SoCMT."' 
                                            , NoiCapCMT = '".$NoiCapCMT."' , Phone = '".$Phone."' , SoTruong = '".$SoTruong."'
                                            , Tinh1 = '".$Tinh1."' , Huyen1 = '".$Huyen1."' , Xa1 = '".$Xa1."' , SoNha1 = '".$SoNha1."'
                                            , Tinh2 = '".$Tinh2."' , Huyen2 = '".$Huyen2."' , Xa2 = '".$Xa2."' , SoNha1 = '".$SoNha2."' 
                                            where username = '".$_SESSION['username']."' ";
                mysql_query($sql2);
            }
            // Bảng profile chưa có nhân viene mà tài khoản $_SESSION['username']
            else{
                $sql3 = "insert into profile(id, username, year, avatar, HocVi, htDaoTao, ChuyenNganh,
                                            QuocTich, DanToc, TonGiao, SoCMT, NoiCapCMT, Phone, SoTruong,
                                            Tinh1, Huyen1, Xa1, SoNha1,
                                            Tinh2, Huyen2, Xa2, SoNha2)                                     
                                     values ('".$_SESSION['userid']."', '".$_SESSION['username']."', '".$year."', '', '".$HocVi."', '".$htDaoTao."', '".$ChuyenNganh."'
                                            , '".$QuocTich."', '".$DanToc."', '".$TonGiao."', '".$SoCMT."', '".$NoiCapCMT."', '".$Phone."', '".$SoTruong."'
                                            , '".$Tinh1."', '".$Huyen1."', '".$Xa1."', '".$SoNha1."'
                                            , '".$Tinh2."', '".$Huyen2."', '".$Xa2."', '".$SoNha2."' )";
                mysql_query($sql3);
            }
            mysql_close();
        }
        require("config.php");
        $sql = "select * from profile where username = '".$_SESSION['username']."' ";
        $query = mysql_query($sql);
        if(mysql_num_rows($query) != "")
            $dl = mysql_fetch_assoc($query);
        mysql_close();
            
    } 
?>
<body>
    <div id="layout">
        <form action="profile_user.php" method="POST">
            <input class="save" type="submit" name="save" value=""/>
            <div>
                <fieldset class="one">
                    <legend><b>Thông tin cá nhân</b><br /></legend>
                    <fieldset class="one-one">
                        <label for="Mã nhân viên">Mã nhân viên <font color=red >*</font>:</label><input class="highlight" type="text" size="35px" 
						value="<?php echo "".$_SESSION['username']; ?>" readonly=""/><br /><br />
                        <label for="Họ và tên">Họ và tên <font color=red >*</font>:</label><input class="highlight" type="text" size="35px" 
						value="<?php echo "".$_SESSION['name']; ?>" readonly="" /><br /><br />
                        <label for="Ngày sinh">Ngày sinh:</label><input type="text" size="35px" name="year" value="<?php if(isset($dl)) 
						echo "".$dl['year']; ?>" /><br /><br />
                        <label for="Email">Email <font color=red >*</font>:</label><input class="highlight" type="text" size="35px" 
						value="<?php echo "".$_SESSION['email']; ?>" readonly=""/><br /><br />
                        <label for="Học vị/Bằng cấp">Học vị/Bằng cấp:</label><input type="text" size="35px" name="hocvi" 
						value="<?php if(isset($dl)) echo "".$dl['HocVi']; ?>"/><br /><br />
                        <label for="Hình thức đào tạo">Hình thức đào tạo:</label><input type="text" size="35px" name="htdaotao" 
						value="<?php if(isset($dl)) echo "".$dl['htDaoTao']; ?>"/><br /><br />
                        <label for="Chuyên ngành">Chuyên ngành:</label><input type="text" size="35px" name="chuyennganh"
						value="<?php if(isset($dl)) echo "".$dl['ChuyenNganh']; ?>"/><br />
                    </fieldset>
                    
                    <fieldset class="one-two" >
                        <img src="<?php  if(isset($dl) && $dl['avatar'] != "") echo "" .$dl['avatar']; ?>" width="129px" height="179px" />
                    </fieldset>
                    
                    <fieldset class="one-three" >
                        <a href="" onclick=" OpenPopup('up_image.php?username=<?php echo "" .$_SESSION['username']; ?>&userid=<?php echo "" .$_SESSION['userid']; ?>','WindowName','330','200','scrollbars=1')" >Cập nhật ảnh</a>
                        <?php ?>
                    </fieldset>
                </fieldset>
            </div>
            <div>
                <fieldset class="two">
                    <legend><b>Thông tin cơ bản</b> <br /></legend>
                        <label for="Quốc tịch">Quốc tịch: </label><input type="text" size="35px" name="quoctich" value="<?php if(isset($dl)) echo "".$dl['QuocTich']; ?>"/><br /><br />
                        <label for="Dân tộc">Dân tộc: </label><input type="text" size="35px" name="dantoc" value="<?php if(isset($dl)) echo "".$dl['DanToc']; ?>"/><br /><br />
                        <label for="Tôn giáo">Tôn giáo: </label><input type="text" size="35px" name="tongiao" value="<?php if(isset($dl)) echo "".$dl['TonGiao']; ?>"/><br /><br />
                        <label for="Số CMT">Số CMT: </label><input type="text" size="35px" name="socmt" value="<?php if(isset($dl)) echo "".$dl['SoCMT']; ?>"/><br /><br />
                        <label for="Nơi cấp CMT">Nơi cấp CMT: </label><input type="text" size="35px" name="noicapcmt" value="<?php if(isset($dl)) echo "".$dl['NoiCapCMT']; ?>"/><br /><br />
                        <label for="Số điện thoại">Số điện thoại: </label><input type="text" size="35px" name="phone" value="<?php if(isset($dl)) echo "".$dl['Phone']; ?>"/><br /><br />
                        <label for="Sở trường & NK">Sở trường & NK: </label><input type="text" size="35px" name="sotruong" value="<?php if(isset($dl)) echo "".$dl['SoTruong']; ?>"/><br />
                </fieldset>
            </div>
            <div>
                <fieldset class="three">
                    <legend><b>Nơi ở hiện tại</b><br /></legend>
                        <label for="Tỉnh/Thành phố">Tỉnh/Thành phố: </label><input type="text" size="35px" name="tinh1" value="<?php if(isset($dl)) echo "".$dl['Tinh1']; ?>"/><br /><br />
                        <label for="Quận/Huyện/T.Xã">Quận/Huyện/T.Xã: </label><input type="text" size="35px" name="huyen1" value="<?php if(isset($dl)) echo "".$dl['Huyen1']; ?>"/><br /><br />
                        <label for="Phường/Xã">Phường/Xã: </label><input type="text" size="35px" name="xa1" value="<?php if(isset($dl)) echo "".$dl['Xa1']; ?>"/><br /><br />
                        <label for="Số nhà(nếu có)">Số nhà(nếu có): </label><input type="text" size="35px" name="sonha1" value="<?php if(isset($dl)) echo "".$dl['SoNha1']; ?>"/><br />
                </fieldset>
    
            </div>
            <div>
                <fieldset class="four">
                    <legend><b>Quê quán</b><br /></legend>
                        <label for="Tỉnh/Thành phố">Tỉnh/Thành phố: </label><input type="text" size="35px" name="tinh2" value="<?php if(isset($dl)) echo "".$dl['Tinh2']; ?>"/><br /><br />
                        <label for="Quận/Huyện/T.Xã">Quận/Huyện/T.Xã: </label><input type="text" size="35px" name="huyen2" value="<?php if(isset($dl)) echo "".$dl['Huyen2']; ?>"/><br /><br />
                        <label for="Phường/Xã">Phường/Xã: </label><input type="text" size="35px" name="xa2" value="<?php if(isset($dl)) echo "".$dl['Xa2']; ?>"/><br /><br />
                        <label for="Số nhà(nếu có)">Số nhà(nếu có): </label><input type="text" size="35px" name="sonha2" value="<?php if(isset($dl)) echo "".$dl['SoNha2']; ?>"/><br />
                </fieldset>
            </div>
        </form>
    </div>
</body>
</html>