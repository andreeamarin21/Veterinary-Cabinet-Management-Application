<?php
    include("connection.php");
    if(isset($_POST['submit'])){
        $nume=$_POST['nume'];
        $prenume=$_POST['prenume'];

        $sql="SELECT Nume, Prenume, Adresa, Telefon, CNP FROM Stapani WHERE Nume='$nume' AND Prenume='$prenume'";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                echo "Nume: ".$row["Nume"]." -Prenume:".$row["Prenume"]." -Adresa: ".$row["Adresa"]." -Telefon:".$row["Telefon"]." -CNP:".$row["CNP"]." ";
            }
        }else{
            echo "0 results";
        }
       
    }
    mysqli_close($conn);
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