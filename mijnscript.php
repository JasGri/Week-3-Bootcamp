<!--verzenden -->
<?php
$afbeelding = $_FILES['myFile']['tmp_name'];
echo $afbeelding;

$info = pathinfo($_FILES['myFile']['name']);
$ext = $info['extension']; // get the extension of the file
$newname = "newname.".$ext;

$target = 'data/'.$newname;
move_uploaded_file( $_FILES['myFile']['tmp_name'], $target);


$datum = "Datum: " . date("Y/m/d");
$blogtitel = $_REQUEST["blogtitel"];
$naam = $_REQUEST["naam"];
$posttxt = $_REQUEST["posttxt"];

file_put_contents("data/datum.txt",$datum . "\r\n\r\n",FILE_APPEND);
file_put_contents("data/blogtitel.txt",$blogtitel . "\r\n\r\n",FILE_APPEND);
file_put_contents("data/naam.txt",$naam . "\r\n\r\n",FILE_APPEND);
file_put_contents("data/posttxt.txt",$posttxt . "\r\n\r\n",FILE_APPEND);
file_put_contents("data/imagetxt.txt",$target . "\r\n\r\n",FILE_APPEND);
header("location:/blog/index1.php");

?>
