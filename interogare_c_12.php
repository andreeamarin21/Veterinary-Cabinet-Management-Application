<?php
    include("connection.php");

    $nume = $_GET['nume'];

    $sql = "SELECT M.Nume, M.Brand, M.Pret
            FROM medicamente M 
            JOIN continut_reteta CR ON M.MedicamentID = CR.MedicamentID
            WHERE CR.RetetaID = (
                SELECT R.RetetaID
                FROM reteta R 
                JOIN animale A ON R.AnimalID = A.AnimalID
                WHERE A.Nume = '$nume'
                ORDER BY R.Pret DESC
                LIMIT 1
            )";
    $result = mysqli_query($conn, $sql);


    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $numeMedicament = $row['Nume'];
                $brand = $row['Brand'];
                $pret = $row['Pret'];
                echo "Nume medicament: $numeMedicament, brand: $brand, pret: $pret" ;
                echo "<br>";
            }
        } else {
            echo "0 results";
        }
    } else {
        // Aici poți afișa detalii despre eroare pentru a identifica problema
        echo "Error in query: " . mysqli_error($conn);
    }

?>