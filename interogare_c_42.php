<?php
    include("connection.php");

    $proc = $_GET['numep'];

    $sql = "SELECT A.Nume AS NumeAnimal, S.Nume, S.Prenume
            FROM animale A
            JOIN stapani S ON A.StapanID = S.StapanID
            WHERE A.AnimalID IN (
                SELECT DISTINCT P.AnimalID
                FROM programare P
                JOIN servicii_programare SP ON P.ProgramareID = SP.ProgramareID
                JOIN proceduri PR ON SP.ProceduraID = PR.ProceduraID
                WHERE PR.Nume = '$proc'
            )
            GROUP BY A.AnimalID, A.Nume, S.StapanID, S.Nume, S.Prenume";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $numeAnimal = $row['NumeAnimal'];
                $numeS = $row['Nume'];
                $prenume = $row['Prenume'];
                echo "Nume animal: $numeAnimal, stapan: $numeS $prenume" ;
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