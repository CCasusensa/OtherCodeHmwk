<?php
ob_start();
include ("connect.php");
$start = @mysql_connect($db_host, $db_user, $db_pass) or die('錯誤:數據庫連接失敗,請檢查是否設置正確!</br>請聯繫管理員</br> By:Kevin');
mysql_select_db($db_name);
mysql_query("SET CHARACTER_SET_RESULTS=big5");
mysql_query("SET CHARACTER_SET_CLIENT=big5");
mysql_query("SET NAMES big5");
//計算申請人數
$query = mysql_query("SELECT COUNT(*) FROM `mytable`") or die(mysql_error());
$user_count = mysql_fetch_array($query);
?>
<head>
    <?php
    //錯誤處理
    if (isset($_GET['err'])) {
        if (($_GET['err']) == "nuid") {
            echo ("<font color=red>出錯：您沒有輸入學號</font><br />");
        }
        if (($_GET['err']) == "nuna") {
            echo ("<font color=red>出錯：您沒有輸入姓名</font><br />");
        }
        if (($_GET['err']) == "nubd") {
            echo ("<font color=red>出錯：您沒有選擇出生日期</font><br />");
        }
        if (($_GET['err']) == "nuold") {
            echo ("<font color=red>出錯：您沒有輸入年紀</font><br />");
        }
        if (($_GET['err']) == "nanu") {
            echo ("<font color=red>出錯：您的學號不可以用英文數字以外的字元</font><br />");
        }
        if (($_GET['err']) == "ue") {
            echo ("<font color=red>對不起：您輸入的學號已經被人採用了</font><br />");
        }
    }
    if (!isset($_POST['submit'])) {
        ?>
        <meta http-equiv="Content-Type" content="text/html; charset=big5" >
        <title><?php echo $web_name; ?></title>
    <b>計算機概論作業表格申請</b><br />
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>?page=register" method="post">
        學號:　　　　　　　　　　 出生日期:<br />
        <input type="text" name="學號" maxlength="10" value="">　 <input type="date" name="生日"></a><br />
        <small>最多10個英文或數字    　　　　　　　年/月/日</small><br />
        <br />
        姓名:　　　　　　　　　　 年紀:<br />
        <input type="text" name="姓名" maxlength="10" value="">　 <input type="text" name="年紀" maxlength="3" size="4" value=""><br />  
        <small>最多10個中文或英文或數字</small><br />
        <br />
        <input type="submit" value="申請" name="submit">
        <br />
        <br />
        總申請人數:
        <font face="標楷體" size="4"><font color=#RRGGBB>
    <?php
//總申請人數
    echo $user_count['0'];
    ?>
        <br />
        <br />
    </form>
    <?php
} else {
    //確認是否填空
    if (($_POST['學號'] == "")) {
        header("Location:index.php?page=register&err=nuid");
        die();
    }
    if (($_POST['姓名'] == "")) {
        header("Location:index.php?page=register&err=nuna");
        die();
    }
    if (($_POST['生日'] == "")) {
        header("Location:index.php?page=register&err=nubd");
        die();
    }
    if (($_POST['年紀'] == "")) {
        header("Location:index.php?page=register&err=nuold");
        die();
    }

    //確認學號字元
    $學號 = preg_replace("[^A-Za-z0-9]", "", $_POST['學號']);
    if ($學號 != $_POST['學號']) {
        header("Location: index.php?page=register&err=nanu");
        die();
    }


    //確認學號是否有重複
    $user_query = mysql_query("SELECT COUNT(*) FROM `mytable` WHERE `學號` = '" . $_POST['學號'] . "'") or die(mysql_error());
    $check_user = mysql_fetch_array($user_query);
    if ($check_user['0'] != "0") {
        header("Location: index.php?page=register&err=ue");
        die();
    } else {
        //添加註冊表
        $addtable = ("INSERT INTO `mytable`
        (`id`, `學號`,`姓名`, `年紀`,`生日`)
        VALUES (NULL ,'" . $_POST['學號'] . "','" . $_POST['姓名'] . "','" . $_POST['年紀'] . "','" . $_POST['生日'] . "')");
        mysql_query($addtable) or die(mysql_error());
        ?>
        親愛的, <?php echo $_POST['姓名']; ?>歡迎您~<br />
        恭喜:您的學號是<?php echo $_POST['學號']; ?><br />
        生日為:<?php echo $_POST['生日']; ?><br />
        年紀為:<?php echo $_POST['年紀']; ?><br />
        僅切記不要把個資洩漏給他人!<br />
        <br />
        <br />
        <i>[功課完成!]</i>
        <?php
    }
}
?>
</head>