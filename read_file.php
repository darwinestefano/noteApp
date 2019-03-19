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
    <div class = "section">
         <h1> Description </h1>
	
         <?php
                    //Opens directory 
                    $myDirectory = opendir("./");
                    //Display directory
		
                    if(isset($_GET['file'])) 
                    { 
                         $filename = $_GET['file']; 
						 $file_name = substr($filename, 0, -4);
                         $fileReader = fopen($filename,'r') or die("Unable to open file!");
                         $data = fread($fileReader,filesize($filename));
                        fclose($fileReader);
                    }
                    //Closes directory
                    closedir($myDirectory);
            ?>
      
       
	<div class="page-add">
        
         <form action="read_file.php" method="GET" >
	    <label for = "fTitle"> File title: </label> <br/>
	    <input type = "text" name= "fTitle" id = "fTitle" placeholder="Enter a file name..." value =" <?php  echo $file_name; ?>">  <br/> 
	    <label for="subject" > Subject: </label> <br/> 
         <textarea id ="subject" name="subject" placeholder="Write into file...." rows="20">  <?php echo $data; ?> </textarea> <br/>
        
	    </form>

     </div>
	</div>
</div>

 </body>
 </html> 
