<?php
    include("connection.php");

    $sql = "SELECT DISTINCT A.AnimalID, A.Nume as NumeAnimal, S.Nume, S.Prenume
            FROM Animale A 
            INNER JOIN Stapani S ON A.StapanID = S.StapanID";
    $result = mysqli_query($conn, $sql);
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
            <form action="update_animal2.php" method="get">
                <select name="animal_id" required>
                    <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['AnimalID'] . "'>" . $row['NumeAnimal'] . " (Stăpân: " . $row['Nume'] . " " . $row['Prenume'] . ")</option>";
                        }
                    ?>
                </select>
                
                
                <button type="submit" class="btn" name="submit">Modifica</button>
            </form>
        </div>

    </body>
</html>