<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cricketers List</title>


<link rel="stylesheet" href="styles.css">

</head>
<body>

<h1>Cricketer Information</h1>

<div class="cricketer-list">
<?php
$servername = "sql301.infinityfree.com";
$username = "if0_36050024";
$password = "Na5khyz3qDw70F";
$dbname = "if0_36050024_cricket_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT cricketers.id, cricketers.name, cricketers.country, cricketers.age, cricketers.role, stats.matches_played, stats.runs_scored, stats.wickets_taken
        FROM cricketers 
        JOIN stats  ON cricketers.id = stats.cricketer_id";
$result = $conn->query($sql);
echo "<button class='add-button' onclick=\"location.href='add_cricketer.php'\">Add New Cricketer</button>";


if ($result->num_rows > 0) {
  echo "<table border='1'>";
  echo "<tr><th>Name</th><th>Country</th><th>Age</th><th>Role</th><th>Matches Played</th><th>Runs Scored</th><th>Wickets Taken</th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td><a href='cricketer_details.php?id=".$row["id"]."'>".$row["name"]."</a></td>";
    echo "<td>".$row["country"]."</td>";
    echo "<td>".$row["age"]."</td>";
    echo "<td>".$row["role"]."</td>";
    echo "<td>".$row["matches_played"]."</td>";
    echo "<td>".$row["runs_scored"]."</td>";
    echo "<td>".$row["wickets_taken"]."</td>";
   
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "No cricketers found";
}
$conn->close();
?>
</div>

</body>
</html>
