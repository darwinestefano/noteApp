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
			<?php
		//Variables
			$fTitle =" "; 
			$errors = array ();
			$subject =" ";

		//validate data 
		function validate_input($data){
			$data = trim($data);
			$data = htmlspecialchars($data);
			return $data;
		}

			//Get inputs and validate
		if (($_SERVER["REQUEST_METHOD"] == "POST")){
				
				//Openup Directory
				$myDirectory = opendir(".");
				
				if (empty($_POST["fTitle"])) {
					array_push($errors, "File cannot be created - File name is required");
				} 	
				else {
					$fTitle = validate_input($_POST["fTitle"]);
				}
				
				if (empty($_POST["subject"])) {
					array_push($errors, "Subject is required");
				} 	
				else {
					$subject = validate_input($_POST["subject"]);
				}
						
					if (count($errors) == 0)
					{
						//Get path
						$path = getcwd();

						//File name 
						$fName = $fTitle.'.txt';

						//Checking file existence 
						if(!file_exists($fName)){	
							$file = fopen( $fName, "w") or die("Unable to open file!");
							if($file){
								fwrite ($file, $subject);
								array_push($errors, "File created successfully!");
								fclose($file);
							}
						}else {
							array_push($errors, "File be cannot created  - File already exists!");
						}
					}
					//Closes directory
						closedir($myDirectory);
			}
			
		?>
	<div class="page-add">
	<form action ="add_file.php" method ="POST">
	<!-- Form add new File-->
	<label for = "fTitle"> File title: </label> <br/>
	<input type = "text" name= "fTitle" id = "fTitle" placeholder="Enter a file name..."S />  <br/>

	<label for="subject" > Subject: </label> <br/> 
	<textarea id ="subject" name="subject" placeholder="Write into file...." rows="20"> </textarea><br/>
	
	<input type="submit" value ="SAVE">
	</form>
		<?php 
				foreach($errors as $error){
				echo "<h5>Status:   ".$error . " </h5><br />";
				}				
			
		?>
		</div>
	</div>
</div>

 </body>
 </html> 
