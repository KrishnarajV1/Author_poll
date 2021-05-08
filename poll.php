<html>
<head><style>
body {
  background-image: url('1.jpg');
  background-size: cover;
}
</style></head><body></body> 
</html>
<?php
session_start();
$s_id=session_id();
require "config.php";
$opt=$_POST['opt'];
$qst_id=$_POST['qst_id'];
if(!isset($opt)){echo "<font  size='2' color='red'>Please select one option and then submit</font>";}
else{

$sql=$dbo->prepare("insert into author_poll_ans(s_id,qst_id,opt)  values(:s_id,:qst_id,:opt)");
$sql->bindParam(':s_id',$s_id,PDO::PARAM_STR, 100);
$sql->bindParam(':qst_id',$qst_id,PDO::PARAM_INT, 1);
$sql->bindParam(':opt',$opt,PDO::PARAM_STR,2);
if($sql->execute()){
//$mem_id=$dbo->lastInsertId(); 
echo "<br><br><br><br><p><br><br><br><br><font size='10' align='center'><center>Thanks for voting,</center> <br><center>Please </center><a href=result.php><br><center>click here to view the poll result</center></font></a>";
}
else{
echo " Not able to add data please contact Admin ";
}


}

?>




<a href=index.php><font size='6' color='black'><center>Back to Poll</a> &nbsp;&nbsp;|&nbsp;&nbsp;<a href=result.php>Result</center></a>
