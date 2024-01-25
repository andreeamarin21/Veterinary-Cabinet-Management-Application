<?php
    include("connection.php");

    $nume = $_GET['numes'];
    $prenume = $_GET['prenumes'];

    $sql = "SELECT D.Nume, D.Prenume, P.Data, P.Pret
            FROM stapani S
            JOIN animale A ON A.StapanID = S.StapanID
            JOIN programare P ON A.AnimalID = P.AnimalID
            JOIN doctori D ON P.DoctorID = D.DoctorID
            WHERE S.Nume = '$nume' AND S.Prenume = '$prenume'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $numeDoctor = $row['Nume'];
            $prenumeDoctor = $row['Prenume'];
            $data = $row['Data'];
            $pret = $row['Pret'];
            echo "Nume doctor: $numeDoctor $prenumeDoctor , Data: $data, Pret: $pret" ;
            echo "<br>";
        }
    }else{
        echo "0 results";
    }

?>