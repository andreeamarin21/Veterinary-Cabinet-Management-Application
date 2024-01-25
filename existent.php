<?php
include("connection.php");



// Fetch pet owners from the database
$sqlOwners = "SELECT StapanID, Nume, Prenume FROM stapani";
$resultOwners = mysqli_query($conn, $sqlOwners);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nume = $_POST["animal_name"];
    $stapanID = $_POST["stapan_id"];
    $varsta=$_POST['varsta'];
    $sex=$_POST['sex'];
    $greutate=$_POST['greutate'];
    $specie=$_POST['specie'];
    $rasa=$_POST['rasa'];

    // Perform the insertion into the 'animale' table
    $sql = "INSERT INTO animale (StapanID,Nume,Varsta,Sex,Greutate,Specie,Rasa) 
            VALUES ('$stapanID','$nume','$varsta','$sex','$greutate','$specie','$rasa')";

    if (mysqli_query($conn, $sql)) {
        header("Location:success_insert.php");
    } else {
        echo "Error: " . $sqlInsert . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Proiect</title>
        <link rel="stylesheet" href="style.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
    <h2>Add Animal</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="input-box">
                <input type="text" name="animal_name" placeholder="Nume animal" required>
        </div>
        <label for="stapan_id">Owner:</label>
        <select name="stapan_id" required>
            <?php
            // Populate the dropdown list with pet owners
            while ($row = mysqli_fetch_assoc($resultOwners)) {
                echo "<option value='" . $row['StapanID'] . "'>" . $row['Nume'] . " " . $row['Prenume'] .  "</option>";
            }
            ?>
        </select>
        <div class="input-box">
            <input type="text" name="varsta" placeholder="Varsta">
        </div>
        <div class="input-box">
            <input type="text" name="sex" placeholder="Sex(M/F)">
        </div>
        <div class="input-box">
            <input type="text" name="greutate" placeholder="Greutate">
        </div>
        <div class="input-box">
            <input type="text" name="specie" placeholder="Specie">
        </div>
        <div class="input-box">
            <input type="text" name="rasa" placeholder="Rasa">
        </div>
        <button type="submit" class="btn" name="submit">Adauga</button>
    </form>
    </div>
</body>
</html>

