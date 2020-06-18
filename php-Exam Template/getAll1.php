<?php
	include_once 'dbProp.php';
?>

<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body>

<?php

if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$sql="SELECT * FROM recepies;";
$result = mysqli_query($conn,$sql);

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
			echo "<td><button class='deleteButton' >delete</button></td>";
			echo "<td><button class='updateButton' >update</button></td>";
			echo "</tr>";

		}
	echo "</table>";

mysqli_close($conn);
?>
</body>
</html>