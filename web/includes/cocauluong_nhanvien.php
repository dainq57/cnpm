<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!-- This is a pagination script using Jquery, Ajax and PHP
     The enhancements done in this script pagination with first,last, previous, next buttons -->
<?php
    require("employee.php");
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Live Edit, Pagination and Delete Records with Jquery</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> 
		 <script type="text/javascript" src="../js/EditDeletePage.js"></script>
        

        <style type="text/css">
            .wrapper{
                width: 800px;
                margin: 60px 200px;
				font-family:Arial, Helvetica, sans-serif
            }*/
            #loading{
                width: 100%;
                position: absolute;
                top: 100px;
                left: 100px;
				margin-top:200px;
            }
            #container .pagination ul li.inactive,
            #container .pagination ul li.inactive:hover{
                background-color:#ededed;
                color:#bababa;
                border:1px solid #bababa;
                cursor: default;
            }
            #container .data ul li{
                list-style: none;
                font-family: verdana;
                margin: 5px 0 5px 0;
                color: #000;
                font-size: 13px;
            }

            #container .pagination{
                width: 800px;
                height: 25px;
            }
            #container .pagination ul li{
                list-style: none;
                float: left;
                border: 1px solid #006699;
                padding: 2px 6px 2px 6px;
                margin: 0 3px 0 3px;
                font-family: arial;
                font-size: 14px;
                color: #006699;
                font-weight: bold;
                background-color: #f2f2f2;
            }
            #container .pagination ul li:hover{
                color: #fff;
                background-color: #006699;
                cursor: pointer;
            }
			.go_button
			{
			background-color:#f2f2f2;border:1px solid #006699;color:#cc0000;padding:2px 6px 2px 6px;cursor:pointer;position:absolute;margin-top:-1px;
			}
			.total
			{
			float:right;font-family:arial;color:#999;
			}
			.editbox
			{
			display:none;
			
			}
			td, th
			{
			width:20%;
			text-align:left;;
			padding:5px 15px;
			}
			.editbox
			{
			padding:4px;
			
			}
        </style>

    </head>
    <body>

<body>

<div class="wrapper">
    <div id="loading"></div>

    <div id="container"></div>
    <script>
        var str = "<?php echo "" .$_GET['result']; ?>";
        if(str != "")
        window.location = 'cocauluong1.php';
    </script>
</div>
		
    </body>
</html>
