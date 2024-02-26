<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cricketer Details</title>
<link rel="stylesheet" href="styles.css">

</head>
<body>

<h1>Cricketer Details</h1>

<div class="details">
<?php
if(isset($_GET['id'])) {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "cricket_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $cricketerId = $_GET["id"];
    $sql = "SELECT cricketers.name, cricketers.country, cricketers.age, cricketers.role, stats.matches_played, stats.runs_scored, stats.wickets_taken
            FROM cricketers 
            JOIN stats  ON cricketers.id = stats.cricketer_id
            WHERE cricketers.id = $cricketerId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<p><strong>Name:</strong> " . $row["name"] . "</p>";
        echo "<p><strong>Country:</strong> " . $row["country"] . "</p>";
        echo "<p><strong>Age:</strong> " . $row["age"] . "</p>";
        echo "<p><strong>Role:</strong> " . $row["role"] . "</p>";
        echo "<p><strong>Matches Played:</strong> " . $row["matches_played"] . "</p>";
        echo "<p><strong>Runs Scored:</strong> " . $row["runs_scored"] . "</p>";
        echo "<p><strong>Wickets Taken:</strong> " . $row["wickets_taken"] . "</p>";
        echo "<a href='index.php'>Back to Cricketers List</a>";
    } else {
        echo "Cricketer not found";
    }
    $conn->close();
} else {
    echo "ID not provided";
}
?>
</div>

</body>
</html>
