<?php

$files = [
	"comments/comdatum.txt",
	"comments/comnaam.txt",
	"comments/commenttxt.txt"
];

foreach ($files as $file) {
    if (isset($_GET['delete'])) {
		unlink($file);
    }

}
header("location:/blog/index1.php");


?>
