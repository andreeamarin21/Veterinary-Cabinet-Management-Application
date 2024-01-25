<?php
    include("connection.php");

    $nume = $_GET['nume'];

    $sql = "SELECT R.Data, R.Pret, D.Nume, D.Prenume
            FROM animale A 
            JOIN reteta R ON A.AnimalID = R.AnimalID
            JOIN programare P ON R.ProgramareID = P.ProgramareID
            JOIN doctori D ON P.DoctorID = D.DoctorID
            WHERE A.Nume = '$nume'
            ORDER BY R.Pret DESC
            LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $data = $row['Data'];
            $pret = $row['Pret'];
            $numeDoctor = $row['Nume'];
            $prenumeDoctor = $row['Prenume'];
            echo "Data:S $data, pret: '$pret', prescrisa de: $numeDoctor $prenumeDoctor" ;
            echo "<br>";
        }
    }else{
        echo "0 results";
    }

?>