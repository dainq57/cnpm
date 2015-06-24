<?php 
    session_start();
    if(isset($_SESSION['username'])){
        header('location: includes/admin.php'); 
    }
?>
<html>
<head >
	<meta http-equiv="content-type" content="text/html" charset="utf-8" />
	<meta name="author" content="duong" />
	<title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="includes/style.css" />
</head>

<body >
    <div id="logo">
        <a href="http://www2.uet.vnu.edu.vn/coltech/">
            <img src="image/uet.png" width="80px" height="80px"/>
        </a>
        <a href="index.php">
            <img src="image/logo.gif" width="80px" height="80px" />
        </a>
    </div>
    <div id="wrapper">  
        <div class="picture">
            <ul id="switcher">
                <li><a id="one" class="link"><span></span></a></li>
                <li><a id="two" class="link"><span></span></a></li>
                <li><a id="three" class="link"><span></span></a></li>
                <li><a id="four" class="link"><span></span></a></li>
            </ul>
        </div>
        <div class="info">
            <div class="info1">
                <form class="login" action="index.php" method="post" >
                    <h1>Đăng Nhập</h1>
                    <?php
                        if(isset($_POST['submit'])){
                            $u = $p = "";
                            echo "<ul>";
                            if($_POST['username'] == NULL)
                                echo "<i><li><strong>Tài khoản</strong> chưa điền.<br></li></i>";
                            else
                                $u = $_POST['username']; 
                            if($_POST['password'] == NULL)
                                echo "<i><li><strong>Mật khẩu</strong> chưa điền.<br></li></i>";
                            else
                                $p = $_POST['password'];
                            echo "</ul>";
                            if($u && $p){
                                require("includes/config.php");
                                $pp = sha1($p);
                                $sql = "select * from account where username = '$u' ";
                                $query = mysql_query($sql);
                                if(mysql_num_rows($query) != 0){
                                    $data = mysql_fetch_assoc($query);
                                    if($data['username'] != $u){
                                        echo "<i><strong>Tài khoản</strong> sai.</i><br>";
                                    }else if($data['pword'] != $pp){
                                        echo "<i><strong>Mật khẩu</strong> sai.</i><br>";
                                    }else if($data['pword'] == $pp && $data['username'] == $u){
                                       $_SESSION['userid'] = $data['id'];
                                       $_SESSION['username'] = $data['username'];
                                       $_SESSION['name'] = $data['name'];

                                       $_SESSION['email'] = $data['email'];
                                       $_SESSION['level'] = $data['level'];
                                       if($_SESSION['level'] == 1){
                                           header("location: includes/ad_structure.php");
                                       }else{
                                           header("location: includes/user_structure.php");
                                       }
                                    }
                                }else{
                                    echo "<i><strong>Tài khoản</strong> sai.</i><br>";
                                }
                            }
                        }
                    ?>                    
                    </a><label for="Tài Khoản">Tài Khoản</label>:<br /><br /> <input class="lg" type="text" name="username" size="37px"/><br /><br />
                    <label for="Mật Khẩu">Mật Khẩu</label>:<br /><br /> <input class="lg" type="password" name="password"  size="37px"/><br /><br />
                    <!--<input class="checkbox" type="checkbox" name="checkbox"/> <label for="Ghi nhớ" >Ghi nhớ</label>-->
                    <input id="button" class="lg" class="button" type="submit" name="submit" value="Đăng Nhập"/><br /><br />
                </form>
                <span><i><center>Copyright by A4DSE @ 2014</center></i><i><center>Hotmail: a4dse@gmail.com</i></center></span>
            </div>
        </div>
    </div>
</body>
</html>
