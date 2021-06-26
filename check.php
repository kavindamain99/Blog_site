<?php 
include ('db.php');
?>


<?php 


$sql = "SELECT title,description  FROM posts";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>title</th><th>description</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["title"]. " " . $row["description"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>


?>