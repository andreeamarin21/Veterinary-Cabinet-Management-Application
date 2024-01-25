<?php
    include("connection.php");
    $doctor_id = $_POST['doctorid'];
    $sql = "DELETE CR
            FROM continut_reteta AS CR
            INNER JOIN reteta AS R ON CR.RetetaID = R.RetetaID
            INNER JOIN programare AS P ON R.ProgramareID = P.ProgramareID
            WHERE P.DoctorID = '$doctor_id'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        die("SQL ERROR: $conn->error");
    }

    $sql = "DELETE R
            FROM reteta AS R
            INNER JOIN programare AS P ON R.ProgramareID = P.ProgramareID
            WHERE P.DoctorID = '$doctor_id'";

    $result = mysqli_query($conn, $sql);
    if(!$result){
        die("SQL ERROR: $conn->error");
    }
    $sql = "DELETE SP
            FROM servicii_programare SP
            INNER JOIN programare P ON SP.ProgramareID = P.ProgramareID
            WHERE P.DoctorID = '$doctor_id'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        die("SQL ERROR: $conn->error");
    }
    
    $sql = "DELETE 
            FROM programare 
            WHERE DoctorID = '$doctor_id'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        die("SQL ERROR: $conn->error");
    }
    $sql = "DELETE 
            FROM doctori 
            WHERE DoctorID = '$doctor_id'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        die("SQL ERROR: $conn->error");
    }
    if($result){
        mysqli_close($conn);
        header("Location:success_delete.php");
    }

?>