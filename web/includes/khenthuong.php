
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8"/>
	<meta name="dung" content="a4dse" />

	<title>Khen thưởng</title>
</head>
    <style>
        table{background-color: #CFE9FF;margin: 0 auto;margin-top: 40px;}
        table, th, td {border:1px solid black;border-collapse:collapse;text-align: center;}
        #add-reward{float:right; margin: 50px 250px 0 0;padding: 5px 10px;border-radius: 2px;}
        #add-reward:hover{background:#8CCA33;}
    </style>
<html>
<body>
    <?php
        require("admin.php"); 
    ?>
    <form action="themkhenthuong.php">
	    <input type="submit" value="Thêm" id="add-reward">
    </form>
	</br> </br>
	<h3 style="margin: 0 500px;"> Danh sách nhân viên được khen thưởng</h3>
    <table lang="VI" align="center" width="750px" border="1">
        <tr>
            <th>STT</th>
            <th>Mã nhân viên</th>
            <th>Tiền thưởng</th>
            <th>Lý do</th>
        </tr>
        <?php
            require("config.php");
            $sql = "select * from khenthuong";
            $query = mysql_query($sql);
            if(mysql_num_rows($query) == ""){
                echo "<center>Dữ liệu rỗng</center>";
            }else{
                $stt = 0;
                while($row = mysql_fetch_array($query)){
                    $stt++;
                    echo "<tr>";
                    echo "<td>$stt</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['thuong'] . "</td>";
                    echo "<td>" . $row['lydo'] . "</td>";
                }
            }
        ?>
    </table>
</body>
</html>