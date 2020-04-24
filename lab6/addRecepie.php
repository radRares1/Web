<?php
	include_once 'dbProp.php';

if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));

}

//take the variables from the post array
 $title = mysqli_real_escape_string($conn,$_POST['title']);
 $noIng = mysqli_real_escape_string($conn,$_POST['noIng']);
 $noIng = (int)$noIng;
 $description = mysqli_real_escape_string($conn,$_POST['desc']);
 $type = mysqli_real_escape_string($conn,$_POST['type']);

//prepare the sql statement
$sql="INSERT INTO recepies (title,noIng,description,type) VALUES('$title','$noIng','$description','$type')";

 if (mysqli_query($conn, $sql)) {
    echo "New record has been added successfully !";
 } else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
 }

 mysqli_close($conn);



?>