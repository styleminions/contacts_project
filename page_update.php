<html>
<head>
<?php
include "mainbook.php";

//echo $_SESSION['transfer'];
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
		First name: <input type="text" name="fname" value="<?php echo $_SESSION['fname']?>"><br>
		Last name: <input type="text" name="lname" value="<?php echo $_SESSION['lname']?>" ><br>
		Mobile: <input type="text" name="mobile" value="<?php echo $_SESSION['mobile']?>"><br>
		Home No: <input type="text" name="home" value="<?php echo $_SESSION['home']?>"><br>
		Email: <input type="text" name="email" value="<?php echo $_SESSION['email']?>"><br>
		Street: <input type="text" name="street" value="<?php echo $_SESSION['street']?>"><br>
		City: <input type="text" name="city" value="<?php echo $_SESSION['city']?>"><br>
		</div>
			<div id="add_contact">
			<input type ="submit" value="Save" name="update_contact">
			<input type="submit" value="Delete" name="delete_contact" class="delete" onclick="myFunction()" id="confirm">
			</div>


		</form>
	</div>
	
	<div id="image"> <img  src="secure sense logo.png"></div>
</body>
<script>
function myFunction() {
    var x;
    if (confirm("Press a button!") == true) {
        x = "";
    } else {
        x = "";
    }
    document.getElementById("confirm").innerHTML = x;
}
</script>


</html>