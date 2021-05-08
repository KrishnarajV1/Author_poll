<html>
<head><style>
  input[type=submit] {
    width: 20em;  height: 3em;
    font-size: 20;
    font-weight: bold;
}
body {
  background-image: url('1.jpg');
  background-size: cover;

}
</style></head>
<title></title>
<body bgcolor="yellow"><br><br><br><br><br><h1 \n align='center'><font size='8' align='center' color='black'><u><b>Authors poll</u></b></h1></font></body>
</html>


<?Php

session_start();
$s_id=session_id();
require "config.php";
$count=$dbo->prepare("select s_id from author_poll_ans where s_id='$s_id'");
$count->execute();
$no=$count->rowCount();
if($no <=0 ){
echo "<a href=result.php>Result</a>";
}

$qst_id=1; 
$count=$dbo->prepare("select * from author_poll where qst_id=:qst_id");
$count->bindParam(":qst_id",$qst_id,PDO::PARAM_INT,1);
if($count->execute()){
$query = $count->fetch(PDO::FETCH_OBJ);
}

echo "
<form method=post action=poll.php>
<input type=hidden name=qst_id value=$qst_id>
<table border='1' cellspacing='0'  height='50%' width='50%' id='AutoNumber1'align='center'>
  <tr>
    <td width='100%' align='center'><font  size='8'color='black' >$query->qst</font></td>
  </tr>
  <tr>
    <td width='100%' >
    <table border='0' cellspacing='0'  width='100%'  cellpadding='0'>
      <tr >
        <td width='10%'><input type='radio' value='$query->opt1'  name='opt'></td>
        <td width='90%'><font  size='4' face='sansation_light.woff' color='black'><b>$query->opt1</font></td>
      </tr>
      <tr>
        <td width='10%'><input type='radio' value='$query->opt2'  name='opt'></td>
        <td width='90%'><font  size='4' face='sansation_light.woff'color='black'><b>$query->opt2</font></td>
      </tr>
      <tr>
        <td width='10%'><input type='radio' value='$query->opt3'  name='opt'></td>
        <td width='90%'><font  size='4'face='sansation_light.woff'color='black' ><b>$query->opt3</font></td>
      </tr>
      <tr>
        <td width='10%'><input type='radio' value='$query->opt4'  name='opt'></td>
        <td width='90%'><font  size='4' face='sansation_light.woff'color='black'><b>$query->opt4</font></td>
      </tr>
    </table>
    </td>
  </tr>
<tr>
    <td width='100%'  align='center'>
<font  size='8' color='black'><input type='submit' value='Submit'><b></form></td>
  </tr>

</table>
";
?>

<center>

<a href=index.php><font size='6' color='black'>Poll</font></a> &nbsp;&nbsp;|&nbsp;&nbsp;<a href=result.php><font size='6' color='black'>Result</font></a>
</center> 


