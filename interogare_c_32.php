<?php
    include("connection.php");

    $nume = $_GET['numes'];
    $prenume = $_GET['prenumes'];

    $sql = "SELECT P.Data, P.Pret, D.Nume, D.Prenume
            FROM stapani S
            JOIN animale A ON S.StapanID = A.StapanID
            JOIN programare P ON A.AnimalID = P.AnimalID
            JOIN doctori D ON P.DoctorID = D.DoctorID
            WHERE S.Nume = '$nume' AND S.Prenume = '$prenume' 
            AND A.Varsta = (SELECT MAX(Varsta)
                            FROM animale
                            WHERE StapanID = S.StapanID)
            ORDER BY P.Data DESC
            LIMIT 1";
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