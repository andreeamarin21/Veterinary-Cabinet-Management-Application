<?php
    include("connection.php");
    $animalid = $_POST['animal_id'];
    $stapanid = $_POST['stapan_id'];
    $varsta = $_POST['varsta'];
    $sex = $_POST['sex'];
    $greutate  =$_POST['greutate'];
    $specie = $_POST['specie'];
    $rasa = $_POST['rasa'];

    $sql = "UPDATE animale
            SET StapanID = '$stapanid', Varsta = '$varsta', Sex = '$sex', Greutate = '$greutate', Specie = '$specie', Rasa = '$rasa'
            WHERE AnimalID = '$animalid'";
            
    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location:success_update.php");
    }
    mysqli_close($conn);

?>