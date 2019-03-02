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
	<h1> Add new note </h1>
	<button class="btn-add"> <a href ="add.php"> <i class='material-icons'>add</i></a></button>
	
	<?php
 //Variables
 	$fTitle =" "; $fTitleError=" "; $fbTitle =" ";
 	$subject =" "; $subjectError =" "; $fbSubject=" ";

//validate data 
function validate_input($data){
	$data = trim($data);
	$data = htmlspecialchars($data);
	return $data;
}
	//Get inputs and validate
	if($_SERVER["REQUEST_METHOD"] == "GET"){
		
		if(empty($_GET["fTitle"])){
			$fTitleError = "Please enter a file title";
		}else{
			$fTitle = validate_input($_GET["fTitle"]);
			$fbTitle = "<br/> File Title:  $fTitle";
		}

		if(empty($_GET["subject"])){
			$subjectError = "Please enter a file title";
		}else{
			$subject= validate_input($_GET["subject"]);
			$fbSubject = "<br/> File Title:  $subject";
		}
	}

	//Openup Directory
	$myDirectory = opendir(".");
	
	//Get path
	$path = getcwd();

	//File name 
	$fName = $fTitle.'.txt';

	//Checking file existence 
	if(file_exists($path)){
		$file = fopen( $fName, "w");
		if($file){
			fwrite ($file, $subject);
			fclose($file);
		}
	}

	//Closes directory
	closedir($myDirectory);
?>
	<div class="page-add">
	<form action ="add.php" method ="get">
	<!-- Form add new File-->
	<label for = "fTitle"> File title: </label> <br/>
	<input type = "text" name= "fTitle" id = "fTitle" placeholder="Enter a file name..." value="<?php echo $fTitle;?>" /> <br/>

	<label for="subject" > Subject: </label> <br/> 
	<textarea id ="subject" name="subject" placeholder="Write into file...." style= "height: 200px" value="<?php echo $text;?>"></textarea><br/>
	
	<input type="submit" value ="ADD">
	</form>
		</div>
	</div>
</div>

 </body>
 </html> 
