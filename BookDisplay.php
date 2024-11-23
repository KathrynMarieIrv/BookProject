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
ul {
  text-align: left;
}
img{
    max-height:300px;
    max-width:300px;
    height:auto;
    width:auto;
}
</style>
<style type="text/css">
    .fieldset-auto-width {
         display: inline-block;
    }
</style>
</head>


<h1>Kathryn's Book Blog<br>
Book Review Display</h1>
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

if($DBConnect == false)
	print"Unable to connect to the database:" .mysqli_errno();
	else {
		//set up the table name 
		$TableName = "books";	
		//this is a wild card selection for everything in the DB
		$ID = stripslashes($_GET['ID']);
		$SQLstring = "Select * from $TableName WHERE ID = $ID";




		$QueryResult = mysqli_query($DBConnect, $SQLstring);
		//check to see if ther are records in table?
		if(mysqli_num_rows($QueryResult)>0)
		{//output all of the results in a dynamic table 
	
	
		$Book = mysqli_fetch_assoc($QueryResult);
		
			
		
		
		}//end num row test
		
		else
			print"There are no results to display";
		
		mysqli_free_result($QueryResult);
	
		//close the else for connection
		}
		
	
	mysqli_close($DBConnect);		
		
?>
<h2>
 <?php echo $Book['Title']?>
</h2>
<br/>
<img src="Photos\<?php echo $Book['BookCover']?>"/>
<hr/>
<h4>
<ul>
	<li>
		<b>Author: </b> <?php echo $Book['Author']?>
	</li><br/>
		<li>
		<b>Page Count: </b> <?php echo $Book['PageCount']?>
	</li><br/>
		<li>
		<b>Genre: </b> <?php echo $Book['Genre']?>
	</li><br/>
		<li>
		<b>Audio book: </b> <?php echo $Book['Audiobook']?>
	</li><br/>
		<li>
		<b>Audiobook Narrator: </b> <?php echo $Book['AudiobookNarrator']?>
	</li><br/>
		<li>
		<b>Audiobook Duration: </b> <?php echo $Book['AudiobookDuration']?>
	</li><br/>
		<li>
		<b>Plot Summary: </b> <?php echo $Book['PlotSummary']?>
	</li><br/>
		<li>
		<b>Book Review: </b> <?php echo $Book['BookReview']?>
	</li><br/>
		<li>
		<b>Rating(out of 10): </b> <?php echo $Book['rating']?>
	</li>
</ul></h4>
</html>