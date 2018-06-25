<!DOCTYPE html>

<html>

<head>

<meta charset = "utf-8">
<meta property = "og:image">
<link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href = "https://fonts.googleapis.com/css?family=Orbitron" rel = "stylesheet">
<link href = "https://fonts.googleapis.com/css?family=Orbitron|Roboto" rel = "stylesheet">
<link href="https://fonts.googleapis.com/css?family=Aldrich" rel="stylesheet">
<link rel = "stylesheet" style = "text/css" href = "css/style.css">
<script type = "text/javascript" src = "script.js"></script>
<title>Jaspers blog</title>

</head>

<body onload="iframe()">

<div class = "navi">
	<button class = "LoginBtn">Login</button>
	<input type = "button" value = "Close" onclick = "closeComment()">
	<div class = "SearchMenu" align= right><input type = "text" placeholder = "zoek.." name = "search">
		<button class = "SearchBtn"><i class = "fa fa-search"></i></button>
	</div>
	<div class = "NameBlog"><h1>Jaspers'</h1><h2>blog</h2></div>
</div>

<div class = "Left">
	<div class = "LeftContent">
		<h2>Over Mij:</h2>
		<p>Mijn naam is Jasper Grit en ik ben 33 jaar.
		<br>
		Ik woon in Hoogeveen.
		<br>
		<br>
		Begin mei 2018 ben ik begonnen aan
		<br>
		een vier maandelijkse studie
		<br>
		bij CodeGorilla	als programmeur(PHP)</p>
	</div>
	<div class="LeftContent">
		<h2>contact:</h2>
		<p>U kunt mij bereiken via:</p>
		<i class="fa fa-envelope"></i>
		<i class="fa fa-facebook"></i>
		<i class="fa fa-linkedin"></i>
	</div>
	<div class="LeftContent">
		<h2>Categorieën:</h2>
	</div>
	<div class="LeftContent">
		<h2>Recente posts:</h2>
	</div>
	<div class="LeftContent">
		<h2>Archief:</h2>
	</div>
	<div class = "LeftContent">
		<h2>Links:</h2>
	</div>
</div>


<form class = "Article" action = "mijnscript.php" method = "post" id = "rtf" enctype="multipart/form-data">
		<h2>Nieuwe post</h2>
		<br>
		<ul>
				<li>Titel artikel: <input type = "tekst" name = "blogtitel" class = "blogtitel">
				<li>Auteur: <input type="input" name="naam"></li>
				<li>Uw tekst:</li>
				<div class = "btnbar">
				<input type = "button" value = "B" onclick = "bold()">
				<input type = "button" value = "I" onclick = "italic()">
				<input type = "button" value = "U" onclick = "underline()">
				<input type = "file" 		name = "myFile" id = "myFile">
				<input type = "button" value = "Size" onclick = "fontsize()">
				<input type = "button" value = "Color" onclick = "fontcolor()">
				<input type = "button" value = "Highlight" onclick = "highlight()">
				<input type = "button" value = "Link" onclick = "link()">
				<input type = "button" value = "Expand" onclick = "textExpand()">
				</div>
				<!-- onkeyup="textExpand()" onkeydown="textExpand()" -->
				<li><textarea id = "textarea" name = "posttxt" style = "display: none;"></textarea></li>
				<li><iframe name = "editor" id = "editor" style = "width: 500; height: 400;"></iframe></li>

				<li><input type = "button" value = "Plaats artikel" onclick="formsubmit()" class = "submitBtn"></li>
		</ul>
</form>
<!-- "content-type: image/your_image_type" -->
<form class = "Comment" action = "comments.php" method = "post">
		<h2>Comments</h2>
		<br>
		<ul>
				<li>Naam: <input name="comnaam"></li>
				<li><textarea id = "areacomment" name = "commenttxt"></textarea></li>
				<li><input type = "submit" name = "PostC" value = "Plaats comment" class = "comsubmitBtn"></li>
		</ul>
</form>



<div class = "PostArticle">
<!-- schrijven naar site -->
<?php

$datum = file_get_contents('data/datum.txt', true);
$blogtitel = file_get_contents('data/blogtitel.txt', true);
$naam = file_get_contents('data/naam.txt', true);
$posttxt = file_get_contents('data/posttxt.txt', true);
$target = file_get_contents('data/imagetxt.txt', true);

$adatums = explode("\n", $datum);
$ablogtitles = explode("\n", $blogtitel);
$anames = explode("\n", $naam);
$aposttxts = explode("\n", $posttxt);
$atarget = explode("\n", $target);


$adatums = array_reverse($adatums);
$ablogtitles = array_reverse($ablogtitles);
$anames = array_reverse($anames);
$aposttxts = array_reverse($aposttxts);
$atarget = array_reverse($atarget);


$lengte = count($ablogtitles);


for ($i = 0; $i < $lengte; $i++) {






 		echo 	'<form id = "post" action = "Permission.php">';
		echo  "<h1>" .$ablogtitles[$i]. "</h1>". "<br><br>";
		echo	$adatums[$i]. "<br><br>";
		echo  "<h3>" .$anames[$i]. "</h3>"."<br><br>";
		echo  "<img src = '".$atarget[$i]."'>". "<br><br>";
		echo	$aposttxts[$i] . "<br><br>";
		echo 	$tmp_name . "<br><br>";
		echo 	"<button id = 'answerBtn' // onclick = 'createPost()'>". "Beantwoorden". "</button>";
		echo 	'</form>';



}


	$comdatum = file_get_contents('comments/comdatum.txt', true);
	$comnaam = file_get_contents('comments/comnaam.txt', true);
	$commenttxt = file_get_contents('comments/commenttxt.txt', true);

	$acomdatums = explode("\n", $comdatum);
	$acomnames = explode("\n", $comnaam);
	$acommenttxts = explode("\n", $commenttxt);

	$acomdatums = array_reverse($acomdatums);
	$acomnames = array_reverse($acomnames);
	$acommenttxts = array_reverse($acommenttxts);

	$lengte = count($acommenttxts);


	for ($i = 0; $i < $lengte; $i++) {

	echo 	'<form id = "postcomment" value = "Comment" name = "Comment" action = "delete.php" method = "get">';
	echo  "<h1>"."Comments". "</h1>". "<br><br>";
	echo	$acomdatums[$i]. "<br><br>";
	echo  "<h3>" .$acomnames[$i]. "</h3>"."<br><br>";
	echo	$acommenttxts[$i] . "<br><br>";
	echo			"<input type = 'submit' class = 'deletecomment' name = 'delete' value = 'delete'>";
	echo 	"</form>";
}

?>
</div>

</script>


</body>

</html>
