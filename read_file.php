<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Add new note</title>
	<link rel="stylesheet" href="style.css" />
	<link href="https://fonts.googleapis.com/css?family=Libre+Franklin|Rajdhani|Great+Vibes|Anton|Francois+One|Playfair+Display+SC" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
 <body>
<div id= "page">
	<div class="image-logo">
		<a href="index.php"><img  src="images/notes.png" alt="Avatar"> </a>
	</div>
<div class= "section">
	<h1> Description </h1>
	<div class ="page-add">
    
	<?php
    //Opens directory 
    $myDirectory = opendir(".");

    //Display directory
    if(isset($_GET['file'])) 
    { 
       $read_file = $_GET['file']; 
       $fileReader = fopen($read_file,'r') or die("Unable to open file!");
       $data = fread($fileReader,filesize($read_file));
       fclose($fileReader);
       echo  "<h2>File name: </h2>".$_GET['file']."<br/>";
       echo "<h2> Content: </h2> ".$data;
    }
	//Closes directory
	closedir($myDirectory);
?>
        </div>
	</div>
</div>

 </body>
 </html> 
