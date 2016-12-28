<?php
error_reporting(E_ALL);
//error_reporting(0);
session_start();
include('connect.php');
include('translate.php');
?>

<html>
<meta charset="UTF-8">


<?php
echo "<a href='adminka.php'>".$tr_index."</a>";
//$sql = "SELECT `nomer`, `cycle`, `misce` AS `nomer` FROM `komax` WHERE nomer = (select max(nomer) from `komax`)";
//$sql = "SELECT `ID`, `nomer`, `misce`, `cycle`, `time` FROM `komax` WHERE nomer = (select Count(distinct) from `komax`)";

//$sql = "SELECT `nomer`, `cycle`, `misce` FROM `komax` GROUP BY `nomer` ORDER BY `nomer` WHERE cycle = (select max(cycle) from `komax`)";
//$sql = "SELECT COUNT(*),  `nomer`, `cycle`, `misce`, `ID` AS `Строки`, `id` FROM `komax` GROUP BY `nomer` ORDER BY last id";

//$sql = "SELECT `nomer`, `cycle`, `misce`, `time` FROM `komax` WHERE cycle = (select max(cycle))" ;

$sql = "SELECT `ID`, `nomer`, `cycle`, `misce`, `time` FROM `komax` WHERE 1 ORDER BY `nomer`" ;
$result = $mysqli->query($sql);

//echo '<pre>', print_r($result), '</pre>'; //виводить все що є в масиві

echo "<table border='1' cellpadding='0' cellspacing='0' style='width: 100%; height: 10px'><tbody>
<tr><td style='width: 33%; height: 20px'><B>".$tr_nomer_apl."</td>
<td style='width: 33%; height: 20px'><B>".$tr_cycle_apl."</td>
<td style='width: 33%; height: 20px'><B>".$tr_misce_apl."</td> </tr></tbody></table>";

 while ($row = $result->fetch_row()) {
        printf ("%s (%s)\n", $row[0], $row[1], $row[2], $row[3], $row[4]);
        
   for ($i = 0; $i < count($result); $i++) {
   	
// while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)){
// while ($row = mysqli_fetch_assoc($res)){

// $Array = [];
// while ($row = $result->fetch_assoc()) {
// 	$Array[] = $row;
//  printf ("%s (%s)\n", $row[0], $row[1], $row["nomer"]);
// echo $Array['nomer'];
// }
// return $Array;
// while($row = $result->fetch_array(MYSQLI_BOTH)){

echo "<table border='1' cellpadding='0' cellspacing='0' style='width: 100%; height: 10px'><tbody>
<tr><td style='width: 33%; height: 15px'>".$row[1]."</td>   
<td style='width: 33%; height: 15px'>".$row[2]."</td>
<td style='width: 33%; height: 15px'>".$row[3]."</td></tr></tbody></table>";

 }

	
    //$numb =	$row['nomer'] ['cycle'] ['misce'];	
	//  if ($row['cycle'] <= $row['cycle']){
	//  	$numb = [$numb, $row['cycle']];
	//  }
	// echo $numb;
	 
	}



if ($mysqli->query($sql) === TRUE) {
			echo $tr_base_nok;
			echo $sql;
			exit;
		} 
else {	
 		//echo "Дані не зчитано " . $mysqli->error;
		echo $sql;
		}
		

?>
</html>