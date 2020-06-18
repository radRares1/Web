<?php
	include_once 'dbProp.php';

if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));

}

//take the variables from the post array
 $id = mysqli_real_escape_string($conn,$_POST['id']);
 $title = mysqli_real_escape_string($conn,$_POST['title']);
 $desc = mysqli_real_escape_string($conn,$_POST['desc']);
 $noIng = mysqli_real_escape_string($conn,$_POST['noIng']);
 $type = mysqli_real_escape_string($conn,$_POST['type']);
 $id = (int)$id;
 $noIng = (int)$noIng;

//get the template for the statement
$sql = "UPDATE recepies 
SET title=?,noIng=?,description=?,type=?
WHERE id=?;";


//create the statement
$stmt = mysqli_stmt_init($conn);

//make the custom statement and check for errors
if(!mysqli_stmt_prepare($stmt,$sql)){
	echo "Sql statement failed" . $sql . ":-" . mysqli_error($conn);
}
else{
	
	echo "The recepie was successfully updated !";
	//bind the data to the prepared statement
	mysqli_stmt_bind_param($stmt,"sissi",$title,$noIng,$desc,$type,$id);

	//execute the statement
	mysqli_stmt_execute($stmt);

}

 mysqli_close($conn);


?>