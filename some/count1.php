<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>測驗</title>
</head>

<body>
<left>
<font size="5" color="blue">計算分數</font>
</center>
<hr>
<?php
$score1 = 60;
if ($score1 >= 60) {
    echo "<h3><font color=green>你成績 $score1 分。</font></h3>";
    echo "<h2><font color=green>你及格了!</font></h2>"; 
} else {
    echo "<h3><font color=red>你成績 $score1 分。</font></h3>";  
    echo "<h2><font color=red>你被當了!</font></h2>";
}
?>
<hr>
<?php
$sum=10;
for ($i=0; $i<=200; $i++){
$sum+=$i;
};
?>
<h2>for迴圈從10加到200的總和為:<font color="red"><?php  echo"$sum"?></font></h2>
<hr>
<?php
$sum1=10;
while ($ii<=200){
$sum1+=$ii;
$ii++;
};
?>
<h2>while迴圈從10加到200的總和為:<font color="red"><?php  echo"$sum1"?></font></h2>
<hr>
<p></p>
<form action="count1.php" method="post" name="form1">
請輸入成績：<br>
 <input type="text" name="score" > 
 <br>
 <input type="submit" value="確定">
</form>
<?
$score = isset($_POST['score']) ? $_POST['score'] : NULL;
if (!empty($score)) 
  if ($score>=60) :
    echo "<h3><font color=green>你成績 $score 分。</font></h3>";
    echo "<h2><font color=green>你及格了!</font></h2>"; 
  else :
    echo "<h3><font color=red>你成績 $score 分。</font></h3>";  
    echo "<h2><font color=red>你被當了!</font></h2>";
 
  endif;
?>

</body>
</html>
