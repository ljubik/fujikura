<?php
error_reporting(E_ALL);
//error_reporting(0);
session_start();
include('connect.php');
include('translate.php');
?>
<html>
<header>
<meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <style>
  .error {color: #FF0000;}
  #language {
      text-align: right;
  }
  </style>
  
  
  
  </header>
<body>

<?php
echo "<a href='index.php'>".$tr_index."</a>";
//echo '<pre>', print_r($_POST, 1), '</pre>'; //виводить все що є вмасиві $_POST
$sql = "SELECT `ID`, `nomer`, `misce`, `cycle`, `time` FROM `komaxupd` WHERE 1" ;
$result = $mysqli->query($sql);



echo "<table border='1' cellpadding='0' cellspacing='0' style='width: 100%; height: 10px'><tbody>
<tr><td style='width: 33%; height: 20px'><B>".$tr_nomer_apl."</td>
<td style='width: 33%; height: 20px'><B>".$tr_cycle_apl."</td>
<td style='width: 33%; height: 20px'><B>".$tr_misce_apl."</td> </tr></tbody></table>";
while($row = $result->fetch_array(MYSQLI_ASSOC)){
echo "<table border='1' cellpadding='0' cellspacing='0' style='width: 100%; height: 10px'><tbody>
<tr><td style='width: 33%; height: 15px'>".$row['nomer']."</td>   
<td style='width: 33%; height: 15px'>".$row['cycle']."</td>
<td style='width: 33%; height: 15px'>".$row['misce']."</td></tr></tbody></table>";

}

if ($mysqli->query($sql) === TRUE) {
			echo $tr_base_nok;
			echo $sql;
			exit;
		} 
else {	
 		//echo "Дані зчитано " . $mysqli->error;
		//echo $sql;
		}	
?>
<?php include('copyright.php');?>
</body>
</html>