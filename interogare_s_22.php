<?php
    include("connection.php");

    $nume = $_GET['numed'];
    $prenume = $_GET['prenumed'];

    $sql = "SELECT DISTINCT A.Nume AS NumeAnimal, S.Nume, S.Prenume  
            FROM stapani S
            INNER JOIN animale A ON S.StapanID = A.StapanID
            INNER JOIN programare P ON A.AnimalID = P.AnimalID
            INNER JOIN doctori D ON P.DoctorID = D.DoctorID
            WHERE D.Nume = '$nume' AND D.Prenume = '$prenume'";
            
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $numeAnimal = $row['NumeAnimal'];
            $numeStapan = $row['Nume'];
            $prenumeStapan = $row['Prenume'];
            echo "Nume animal: $numeAnimal, Stapan: $numeStapan $prenumeStapan" ;
            echo "<br>";
        }
    }else{
        echo "0 results";
    }

?>