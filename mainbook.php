<?php

session_start();

//using OO PHP by creating contact class 
class contacts{
	public $fname;
	public $lname;
	public $email;
	public $mobile;
	public $home;
	public $street;
	public $city;
	public $user_name;
	public $password;
	public $database;
	public $server;
	
	
	
	function __construct($a,$b,$c,$d,$e,$f,$g){
		$this -> fname = $a;
		$this -> lname = $b;
		$this -> email = $c;
		$this -> mobile = $d;
		$this -> home = $e;
		$this -> street = $f;
		$this -> city = $g;
		
		//these variables are for connecting to the database in the individual methods created
			$this ->user_name = "root";
			$this ->password = "";
			$this ->database = "addressbook";
			$this ->server = "127.0.0.1";
		
	}

	function read_contact(){
//this method allows the user to see all their contacts in the database in alphabetical order

$this ->db_handle = mysql_connect($this ->server, $this ->user_name, $this ->password);
$this ->db_found = mysql_select_db($this ->database, $this ->db_handle);

	$this ->sqa = "SELECT * FROM contact ORDER BY fname ASC";
	$this->result = mysql_query($this->sqa);
	    $this->resulta = mysql_fetch_assoc($this->result);
	mysql_close($this->db_handle);	
		
	//loop through query result using get method with the contact id as the href link		
	do{
	echo '<a href="?transfer='.$this->resulta['c_id'].'"<li>'.$this->resulta['fname'].' '.$this->resulta['lname'].'</li></a><br>';
}while($this->resulta = mysql_fetch_assoc($this->result));
		
	}
	
	
	
	function add_contact(){
	// this method allows the user to add a new contact into the database

        $fname= $this ->fname;
        $lname= $this ->lname;
        $email= $this ->email;
        $mobile= $this ->mobile;
        $home= $this ->home;
        $street= $this ->street;
        $city= $this ->city;
		
		


		$this ->db_handle = mysql_connect($this ->server, $this ->user_name, $this ->password);
		$this ->db_found = mysql_select_db($this ->database, $this ->db_handle);
		
		$this->sqli = "INSERT INTO contact (fname, lname, email, mobile, home, street, city) VALUES ('$fname', '$lname', '$email', '$mobile', '$home', '$street', '$city')";
	    $this->insert = mysql_query($this->sqli);
		mysql_close($this->db_handle);	
		
		
	}
	
	function update_contact(){
//this method will allow the user to update the contact info to the database

$this ->db_handle = mysql_connect($this ->server, $this ->user_name, $this ->password);
$this ->db_found = mysql_select_db($this ->database, $this ->db_handle);

		$fname= $this ->fname;
        $lname= $this ->lname;
        $email= $this ->email;
        $mobile= $this ->mobile;
        $home= $this ->home;
        $street= $this ->street;
        $city= $this ->city;
		global $transfer;
		$id= $transfer;
		
	
	   
		$this->sql = "UPDATE contact SET fname ='$fname', lname='$lname', email='$email', mobile='$mobile', home='$home', street='$street', city='$city' WHERE c_id ='$id'";
	    $this->update = mysql_query($this->sql);
		//mysql_close($this->db_handle);		
	}
	
	function delete_contact(){
// this method will let the user to delete the specific contact info from the database
$this ->db_handle = mysql_connect($this ->server, $this ->user_name, $this ->password);
$this ->db_found = mysql_select_db($this ->database, $this ->db_handle);
	global $transfer;
	$part = $transfer;
	
	$this->sqld = "DELETE FROM contact WHERE c_id ='$part'";
		$this->delete = mysql_query($this->sqld);
		
		$various = 78;
		$variousa = 4474;
		return array($various,$variousa);
		
	}
	
	function auto_fill(){
//this method will pull out all the information of a specific contact and auto populate the webpage for the user to read/update 
    global $transfer;
	//$part = $transfer;


$this ->db_handle = mysql_connect($this ->server, $this ->user_name, $this ->password);
$this ->db_found = mysql_select_db($this ->database, $this ->db_handle);

	$this ->sqa = "SELECT * FROM contact WHERE c_id='$transfer'";
	$this->result = mysql_query($this->sqa);
	$this->resulta = mysql_fetch_assoc($this->result);
	return array($this->resulta['fname'],$this->resulta['lname'],$this->resulta['email'],$this->resulta['mobile'],$this->resulta['home'],$this->resulta['street'],$this->resulta['city']);
	mysql_close($this->db_handle);
	}
	
}


//End of contact class

//creating object to run the [read contact()] method
$new = new contacts('','','','','','','');


// collect new contact information from html and run class method
if(isset($_POST['submit_contact'])){
	
$new = new contacts($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['mobile'],$_POST['home'],$_POST['street'],$_POST['city']);
$new->add_contact();
header ("Location: page_read.php");

}

if(isset($_POST['update_contact'])){

$transfer = $_SESSION['transfer'];	
$new = new contacts($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['mobile'],$_POST['home'],$_POST['street'],$_POST['city']);

$new->update_contact();
header ("Location: page_read.php");


}

// use contact id in session variable in the delete contact method
if(isset($_POST['delete_contact'])){

$transfer = $_SESSION['transfer'];	
$new = new contacts('','','','','','','');
//$new = new contacts($_POST['fname'],$_POST['lname'],$_POST['email'],$_POST['mobile'],$_POST['home'],$_POST['street'],$_POST['city']);
$new->delete_contact();
header ("Location: page_read.php");

}

//acquire contact id from the get method and insert into a session variable  to be used for the auto fill method
if(isset($_GET['transfer'])){
	
	$_SESSION['transfer']= $_GET['transfer'];
	$transfer = $_SESSION['transfer'];
	echo $_SESSION['transfer'];
	$new = new contacts('','','','','','','');
	$new->auto_fill();
	list($fname,$lname,$email,$mobile,$home,$street,$city) = $new->auto_fill();
	
	if($mobile==0){
		$mobile="";
	}
	
	if($home==0){
		$home="";
	}
	
	if($home==0 && $street==0 && $city==0 ){
		$home="";
		$street="";
	   $city="";
	}
	
	
	$_SESSION['fname'] = $fname;
	$_SESSION['lname'] = $lname;
	$_SESSION['email'] = $email;
	$_SESSION['mobile'] = $mobile;
	$_SESSION['home'] = $home;
	$_SESSION['street'] = $street;
	$_SESSION['city'] = $city;
	header ("Location: page_update.php");
	
}



?>

