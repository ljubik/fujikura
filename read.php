<?php
error_reporting(E_ALL);
//error_reporting(0);
session_start();
include('connect.php');
include('translate.php');
?>
<html>
<meta charset="UTF-8">

</html>
<?php
echo "<a href='adminka.php'>".$tr_index."</a>";
echo '<pre>', print_r($_POST, 1), '</pre>'; //виводить все що є вмасиві $_POST
//$sql = "SELECT `nomer`, `cycle`, `misce` AS `nomer` FROM `komax` WHERE nomer = (select max(nomer) from `komax`)";
$sql = "SELECT `ID`, `nomer`, `misce`, `cycle`, `time` FROM `komax` WHERE nomer = (select Count(distinct) from `komax`)";

//$sql = "SELECT COUNT(*), `nomer`, `cycle`, `misce`, `ID` AS `Строки`, `id` FROM `komax` GROUP BY `nomer` ORDER BY `nomer` WHERE cycle = (select max(cycle) from `komax`)";
//$sql = "SELECT COUNT(*),  `nomer`, `cycle`, `misce`, `ID` AS `Строки`, `id` FROM `komax` GROUP BY `nomer` ORDER BY last id";

$res = $mysqli->query($sql);

echo "<table border='1' cellpadding='0' cellspacing='0' style='width: 100%; height: 10px'><tbody>
<tr><td style='width: 33%; height: 20px'><B>".$tr_nomer_apl."</td>
<td style='width: 33%; height: 20px'><B>".$tr_cycle_apl."</td>
<td style='width: 33%; height: 20px'><B>".$tr_misce_apl."</td> </tr></tbody></table>";
while($row = mysqli_fetch_assoc($res))
echo "<table border='1' cellpadding='0' cellspacing='0' style='width: 100%; height: 10px'><tbody>
<tr><td style='width: 33%; height: 15px'>".$row['nomer']."</td>   
<td style='width: 33%; height: 15px'>".$row['cycle']."</td>
<td style='width: 33%; height: 15px'>".$row['misce']."</td></tr></tbody></table>";
	
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
