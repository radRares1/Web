<?php
	include_once 'dbProp.php';

if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));

}

//take the variables from the post array
 $name = mysqli_real_escape_string($conn,$_POST['name']);
 $pw = mysqli_real_escape_string($conn,$_POST['pw']);

//prepare the sql statement
$sql="INSERT INTO users (name,pass) VALUES('$name','$pw')";

 if (mysqli_query($conn, $sql)) {
    echo "You have registered succesfully!";
 } else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
 }

 mysqli_close($conn);



?>