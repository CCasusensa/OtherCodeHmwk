<head>
    <?php
	$web_name = "計算體積";
	
	    if (isset($_GET['err'])) {
        if (($_GET['err']) == "nuid") {
            echo ("<font color=red>出錯：您沒有輸入長</font><br />");
        }
        if (($_GET['err']) == "nuna") {
            echo ("<font color=red>出錯：您沒有輸入寬</font><br />");
        }
        if (($_GET['err']) == "nubd") {
            echo ("<font color=red>出錯：您沒有輸入高</font><br />");
        }
    }
    if (!isset($_POST['submit'])) {
        ?>
<meta http-equiv="Content-Type" content="text/html; charset=big5" >
<title><?php echo $web_name; ?></title>
<b>計算體積</b><br />
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?handler" method="post">
長:<input type="text" name="long" maxlength="10" value=""></br>
寬:<input type="text" name="wide" maxlength="10" value=""></br>
高:<input type="text" name="high" maxlength="10" value=""></br>
        <br />
        <input type="submit" value="計算體積" name="submit">
        <br />
<?php
} else {
	    //確認是否填空
    if (($_POST['long'] == "")) {
        header("Location:count.php?handler&err=nuid");
        die();
    }
    if (($_POST['wide'] == "")) {
        header("Location:count.php?handler&err=nuna");
        die();
    }
    if (($_POST['high'] == "")) {
        header("Location:count.php?handler&err=nubd");
        die();
    }
	$total = $_POST['long'] * $_POST['wide'] * $_POST['high'];
        ?>
        您輸入的長為:<?php echo $_POST['long']; ?><br />
        您輸入的寬為:<?php echo $_POST['wide']; ?><br />
        您輸入的高為:<?php echo $_POST['high']; ?><br />
		總共的體積為:<?php echo $total;?><br />
        <br />
        <br />
        <i>[計算完成!]</i>
        <?php
    }
?>
</head>