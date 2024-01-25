<?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $nume=$_POST['nume'];
        $prenume=$_POST['prenume'];
        $telefon=$_POST['telefon'];
        $adresa=$_POST['adresa'];
        $cnp=$_POST['cnp'];

        $sql= "INSERT INTO Stapani (Nume,Prenume,Telefon,Adresa,CNP) VALUES ('$nume','$prenume','$telefon','$adresa','$cnp')";
        if (mysqli_query($conn, $sql)) {
            header("Location:success_insert.php");
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          
          mysqli_close($conn);
       
    }
?>

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
        <button type="submit" class="btn" name="home" onclick="location.href='home.php'">Home</button>
    </div>
</body>
</html>