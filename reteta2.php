<?php
    include("connection.php");
    $numea = isset($_GET['numea']) ? $_GET['numea'] : '';

    
    $sql = "SELECT DISTINCT S.StapanID, S.Nume, S.Prenume
            FROM stapani S 
            JOIN animale A ON S.StapanID = A.StapanID
            WHERE A.Nume = '$numea' ";
    
    $resultOwners = mysqli_query($conn, $sql);
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
            <form action="reteta3.php" method="get">
                <input type="hidden" name="numeanimal" value="<?php echo htmlspecialchars($numea); ?>">
                <h2>
                    <?php
                        echo "Numele animalului ales anterior: $numea";
                    ?>
                </h2>
                <select name="stapan_id" required>
                    <?php
                        while ($row = mysqli_fetch_assoc($resultOwners)) {
                            echo "<option value='" . $row['StapanID'] . "'>" . $row['Nume'] . " " . $row['Prenume'] . " (ID: " . $row['StapanID'] . ")</option>";
                        }
                    ?>
                </select>
                
                <button type="submit" class="btn" name="submit">Adauga</button>
            </form>
        </div>

    </body>
</html>