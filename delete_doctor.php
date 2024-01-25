<?php
    include("connection.php");

    $sql = "SELECT DISTINCT DoctorID, Nume, Prenume
            FROM doctori";
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
            <form action="delete_doctor2.php" method="post">
                <label for="doctorid">Doctor:</label> 
                <select name="doctorid" required>
                    <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['DoctorID'] . "'>" . $row['Nume'] . "  " . $row['Prenume'] . " </option>";
                        }
                    ?>
                </select>
                
                
                <button type="submit" class="btn" name="submit">Sterge</button>
                <h3>
                    (!vor fi șterse toate programările și rețetele asociate)
                </h3>
            </form>
        </div>

    </body>
</html>