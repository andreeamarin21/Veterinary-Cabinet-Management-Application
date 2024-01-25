<?php
    include("connection.php");

    $stapanid = $_GET['stapan_id'];

    $sql = "SELECT StapanID, Nume, Prenume, Telefon, Adresa, CNP
            FROM stapani
            WHERE StapanID = '$stapanid'";
    $result = mysqli_query($conn, $sql);
    $row_stapan = mysqli_fetch_assoc($result);

    if(!empty($row_stapan)){
        $nume_curent = $row_stapan['Nume'];
        $prenume_curent = $row_stapan['Prenume'];
        $telefon_curent = $row_stapan['Telefon'];
        $adresa_curent = $row_stapan['Adresa'];
        $cnp_curent = $row_stapan['CNP'];
    }else {
        echo "Nu s-au găsit date pentru stapan.";
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
    <form action="update_stapan3.php" method="post">
            <input type="hidden" name="stapan_id" value="<?php echo htmlspecialchars($stapanid); ?>">
            <h1>Stapan</h1>
            <label for="nume">Nume:</label>
            <input type="text" name="nume" value="<?php echo htmlspecialchars($nume_curent); ?>" required><br>

            <label for="prenume_curent">Prenume:</label>
            <input type="text" name="prenume" value="<?php echo htmlspecialchars($prenume_curent); ?>" required><br>

            <label for="telefon">Telefon:</label>
            <input type="text" name="telefon" value="<?php echo htmlspecialchars($telefon_curent); ?>" required><br>

            <label for="adresa">Adresa:</label>
            <input type="text" name="adresa" value="<?php echo htmlspecialchars($adresa_curent); ?>" required><br>

            <label for="cnp">CNP:</label>
            <input type="text" name="cnp" value="<?php echo htmlspecialchars($cnp_curent); ?>" required><br>

            <button type="submit" class="btn" name="submit">Actualizează</button>
        </form>
    </div>
</body>
</html>