<html>
<?php

//$db_user="root";//userName
//$db_pass="usbw";//password
//$db_serv="localhost:3307";//hostName
//$db_name="komax";//dbName

//$mysqli= new mysqli($db_serv, $db_user, $db_pass, $db_name);
//$mysqli->set_charset("utf8");
include('connect.php');
if (mysqli_connect_errno()){
		printf("Impossible connect to database, error N ", mysqli_connect_error());
		exit;
	}
echo("connect". "<p>");

$sql = "CREATE TABLE IF NOT EXISTS `komax` (
  `ID` int(11) NOT NULL,
  `nomer` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `misce` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cycle` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата',
  PRIMARY KEY ( `id` )
  )";

$sql1 = "ALTER TABLE `komax` ADD UNIQUE KEY `ID` (`ID`);";

$sql2 = "ALTER TABLE `komax` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;";

if ($mysqli->query($sql) === TRUE) {
    echo "Table created successfully" . "<br>";
	if ($mysqli->query($sql1) === TRUE){
		if ($mysqli->query($sql2) === TRUE){
			echo "Table modifice successfully"."<br>";	
		}
		else {
			echo "Error creating table: " . $mysqli->error;
			}	
	}
} else {
    echo "Error creating table: " . $mysqli->error;
}
?>
<form action="" method="POST">
	<input type="submit" name="Btn" value="OK"/>	
</form>
<?php 
if (isset($_POST['Btn']))
header('Location: adminka.php');
exit;
?>
</html>
