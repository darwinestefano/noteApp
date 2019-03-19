<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>MyNotes</title>
	<link rel="stylesheet" href="style.css" />
	<link href="https://fonts.googleapis.com/css?family=Libre+Franklin|Rajdhani|Great+Vibes|Anton|Francois+One|Playfair+Display+SC" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
 <body>
<div id= "page">
	<div class="image-logo"> 
		<img  src="images/notes.png" alt="Avatar">	
	</div>	
<div class= "section">
	<h1> myNotes </h1>
	<a href ="add_file.php" class ="btn" > <i class='material-icons'>add</i></a>  
	<table class= "myTable">
	 <thead>
			<tr>
				<th>Student Id</th>
				<th>Firstname</th>
				<th>Surname</th>
				<th>Surname</th>
				<th>Surname</th>
				<th>Surname</th>
				<th>Surname</th>
				<th>Surname</th>
			</tr>
	</thead>
	
	<tbody>
			<?php 

				foreach (glob("*.txt")as $filename){

					$namehref = $filename;
					
					//Get files size
					$size = number_format(filesize($filename));

					//Get Date modified
					$modtime=date("M j Y g:i A", filemtime($filename));
					$timekey=date("YmdHis", filemtime($filename));

					//Clean up and directories 
					if($filename=="."){$filename=". (Current Directory)"; $extn="&lt;System Dir&gt;";}
					if($filename==".."){$filename=".. (Parent Directory)"; $extn="&lt;System Dir&gt;";}
					
					//Print out name well presented
					$file_name = substr($filename, 0, -4);
					
					 //Print out all elements 
					print("
					<tr>
					  <td>$file_name</td>
					  <td>$size</td>
					  <td sorttable_customkey='$timekey'>$modtime</a></td>
					  <td><a href='read_file.php?file=$filename' class='btn'><i class='material-icons'>description</i></a></td>
					  <td><a href='edit_file.php?file=$filename' class='btn'><i class='material-icons'>edit</i></a> </td>
					  <td><a href='delete_file.php?file=$filename' class='btn'><i class='material-icons'>delete</i></a></td>
					  </td>
					</tr>");
				}	
			?>	
	</tbody>
	</table>
			</div>
 </body>
 </html> 

