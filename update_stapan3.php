<?php
    include("connection.php");
    $stapanid = $_POST['stapan_id'];
    $nume_nou = $_POST['nume'];
    $prenume_nou = $_POST['prenume'];
    $telefon_nou = $_POST['telefon'];
    $adresa_nou = $_POST['adresa'];
    $cnp_nou = $_POST['cnp'];

    $sql = "UPDATE stapani
            SET Nume = '$nume_nou', Prenume = '$prenume_nou', Telefon = '$telefon_nou', Adresa = '$adresa_nou', CNP = '$cnp_nou'
            WHERE StapanID = '$stapanid'";
    $result = mysqli_query($conn, $sql);

    if($result){
        mysqli_close($conn);
        header("Location:success_update.php");
    }
    

?>