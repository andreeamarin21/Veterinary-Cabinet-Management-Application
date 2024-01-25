<?php
    include("connection.php");

    $programare_id = $_GET['programareid'];

    $sql = "DELETE CR
            FROM continut_reteta CR
            INNER JOIN reteta R ON CR.RetetaID = R.RetetaID
            WHERE R.ProgramareID = '$programare_id'";
    $result = mysqli_query($conn, $sql);

    $sql = "DELETE 
            FROM reteta 
            WHERE ProgramareID = '$programare_id'";
    $result = mysqli_query($conn, $sql);

    $sql = "DELETE
            FROM servicii_programare
            WHERE ProgramareID = '$programare_id'";  
    $result = mysqli_query($conn, $sql);

    $sql = "DELETE
            FROM programare
            WHERE ProgramareID = '$programare_id'";
    $result = mysqli_query($conn, $sql);

    if($result){
        mysqli_close($conn);
        header("Location:success_delete.php");
    }
?>