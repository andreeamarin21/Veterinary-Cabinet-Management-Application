<?php
    include("connection.php");

    $data = $_GET['datain'];

    $year = date('Y', strtotime($data));
    $month = date('m', strtotime($data));
    $day = date('d', strtotime($data));

    $sql = "SELECT DISTINCT A.AnimalID, A.Nume
            FROM animale A
            JOIN programare P ON A.AnimalID = P.AnimalID
            WHERE YEAR(P.Data) = '$year' AND MONTH(P.Data) = '$month' AND DAY(P.Data) = '$day'";


    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "Nume: " . $row["Nume"] . " ";
            echo "<br>";  
        }
    }else{
        echo "0 results";
    }
?>
