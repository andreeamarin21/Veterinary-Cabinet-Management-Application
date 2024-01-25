<?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $nume=$_POST['nume'];
        $prenume=$_POST['prenume'];
        $cnp=$_POST['cnp'];
        $telefon=$_POST['telefon'];

        $sql= "INSERT INTO doctori (Nume,Prenume,CNP,Telefon) VALUES ('$nume','$prenume','$cnp','$telefon')";
        $result = mysqli_query($conn,$sql);
        if ($result) {
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
            <form action="doctor.php" method="post">
                <h1>Doctor</h1>
                <div class="input-box">
                    <input type="nume" name="nume" placeholder="Nume">
                </div>

                <div class="input-box">
                    <input type="prenume" name="prenume" placeholder="Prenume">
                </div>

                
                <div class="input-box">
                    <input type="cnp" name="cnp" placeholder="CNP">
                </div>

                <div class="input-box">
                    <input type="telefon" name="telefon" placeholder="Telefon">
                </div>

                <button type="submit" class="btn" name="submit">Adauga</button>
            </form>
        </div>

    </body>
</html>