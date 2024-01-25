<?php
    include("connection.php");

    $nume = $_GET['nume'];

    $sql = "SELECT DISTINCT M.Nume, M.Brand
            FROM animale A
            JOIN reteta R ON A.AnimalID = R.AnimalID
            JOIN continut_reteta CR ON R.RetetaID = CR.RetetaID
            JOIN medicamente M ON CR.MedicamentID = M.MedicamentID
            WHERE A.Nume = '$nume'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $numeMedicament = $row['Nume'];
            $brand = $row['Brand'];
            echo "Medicament: $numeMedicament, brand: $brand" ;
            echo "<br>";
        }
    }else{
        echo "0 results";
    }

?>