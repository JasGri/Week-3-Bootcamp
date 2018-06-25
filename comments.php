<?php
$comdatum = "Datum: " . date("Y/m/d");
$comnaam = $_REQUEST["comnaam"];
$commenttxt = $_REQUEST["commenttxt"];
$persoon = "jasper";

file_put_contents("comments/comdatum.txt",$comdatum . "\r\n\r\n",FILE_APPEND);
file_put_contents("comments/comnaam.txt",$comnaam, $person . "\r\n\r\n",FILE_APPEND | LOCK_EX);
file_put_contents("comments/commenttxt.txt",$commenttxt . "\r\n\r\n",FILE_APPEND);
header("location:/blog/index1.php");

?>
