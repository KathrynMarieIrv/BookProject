<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/WebsiteStyle.css">
<head>
<title>Kathryn's Form</title>
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
Contact Page</h1>
<body>
<!--Navigation-->
<div id="nav">
<a href="Index.php">Home</a>
<a href="BookReviews.php">Book Reviews</a>
<a href="Contact.php">Contact</a>
<a href="new.php">Book Finder</a>

</div>
<br/>
<div id="Photo">
<img id="rcorners" src="kathryn.jpg" alt="Kathryn Photo" style="width:244px;height:326px;"><br/>
</div>	

<form action="websitehandler.php" method="POST">

<h4>Hi, I'm Kathryn! Welcome to my book blog.<br>
I live in San Diego, California and enjoy the city, beach, and a good book.<br>
I lean toward audiobooks (I listen while driving, exercising, etc...) but love a physical book as well.<br>
I've read 40 books as of July 1st 2023 and hope to double it by the New Year!<br>
</h4>


  <fieldset class="fieldset-auto-width">
<div class="form-style1">
<h4>Subscribe to my monthly newsletter and send your book recommendations!</h4>
	<br>
	<b>First Name:</b>
	<input type="text" name="Firstname">
	<br>
	<b>Last Name:</b>
	<input type="text" name="Lastname">
	<br>
	<b>Email Address:</b>
	<input type="text" name="Email">
	<br>
	<b>Book Recommendations:</b>
	<input type="text" name="BookRecommendations">
	<br>
	<br>
	</fieldset>
<br><br>

<br><br>
<div class="form-style2">
<input type="submit" value="Submit"/>
</div>

			
        </div>
		<br/>
</fieldset>

</form>

</html>