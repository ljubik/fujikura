<?php
error_reporting(E_ALL);
//error_reporting(0);
session_start();
date_default_timezone_set('Europe/Kiev');
$today = date("Y-m-d H:i:s");
include('connect.php');
include('translate.php');
$err = $nameErr = $nomerErr = $misceErr = $cycleErr = "";
$name = $nomer = $misce = $cycle = "";

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<html>
    <header>
<meta charset="UTF-8">
  <style>
  .error {color: #FF0000;}
  #language {
      text-align: right;
  }
  </style>
  </header>
  <body>
<div id="language">
<a href="en/index.php"><img src="en.jpg" alt="English" height="30" wieght="30">English</a>
<a href="index.php"><img src="ua.jpg" alt="Ukrainian" height="30" wieght="30">Ukrainian</a>
</div>
<br>
<?php
if (isset($_POST['subBtn'])){
if ($_SERVER["REQUEST_METHOD"] == "POST"){ 
    if (empty($_POST["nomer"])) {
     $nomerErr = $tr_err_nom;
   } else {
     $nomer = test_input($_POST["nomer"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[0-9A-Z]*$/",$nomer)) {
       $nomerErr = $tr_err_nom1; 
     }
   } 
	if (empty($_POST["misce"])) {
     $misceErr = $tr_err_misce;
   } else {
     $misce = test_input($_POST["misce"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$misce)) {
       $misceErr = $tr_err_misce1; 
     }
   }
	if (empty($_POST["cycle"])) {
     $cycleErr = $tr_err_cycle;
   } else {
     $cycle = test_input($_POST["cycle"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[0-9]*$/",$cycle)) {
		$cycleErr = $tr_err_cycle1;
		/*$sql = "SELECT `cycle` FROM `komax` WHERE 1" ;
		$res = $mysqli->query($sql);
		if ( $res >($_POST["cycle"])) {
			$cycleErr = $tr_err_cycle1;  
	   }*/
	 }
   }
}
if (empty($nomerErr)){
	if (empty($misceErr)){
		if (empty($cycleErr)){
		//if (isset($err)){
		$id = $mysqli->insert_id;
		$nomer = $_POST['nomer'];
		$misce = $_POST['misce'];
		$cycle = $_POST['cycle'];
		$time = $today;
		$sql = "INSERT INTO `komax` (`id`, `nomer`, `misce`, `cycle`, `time`) VALUES ('$id', '$nomer', '$misce', '$cycle', '$time')";	
		$sql1 = "INSERT INTO `komaxupd` (`id`, `nomer`, `misce`, `cycle`, `time`) VALUES ('$id', '$nomer', '$misce', '$cycle', '$time')";
			//	$sql = "update `komaxupd` SET `misce`='$misce', `cycle`='$cycle', `time`='$time' WHERE `nomer`='$nomer' ";	
			if ($mysqli->query($sql) === TRUE) {
			    $mysqli->query($sql1);
		        echo $tr_base_ok;
			    header('Location: index.php');
			    exit;
			}
		}
	}
}
}
?>
<table border='0' cellpadding='0' cellspacing='0' style='width: 100%; height: 40px'><tbody><tr>
<td style='width: 75%; height: 10px'><a href="index.php"><img src="images.jpg" alt="Logo Fujikura"></a><B><h2><?php echo $tr_oblik;?></h2></td>
<td style='width: 25%; height: 10px'><B>  
<a href='index.php'><input type="submit"  name="add_newBtn" tabindex="6" value="<?php echo $tr_add_apl;?>"></a><br><br>
<a href='read.php'><input type="submit"  name="readBtn" tabindex="7" value="<?php echo $tr_read;?>"></a><br><br>
<a href='read_all.php'><input type="submit"  name="read_allBtn" tabindex="8" value="<?php echo $tr_read_all;?>"></a><br><br>
</td></tr>
<tr><td style='width: 75%; height: 10px'><B>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   <?php echo $tr_nomer;?><input type="text" id="inp_nomer" name="nomer" maxlength="5" tabindex="1"> 
   <?php echo $tr_misce;?><input type="text" id="inp_misce" name="misce" maxlength="15" tabindex="2">  
   <?php echo $tr_cycle;?><input type="text" id="inp_cykle" name="cycle" maxlength="9" tabindex="3">
   <input type="submit"  id="inp_btn" name="subBtn" tabindex="5" value="<?php echo $tr_add_new;?>">
   <br>
   <span class="error"><?php echo $nomerErr;?></span><br>
   <span class="error"><?php echo $misceErr;?></span><br>
   <span class="error"><?php echo $cycleErr;?></span><br>
   <br>
</form></td>
<td style='width: 25%; height: 10px'><B> </td></tr></tbody></table>

 

<?php 

?>
</body>
</html>