<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/WebsiteStyle.CSS">
<head>
<title>Kathryn's Book Blog</title>
<meta http-equiv="content-type" content ="text/html; charset=iso-8859-1" />

<style>
body {
    margin:50px 0px; padding:0px;
    text-align:center;
    align:center;
}
</style>
<style type="text/css">
    .fieldset-auto-width {
         display: inline-block;
    }
</style>
</head>

<h1>Kathryn's Book Blog<br>
Subscriber Submission Page</h1>
<body>
<!--Navigation-->
<div id="nav">
<a href="Index.php">Home</a>
<a href="BookReviews.php">Book Reviews</a>
<a href="Contact.php">Contact</a>
<a href="new.php">Book Finder</a>

<?php
//make a DB connection
$DBConnect = mysqli_connect("127.0.0.1", "KIRVING", "P@ssword1", "kirving");


//if there isnt a DB connection, you need to let the admin know

if($DBConnect === false)
			print"Unable to connection to the database, error number:".mysqli_errno();
			else{
				
				//create the code to say what table we are going to use
				$TableName = "subscribers";
				//now it is time to get the information from the $_POST array
				
				$Firstname = stripslashes($_POST['Firstname']);
				$Lastname = stripslashes($_POST['Lastname']);
				$Email = stripslashes($_POST['Email']);
				$BookRecommendations = $_POST['BookRecommendations'];
		
				
				//now it is time to create the SQL statement
				$SQLstring = "insert into $TableName (Firstname, Lastname, Email, BookRecommendations) 
				values ('$Firstname','$Lastname','$Email', '$BookRecommendations')";
				
				//this is the line of code that executes our SQL statement
				//$QueryResult =mysqli_query($SQLstring,$DBConnect);
				if(mysqli_query($DBConnect,$SQLstring))
					print"<br><br>Thanks for subscribing, your entry has been submitted!<br>";
				else
					print"Error: " . $$SQLstring . "<br>" . mysqli_error($DBConnect);
				
			}//end inner else DB connect
			mysqli_close($DBConnect);
		
	//}//end outter have everything







?>
</body>
</html>