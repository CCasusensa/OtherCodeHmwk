<head>
    <?php
	$web_name = "�p����n";
	
	    if (isset($_GET['err'])) {
        if (($_GET['err']) == "nuid") {
            echo ("<font color=red>�X���G�z�S����J��</font><br />");
        }
        if (($_GET['err']) == "nuna") {
            echo ("<font color=red>�X���G�z�S����J�e</font><br />");
        }
        if (($_GET['err']) == "nubd") {
            echo ("<font color=red>�X���G�z�S����J��</font><br />");
        }
    }
    if (!isset($_POST['submit'])) {
        ?>
<meta http-equiv="Content-Type" content="text/html; charset=big5" >
<title><?php echo $web_name; ?></title>
<b>�p����n</b><br />
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?handler" method="post">
��:<input type="text" name="long" maxlength="10" value=""></br>
�e:<input type="text" name="wide" maxlength="10" value=""></br>
��:<input type="text" name="high" maxlength="10" value=""></br>
        <br />
        <input type="submit" value="�p����n" name="submit">
        <br />
<?php
} else {
	    //�T�{�O�_���
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
        �z��J������:<?php echo $_POST['long']; ?><br />
        �z��J���e��:<?php echo $_POST['wide']; ?><br />
        �z��J������:<?php echo $_POST['high']; ?><br />
		�`�@����n��:<?php echo $total;?><br />
        <br />
        <br />
        <i>[�p�⧹��!]</i>
        <?php
    }
?>
</head>