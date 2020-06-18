<?php
	include_once 'dbProp.php';
?>


<?php

if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$name = mysqli_real_escape_string($conn,$_POST['name']);
$pass = mysqli_real_escape_string($conn,$_POST['pw']);

//get the template for the statement
$sql = "SELECT * FROM users WHERE name =? AND pass=?;";

//create the statement
$stmt = mysqli_stmt_init($conn);

//make the custom statement and check for errors
if(!mysqli_stmt_prepare($stmt,$sql)){
	echo "Sql statement failed" . $sql . ":-" . mysqli_error($conn);
}
else{
	
	//bind the data to the prepared statement
	mysqli_stmt_bind_param($stmt,"ss",$name,$pass);


	//execute the statement
	mysqli_stmt_execute($stmt);

	$result = mysqli_stmt_get_result($stmt);

    echo mysqli_num_rows($result)!=0;
}

mysqli_close($conn);
?>