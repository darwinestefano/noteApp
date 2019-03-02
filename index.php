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
	<h1> My Notes </h1>
	<button class="btn-add"> <a href ="add.php"> <i class='material-icons'>add</i></a></button>  
	<table class= "myTable">
	 <thead>
			<tr>
				<th>Filename </th>
				<th>Size <small>(bytes) </small></th>
				<th>Date Modified</th>
		
			</tr>
	</thead>
	
	<tbody>
			<?php 
				//Openup Directory
				$myDirectory = opendir(".");

				//Get entries into an array 
				while($entryName = readdir($myDirectory)){
					$dirArray[] = $entryName;
				}

				//Closes directory
				closedir($myDirectory);

				//Counts elements in the array
				$indexCount = count($dirArray);

				//Sort files
				sort($dirArray);
				//Delete file
				function deletefile($path){
					$path = $path.'.txt';
				if(!unlink($path)){
					echo "You have an error, file not deleted!";
				  } else{
				  header ("Location: index.php");
				  }
				} 
				//Loops through the array of files
				for($index =0; $index<$indexCount; $index++){
					
					//Get File names
					$name = $dirArray[$index];
					$namehref = $dirArray[$index];
				
					//Get files size
					$size = number_format(filesize($dirArray[$index]));

					//Get Date modified
					$modtime=date("M j Y g:i A", filemtime($dirArray[$index]));
					$timekey=date("YmdHis", filemtime($dirArray[$index]));

					//Separate directories 
					if (is_dir($dirArray[$index])){
						$size="&lt;Directory&gt;"; 
						$class="dir";
					  } else {
						$class="file";
					}

					//Clean up and directories 
					if($name=="."){$name=". (Current Directory)"; $extn="&lt;System Dir&gt;";}
					if($name==".."){$name=".. (Parent Directory)"; $extn="&lt;System Dir&gt;";}
					
					//Print out all elements 
					print("
					<tr class='$class'>
					  <td><a href='./$namehref'>$name</a></td>
					  <td><a href='./$namehref'>$size</a></td>
					  <td sorttable_customkey='$timekey'><a href='./$namehref'>$modtime</a></td>
					  <td><a href='edit_file.php?file=$name' class='btn'><i class='material-icons'>description</i></a></td>
					  <td><a href='read_file.php?file=$name' class='btn'><i class='material-icons'>edit</i></a> </td>
					  <td><a href='delete_file.php?file=$name' class='btn'><i class='material-icons'>delete</i></a></td>
					  </td>
					</tr>");
				}
			?>	
	</tbody>
	</table>
			</div>
 </body>
 </html> 

