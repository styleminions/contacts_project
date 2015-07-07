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
			<div id="button"><a href="page_add.php"><button>Add contact</button></a></div>
				<div id="list"><ul style="list-style-type:none">
				<?php
				$new->read_contact();
				?>
				<!--<li><a href="#">Adam</a></li>
				<li>Adem</li>
				<li>Bishop</li>
				<li>Carl</li>-->
				</ul>
				</div>
			
		</div>
		<div id="image"> <img  src="secure sense logo.png"></div>
</body>
</html>