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
Search Results Page</h1>
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

if($DBConnect == false) {
	print"Unable to connect to the database:" .mysqli_errno();}
	else {
		//set up the table name 
		$TableName = "books";
		$query = ($_POST['query']);
		
		
		
			$SQLstring = "select * from books where Title like '%$query%'
							  union select * from books where Author like '%$query%'
							  union select * from books where PageCount like '%$query%'
							  union select * from books where Genre like '%$query%'
							  union select * from books where Audiobook like '%$query%'
							  union select * from books where AudiobookNarrator like '%$query%'
							  union select * from books where AudiobookDuration like '%$query%'
							  union select * from books where PlotSummary like '%$query%'
							  union select * from books where BookReview like '%$query%'
							  union select * from books where rating like '%$query%'
							  union select * from books where BookCover like '%$query%';";
							  
			$QueryResult = mysqli_query($DBConnect, $SQLstring);
			
		//check to see if ther are records in table?
			if(mysqli_num_rows($QueryResult)>0) {
				
		print"<br><br><h4>Here is your search result:</h4><br><br>";

print "<table width ='100%' border='1'>
<tr><th>ID</th><th>Title</th><th>Author</th><th>PageCount</th><th>Genre</th><th>Audiobook</th></tr>";
		

while($Row = mysqli_fetch_assoc($QueryResult)){

			
		print"<tr><td><a href='BookDisplay.php?ID={$Row['ID']}' target='_blank'>{$Row['ID']}</a></td><td>{$Row['Title']}</td><td>{$Row['Author']}</td><td>{$Row['PageCount']}</td>
			<td>{$Row['Genre']}</td><td>{$Row['Audiobook']}</td></tr>";

}
} else {
	print "0 records";
}
	}
	print"</table>";
		mysqli_close($DBConnect);
		
?>
</body>
</html>