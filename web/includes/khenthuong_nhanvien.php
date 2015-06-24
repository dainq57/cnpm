
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
    <meta name="dung" content="a4dse" />
    <title>Khen thưởng</title>
    <style>
        table{background-color: #CFE9FF;margin: 0 auto;margin-top: 40px;}
        table, th, td {border:1px solid black;border-collapse:collapse;text-align: center;}
    </style>
</head>
<html>
    <body>
        <?php
        require("employee.php");
        ?>
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
                echo "Dữ liệu rỗng";
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