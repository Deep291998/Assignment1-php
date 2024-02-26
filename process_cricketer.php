<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $country = $_POST['country'];
    $age = $_POST['age'];
    $role = $_POST['role'];
    $matches_played = $_POST['matches_played'];
    $runs_scored = $_POST['runs_scored'];
    $wickets_taken = $_POST['wickets_taken'];

    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "cricket_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql_cricketer = "INSERT INTO cricketers (name, country, age, role) VALUES ('$name', '$country', $age, '$role')";
    if ($conn->query($sql_cricketer) === TRUE) {
        $cricketer_id = $conn->insert_id;

        $sql_stats = "INSERT INTO stats (cricketer_id, matches_played, runs_scored, wickets_taken) VALUES ($cricketer_id, $matches_played, $runs_scored, $wickets_taken)";
        if ($conn->query($sql_stats) === TRUE) {
            echo "New cricketer added successfully";
        } else {
            echo "Error: " . $sql_stats . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $sql_cricketer . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    header("Location: add_cricketer.php");
    exit;
}
?>
