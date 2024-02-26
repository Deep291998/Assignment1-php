<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add New Cricketer</title>
<link rel="stylesheet" href="styles.css">

</head>
<body>

<h1>Add New Cricketer</h1>
<?php
echo "<button class='back-button' onclick=\"location.href='index.php'\">Back to Cricketers List</button>";

?>

<div class="add-cricketer-form">
    <form action="process_cricketer.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="country">Country:</label>
        <input type="text" id="country" name="country" required><br><br>

        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required><br><br>

        <label for="role">Role:</label>
        <input type="text" id="role" name="role" required><br><br>

        <label for="matches_played">Matches Played:</label>
        <input type="number" id="matches_played" name="matches_played" required><br><br>

        <label for="runs_scored">Runs Scored:</label>
        <input type="number" id="runs_scored" name="runs_scored" required><br><br>

        <label for="wickets_taken">Wickets Taken:</label>
        <input type="number" id="wickets_taken" name="wickets_taken" required><br><br>

        <input type="submit" value="Add Cricketer">
       
    </form>
    
</div>

</body>
</html>
