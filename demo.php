<?php
$server_name="localhost";
$username="webproject";
$password="Kiran@1234";
$database_name="database123";

$conn=mysqli_connect($server_name,$username,$password,$database_name);
//now check the connection
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());

}

if(isset($_POST['save']))
{	
	 $name = $_POST['name'];
	 $email = $_POST['email'];
	 $phone = $_POST['phone'];
     $mode = $_POST["mode"];

	 $sql_query = "INSERT INTO demo (fname,email,phone,mode)
	 VALUES ('$name','$email','$phone','$mode')";

	 if (mysqli_query($conn, $sql_query)) 
	 {
        header("Location: thank_you.html"); 

	 } 
	 else
     {
		echo "Error: " . $sql . "" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>

