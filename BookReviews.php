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
Book Reviews Page</h1>
<body>
<!--Navigation-->
<div id="nav">
<a href="Index.php">Home</a>
<a href="BookReviews.php">Book Reviews</a>
<a href="Contact.php">Contact</a>
<a href="new.php">Book Finder</a>

<table width ='100%' border='1'>

<th><a href="BookReviews.php?sort=ID">ID:</a></th>
<th><a href="BookReviews.php?sort=Title">Title:</a></th>
<th><a href="BookReviews.php?sort=Author">Author:</a></th>
<th><a href="BookReviews.php?sort=PageCount">Page Count:</a></th>
<th><a href="BookReviews.php?sort=Genre">Genre:</a></th>
<th><a href="BookReviews.php?sort=Audiobook">Audiobook:</a></th>



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
		$SQLstring = "Select * from $TableName";
		$sortby = isset($_GET['sort']) ? $_GET['sort'] : '';
        $sortOrder = isset($_GET['order']) ? $_GET['order'] : 'ASC';

if ($sortby =='ID')
{
	$SQLstring .= "ORDER BY ID";
}
elseif($sortby == 'Title')
{
    $SQLstring .= " ORDER BY Title";
}
elseif ($sortby == 'Author')
{
    $SQLstring .= " ORDER BY Author";
}
elseif ($sortby == 'PageCount')
{
    $SQLstring .= " ORDER BY PageCount";
}
elseif($sortby == 'Genre')
{
    $SQLstring .= " ORDER BY Genre";
}
elseif($sortby == 'Audiobook')
{
    $SQLstring .= " ORDER BY Audiobook";
}


$QueryResult = mysqli_query($DBConnect, "SELECT COUNT(*) AS `ID` FROM `books`");
$Row = mysqli_fetch_array($QueryResult);
$count = $Row['ID'];
print"<h1>Number of Books Reviewed: $count</h1>";

		$QueryResult = mysqli_query($DBConnect, $SQLstring);
		//check to see if ther are records in table?
		if(mysqli_num_rows($QueryResult)>0)
		{//output all of the results in a dynamic table 
	
	
		while($Row = mysqli_fetch_assoc($QueryResult))
		{
			//this is the dynamic part of our table
	
			print"<tr><td><a href='BookDisplay.php?ID={$Row['ID']}' target='_blank'>{$Row['ID']}</a></td><td>{$Row['Title']}</td><td>{$Row['Author']}</td><td>{$Row['PageCount']}</td>
			<td>{$Row['Genre']}</td><td>{$Row['Audiobook']}</td></tr>";
			
			//<td>{$Row['AudiobookNarrator']}</td><td>{$Row['AudiobookDuration']}</td>
			//<td>{$Row['PlotSummary']}</td><td>{$Row['BookReview']}</td><td>{$Row['rating']}</td><td>{$Row['BookCover']}</td>
			
		}//end while statement
		
		
		}//end num row test
		
		else
			print"There are no results to display";
		
		mysqli_free_result($QueryResult);
	
		//close the else for connection
		}
		
	
	mysqli_close($DBConnect);

		
	
?>
</body>
</html>