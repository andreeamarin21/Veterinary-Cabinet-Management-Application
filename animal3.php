<?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $numes=$_POST['nume'];
        $prenume=$_POST['prenume'];
        $telefon=$_POST['telefon'];
        $adresa=$_POST['adresa'];
        $cnp=$_POST['cnp'];
        $numea=$_POST['numeA'];
        $varsta=$_POST['varsta'];
        $sex=$_POST['sex'];
        $greutate=$_POST['greutate'];
        $specie=$_POST['specie'];
        $rasa=$_POST['rasa'];

        $sql= "INSERT INTO stapani (Nume,Prenume,Telefon,Adresa,CNP) VALUES ('$numes','$prenume','$telefon','$adresa','$cnp')";

        if (mysqli_query($conn, $sql)) {
            $last_id = mysqli_insert_id($conn);
            echo "New record created successfully. Last inserted ID is: " . $last_id;
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
        $sql= "INSERT INTO animale (StapanID,Nume,Varsta,Sex,Greutate,Specie,Rasa) VALUES ('$last_id','$numea','$varsta','$sex','$greutate','$specie','$rasa')";
        $result = mysqli_query($conn,$sql);

        if (mysqli_query($conn, $sql)) {
            header("Location:success_insert.php");
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          
          mysqli_close($conn);
       
    }
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Proiect</title>
        <link rel="stylesheet" href="style.css">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <body>
        <div class="wrapper">
            <form action="animal3.php" method="post">
                <h1>Stapan</h1>
                <div class="input-box">
                    <input type="nume" name="nume" placeholder="Nume">
                </div>

                <div class="input-box">
                    <input type="prenume" name="prenume" placeholder="Prenume">
                </div>

                <div class="input-box">
                    <input type="telefon" name="telefon" placeholder="Telefon">
                </div>
                <div class="input-box">
                    <input type="adresa" name="adresa" placeholder="Adresa">
                </div>
                <div class="input-box">
                    <input type="cnp" name="cnp" placeholder="cnp">
                </div>

                <h2>Animal</h2>
                <div class="input-box">
                    <input type="numeA" name="numeA" placeholder="Nume">
                </div>

                <div class="input-box">
                    <input type="varsta" name="varsta" placeholder="Varsta">
                </div>

                <div class="input-box">
                    <input type="sex" name="sex" placeholder="Sex(M/F)">
                </div>
                <div class="input-box">
                    <input type="greutate" name="greutate" placeholder="Greutate">
                </div>
                <div class="input-box">
                    <input type="specie" name="specie" placeholder="Specie">
                </div>
                <div class="input-box">
                    <input type="rasa" name="rasa" placeholder="Rasa">
                </div>


                <button type="submit" class="btn" name="submit">Adauga</button>
            </form>
        </div>

    </body>
</html>