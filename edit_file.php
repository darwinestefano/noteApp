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
	<h1> Edit note </h1>
	
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
	
	//Openup Directory
    $myDirectory = opendir("./");
    
    //read file
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        
        $read_file = $_GET['file'];
        $fileReader = fopen($read_file,'r') or die("Unable to open file!");
        $data = fread($fileReader,filesize($read_file));
        fclose($fileReader);
		
	//write to a file
    } else if ($_SERVER["REQUEST_METHOD"] == "POST"){
         
				if (empty($_POST["fTitle"])) {
					array_push($errors, "File name is required");
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
					
							$file = fopen( $fTitle, "w") or die("Unable to open file!");
							if($file){
								fwrite ($file, $subject);
								fclose($file);
							}
						
						
					}
    
    }
    //Closes directory
    closedir($myDirectory);

?>
	<div class="page-add">
   <form action="edit_file.php" method="POST" >
	<label for = "fTitle"> File title: </label> <br/>
	<input type = "text" name= "fTitle" id = "fTitle" placeholder="Enter a file name..." value =" <?php  if (isset($_GET ['file'])) {echo $read_file;} ?>">  <br/> 
	<label for="subject" > Subject: </label> <br/> 
    <textarea id ="subject" name="subject" placeholder="Write into file...." rows="20">  <?php if (isset($_GET ['file'])) {echo $data;} ?> </textarea> <br/>
    <input type="submit"  value ="SAVE NEW">
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
