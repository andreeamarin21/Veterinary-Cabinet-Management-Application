<?php
    include("connection.php");
    $animal_id = isset($_GET['animal_id']) ? $_GET['animal_id'] : '';

    $sql_animal = "SELECT A.Nume AS NumeAnimal, A.StapanID, S.Nume, S.Prenume, A.Varsta, A.Sex, A.Greutate, A.Specie, A.Rasa
                   FROM animale A
                   INNER JOIN stapani S ON A.StapanID = S.StapanID
                   WHERE A.AnimalID = '$animal_id'";

    $result_animal = mysqli_query($conn, $sql_animal);

    $row_animal = mysqli_fetch_assoc($result_animal);

    if (!empty($row_animal)) {
        $nume_animal = $row_animal['NumeAnimal'];
        $stapan_id_curent = $row_animal['StapanID'];
        $varsta_curent = $row_animal['Varsta'];
        $sex_curent = $row_animal['Sex'];
        $greutate_curent = $row_animal['Greutate'];
        $specie_curent = $row_animal['Specie'];
        $rasa_curent = $row_animal['Rasa'];
    } else {
        echo "Nu s-au găsit date pentru animal.";
    }

    $sql_stapani = "SELECT StapanID, Nume, Prenume FROM stapani";
    $result_stapani = mysqli_query($conn, $sql_stapani);
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
    <form action="update_animal3.php" method="post">
            <input type="hidden" name="animal_id" value="<?php echo htmlspecialchars($animal_id); ?>">

            <label for="nume_animal">Nume Animal:</label>
            <input type="text" name="nume_animal" value="<?php echo htmlspecialchars($nume_animal); ?>" required><br>

            <label for="stapan_id">Stăpân:</label>
            <select name="stapan_id" required>
                <?php
                    while ($row_stapan = mysqli_fetch_assoc($result_stapani)) {
                        $id_stapan = $row_stapan['StapanID'];
                        $nume_stapan = $row_stapan['Nume'];
                        $prenume_stapan = $row_stapan['Prenume'];
                        $selected = ($stapan_id_curent == $id_stapan) ? 'selected' : '';
                        echo "<option value='$id_stapan' $selected>$nume_stapan $prenume_stapan</option>";
                    }
                ?>
            </select><br>
            <label for="varsta">Vârstă:</label>
            <input type="text" name="varsta" value="<?php echo htmlspecialchars($varsta_curent); ?>" required><br>
            <label for="sex">Sex:</label>
            <input type="text" name="sex" value="<?php echo htmlspecialchars($sex_curent); ?>" required><br>
            <label for="greutate">Greutate:</label>
            <input type="text" name="greutate" value="<?php echo htmlspecialchars($greutate_curent); ?>" required><br>
            <label for="specie">Specie:</label>
            <input type="text" name="specie" value="<?php echo htmlspecialchars($specie_curent); ?>" required><br>
            <label for="rasa">Rasă:</label>
            <input type="text" name="rasa" value="<?php echo htmlspecialchars($rasa_curent); ?>" required><br>

            <button type="submit" class="btn" name="submit">Actualizează</button>
        </form>
    </div>
</body>
</html>