<?php
    include("connection.php");

    $nume = $_GET['numed'];
    $prenume = $_GET['prenumed'];

    $sql = "SELECT *
            FROM (
                SELECT R.RetetaID, P.Data, R.Pret, A.Nume
                FROM reteta R
                JOIN programare P ON R.ProgramareID = P.ProgramareID
                JOIN doctori D ON P.DoctorID = D.DoctorID
                JOIN animale A ON A.AnimalID = R.AnimalID
                WHERE D.Nume = '$nume' AND D.Prenume = '$prenume'
            ) AS RetetaRecenta
            ORDER BY Data DESC
            LIMIT 1";
    $result = mysqli_query($conn, $sql);


    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $numeAnimal = $row['Nume'];
                $data = $row['Data'];
                $pret = $row['Pret'];
                echo "Nume animal: $numeAnimal, Data: $data, Pret: $pret" ;
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