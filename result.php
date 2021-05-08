<html>
<head><style>
body {
  background-image: url('1.jpg');
  background-size: cover;
}
</style></head>

<body align="center">
<?Php

require "config.php";
echo "<font size='8' face='Verdana' color='#000000'> <b><u><br><br>Result</b></u> </font>";

$qst_id=1;
$count=$dbo->prepare("select qst from author_poll where qst_id=:qst_id");
$count->bindParam(":qst_id",$qst_id,PDO::PARAM_INT,3);

if($count->execute()){
$row = $count->fetch(PDO::FETCH_OBJ);
}else{
echo "Database Problem";
}
echo "<br><b><br><font size='6'>$row->qst</font></b><br>"; 

$count=$dbo->prepare("select ans_id from author_poll_ans where qst_id=:qst_id");
$count->bindParam(":qst_id",$qst_id,PDO::PARAM_INT,3);
$count->execute();
$rt=$count->rowCount();
echo " <font size='3'>No of records =</font> ".$rt;

$sql="select count(*) as no,qst,author_poll_ans.opt from author_poll,author_poll_ans where author_poll.qst_id=author_poll_ans.qst_id and author_poll.qst_id='$qst_id' group by opt";

echo "<table height='50%' width='50%' cellpadding='0' cellspacing='0' border='0' align='center' >";
 
foreach ($dbo->query($sql) as $noticia) {
 echo "<tr>
    <td width='50%' bgcolor='#F1F1F1'>&nbsp;<font size='4' face='sansation_light.woff' color='#000000' align='center'>$noticia[opt]</font></td>";
$width2=$noticia['no'] *10 ; 
$ct=($noticia['no']/$rt)*100;
$ct=sprintf ("%01.2f", $ct); 

echo "    <td width='50%' bgcolor='#F1F1F1'>&nbsp;<font size='3' face='sansation_light.woff' color='red'>($ct %)</font></td><td width='50%' bgcolor='#F1F1F1'>&nbsp;<img src='graph.jpg' height=30 width=$width2></td>
  </tr>";
 echo "<tr>
    <td  bgcolor='#ffffff' colspan=2></td></tr>";

}
echo "</table>";
echo "</font>";





?>
<center>
<a href=index.php><font size='6'>Back to poll</a> &nbsp;&nbsp;|&nbsp;&nbsp;<a href=result.php>Result</a></font></a>
</center> 
</body>
</html>
