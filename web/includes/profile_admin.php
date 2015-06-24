<?php
    require("config.php");
    require("admin.php");
    $sql1 = "select * from profile where id = '".$_GET['userid']."' ";
    $sql2 = "select * from account where id = '".$_GET['userid']."' ";
    $query1 = mysql_query($sql1);
    $query2 = mysql_query($sql2);
    if(mysql_num_rows($query1) != ""){
        $dl = mysql_fetch_assoc($query1);
    }
    if(mysql_num_rows($query2) != ""){
        $row = mysql_fetch_assoc($query2);
        //TH: nếu chọn profile của admin thì sẽ dẫn đến tran profile_user.php
        if($row['level'] == 1){
            echo '<script type="text/javascript">';
            echo "window.location='profile_user.php?a=1'";
            echo '</script>';
        }
    }
    mysql_close();
        
?>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
	<meta name="author" content="duong" />
    <link rel="stylesheet" type="text/css" href="profile.css" />
	<title>Thông Tin Cá Nhân</title>
    <style>

    </style>
</head>
<html>
<body>
    <div id="layout">
        <form>
            <div>
                <fieldset class="one">
                    <legend><b>Thông tin cá nhân</b><br /></legend>
                    <fieldset class="one-one">
                        <label for="Mã nhân viên">Mã nhân viên <font color=red >*</font>:</label><input class="highlight" type="text" size="35px" 
						value="<?php if(isset($row)) echo "".$row['username']; ?>" readonly=""/><br /><br />
                        <label for="Họ và tên">Họ và tên <font color=red >*</font>:</label><input class="highlight" type="text" size="35px" 
						value="<?php if(isset($row)) echo "".$row['name']; ?>" readonly="" /><br /><br />
                        <label for="Ngày sinh">Ngày sinh:</label><input type="text" size="35px" name="year" value="<?php if(isset($dl)) 
						echo "".$dl['year']; ?>" readonly=""/><br /><br />
                        <label for="Email">Email <font color=red >*</font>:</label><input class="highlight" type="text" size="35px" 
						value="<?php if(isset($row)) echo "".$row['email']; ?>" readonly=""/><br /><br />
                        <label for="Học vị/Bằng cấp">Học vị/Bằng cấp:</label><input type="text" size="35px" name="hocvi" 
						value="<?php if(isset($dl)) echo "".$dl['HocVi']; ?>"readonly=""/><br /><br />
                        <label for="Hình thức đào tạo">Hình thức đào tạo:</label><input type="text" size="35px" name="htdaotao" 
						value="<?php if(isset($dl)) echo "".$dl['htDaoTao']; ?>"readonly=""/><br /><br />
                        <label for="Chuyên ngành">Chuyên ngành:</label><input type="text" size="35px" name="chuyennganh" 
						value="<?php if(isset($dl)) echo "".$dl['ChuyenNganh']; ?>"readonly=""/><br />
                    </fieldset>
                    
                    <fieldset class="one-two" >
                        <img src="<?php  if(isset($dl) && $dl['avatar'] != "") echo "" .$dl['avatar']; ?>" width="129px" height="179px" />
                    </fieldset>
                    
                    <fieldset class="one-three" >
                    </fieldset>
                </fieldset>
            </div>
            <div>
                <fieldset class="two">
                    <legend><b>Thông tin cơ bản</b> <br /></legend>
                        <label for="Quốc tịch">Quốc tịch: </label><input type="text" size="35px" name="quoctich" value="<?php if(isset($dl)) 
						echo "".$dl['QuocTich']; ?>"readonly=""/><br /><br />
                        <label for="Dân tộc">Dân tộc: </label><input type="text" size="35px" name="dantoc" value="<?php if(isset($dl)) 
						echo "".$dl['DanToc']; ?>"readonly=""/><br /><br />
                        <label for="Tôn giáo">Tôn giáo: </label><input type="text" size="35px" name="tongiao" value="<?php if(isset($dl))
						echo "".$dl['TonGiao']; ?>"readonly=""/><br /><br />
                        <label for="Số CMT">Số CMT: </label><input type="text" size="35px" name="socmt" value="<?php if(isset($dl)) 
						echo "".$dl['SoCMT']; ?>"readonly=""/><br /><br />
                        <label for="Nơi cấp CMT">Nơi cấp CMT: </label><input type="text" size="35px" name="noicapcmt" value="<?php if(isset($dl)) 
						echo "".$dl['NoiCapCMT']; ?>"readonly=""/><br /><br />
                        <label for="Số điện thoại">Số điện thoại: </label><input type="text" size="35px" name="phone" value="<?php if(isset($dl)) 
						echo "".$dl['Phone']; ?>"readonly=""/><br /><br />
                        <label for="Sở trường & NK">Sở trường & NK: </label><input type="text" size="35px" name="sotruong" value="<?php if(isset($dl)) 
						echo "".$dl['SoTruong']; ?>"readonly=""/><br />
                </fieldset>
            </div>
            <div>
                <fieldset class="three">
                    <legend><b>Nơi ở hiện tại</b><br /></legend>
                        <label for="Tỉnh/Thành phố">Tỉnh/Thành phố: </label><input type="text" size="35px" name="tinh1" value="<?php if(isset($dl)) 
						echo "".$dl['Tinh1']; ?>"readonly=""/><br /><br />
                        <label for="Quận/Huyện/T.Xã">Quận/Huyện/T.Xã: </label><input type="text" size="35px" name="huyen1" value="<?php if(isset($dl))
						echo "".$dl['Huyen1']; ?>"readonly=""/><br /><br />
                        <label for="Phường/Xã">Phường/Xã: </label><input type="text" size="35px" name="xa1" value="<?php if(isset($dl)) 
						echo "".$dl['Xa1']; ?>"readonly=""/><br /><br />
                        <label for="Số nhà(nếu có)">Số nhà(nếu có): </label><input type="text" size="35px" name="sonha1" value="<?php if(isset($dl)) 
						echo "".$dl['SoNha1']; ?>" readonly=""/><br />
                </fieldset>
    
            </div>
            <div>
                <fieldset class="four">
                    <legend><b>Quê quán</b><br /></legend>
                        <label for="Tỉnh/Thành phố">Tỉnh/Thành phố: </label><input type="text" size="35px" name="tinh2" value="<?php if(isset($dl)) 
						echo "".$dl['Tinh2']; ?>"readonly=""/><br /><br />
                        <label for="Quận/Huyện/T.Xã">Quận/Huyện/T.Xã: </label><input type="text" size="35px" name="huyen2" value="<?php if(isset($dl)) 
						echo "".$dl['Huyen2']; ?>"readonly=""/><br /><br />
                        <label for="Phường/Xã">Phường/Xã: </label><input type="text" size="35px" name="xa2" value="<?php if(isset($dl))
						echo "".$dl['Xa2']; ?>"readonly=""/><br /><br />
                        <label for="Số nhà(nếu có)">Số nhà(nếu có): </label><input type="text" size="35px" name="sonha2" value="<?php if(isset($dl))
						echo "".$dl['SoNha2']; ?>"readonly=""/><br />
                </fieldset>
            </div>
        </form>
    </div>
</body>
</html>