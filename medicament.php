<?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $nume=$_POST['nume'];
        $brand=$_POST['brand'];
        $pret=$_POST['pret'];
        $descriere=$_POST['descriere'];

        $sql= "INSERT INTO medicamente (Nume,Brand,Pret,Descriere) VALUES ('$nume','$brand','$pret','$descriere')";
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
            <form action="medicament.php" method="post">
                <h1>Medicament</h1>
                <div class="input-box">
                    <input type="nume" name="nume" placeholder="Nume">
                </div>

                <div class="input-box">
                    <input type="brand" name="brand" placeholder="Brand">
                </div>

                
                <div class="input-box">
                    <input type="pret" name="pret" placeholder="Pret">
                </div>

                <div class="input-box">
                    <input type="descriere" name="descriere" placeholder="Descriere">
                </div>

                <button type="submit" class="btn" name="submit">Adauga</button>
            </form>
        </div>

    </body>
</html>