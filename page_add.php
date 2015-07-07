<html>
<head>
<?php
include "mainbook.php";
?>
<link rel="stylesheet" type="text/css" href="lib_class.css">
</head>
<body>

	<div id="class_container">
	        <title>My Contacts</title>
			<div id="header"><h1>Contacts</h1></div>
			<div id="back_button"><a href="page_read.php"><button>Back</button></a></div>
					<div id="list_fill">
					<form action="mainbook.php" method="post">
					First name: <input type="text" name="fname"><br>
					Last name: <input type="text" name="lname"><br>
					Mobile: <input type="text" name="mobile"><br>
					Home No: <input type="text" name="home"><br>
					Email: <input type="text" name="email"><br>
					Street: <input type="text" name="street"><br>
					City: <input type="text" name="city"><br>
					</div>
					
					     <div id="add_contact"><input type="submit" value="Add to contacts" name="submit_contact"></div>

					</form>
					
	</div>
	
	<div id="image"> <img  src="secure sense logo.png"></div>
</body>

</html>