<?php
	include_once 'dbProp.php';

if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));

}

//take the variables from the post array
 $type = mysqli_real_escape_string($conn,$_GET['type']);
 
//get the template for the statement
$sql = "SELECT * FROM recepies WHERE type =?;";

//create the statement
$stmt = mysqli_stmt_init($conn);

//make the custom statement and check for errors
if(!mysqli_stmt_prepare($stmt,$sql)){
	echo "Sql statement failed" . $sql . ":-" . mysqli_error($conn);
}
else{
	
	echo "Here is the filtered data!";
	//bind the data to the prepared statement
	mysqli_stmt_bind_param($stmt,"s",$type);

	//execute the statement
	mysqli_stmt_execute($stmt);

	$result = mysqli_stmt_get_result($stmt);

	echo "<table border='1'>
	<tr>
	<th>id</th>
	<th>title</th>
	<th>no of Ingredients</th>
	<th>description</th>
	<th>type</th>
	</tr>";
	while($row = mysqli_fetch_assoc($result)){	
			echo "<tr>";
			echo "<td>" . $row['id'] . "</td>";
			echo "<td>" . $row['title'] . "</td>";
			echo "<td>" . $row['noIng'] . "</td>";
			echo "<td>" . $row['description'] . "</td>";
			echo "<td>" . $row['type'] . "</td>";
			echo "</tr>";
		}
	echo "</table>";

}

 mysqli_close($conn);


?>