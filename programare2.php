<?php
    include("connection.php");
    $numea = isset($_GET['numea']) ? $_GET['numea'] : '';

    
    $sql = "SELECT DISTINCT S.StapanID, S.Nume, S.Prenume
            FROM stapani S 
            JOIN animale A ON S.StapanID = A.StapanID
            WHERE A.Nume = '$numea' ";
    
    $resultOwners = mysqli_query($conn, $sql);
    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $numeanim = $_POST['numeanimal'];
        $stapanid = $_POST['stapan_id'];
        $numed = $_POST['numed'];
        $prenumed = $_POST['prenumed'];
        $data = $_POST['data'];
        $pret = $_POST['pret'];
        $procedura1 = isset($_POST['procedura1']) ? $_POST['procedura1'] : null;
        $procedura2 = isset($_POST['procedura2']) ? $_POST['procedura2'] : null;
        $procedura3 = isset($_POST['procedura3']) ? $_POST['procedura3'] : null;
    

        $sql = "SELECT AnimalID 
                FROM animale 
                WHERE Nume='$numeanim' AND StapanID='$stapanid'";

        $result=mysqli_query($conn,$sql);
        if (!$result) {
            die('Eroare MySQL: ' . mysqli_error($conn));
        }
        $row = mysqli_fetch_assoc($result);
        $animalid=$row['AnimalID'];

        $sql = "SELECT DoctorID 
                FROM doctori 
                WHERE Nume='$numed' AND Prenume='$prenumed'";

        $result=mysqli_query($conn,$sql);
        if (!$result) {
            die('Eroare MySQL: ' . mysqli_error($conn));
        }
        $row = mysqli_fetch_assoc($result);
        $doctorid=$row['DoctorID'];

        $sql = "INSERT INTO programare (AnimalID,DoctorID,Data,Pret) 
                VALUES ('$animalid','$doctorid','$data','$pret')";
        $result = mysqli_query($conn,$sql);
        if (!$result) {
            die('Eroare MySQL: ' . mysqli_error($conn));
        }

        if ($result) {
            $programareid = mysqli_insert_id($conn);
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          if(isset($procedura1) && !empty($procedura1)){
            $sql="SELECT ProceduraID FROM proceduri WHERE Nume='$procedura1'";
            $result=mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($result);
            $proceduraid=$row['ProceduraID'];
        
            if (!empty($proceduraid)) {
                $sql = "INSERT INTO servicii_programare (ProgramareID, ProceduraID) 
                        VALUES ('$programareid', '$proceduraid')";
                $result = mysqli_query($conn, $sql);
            
                if (!$result) {
                    die('Eroare MySQL: ' . mysqli_error($conn));
                }
            }
        }  
        if(isset($procedura2)){
            $sql="SELECT ProceduraID FROM proceduri WHERE Nume='$procedura2'";
            $result=mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($result);
            $proceduraid=$row['ProceduraID'];

            if (!empty($proceduraid)) {
                $sql = "INSERT INTO servicii_programare (ProgramareID, ProceduraID) 
                        VALUES ('$programareid', '$proceduraid')";
                $result = mysqli_query($conn, $sql);
            
                if (!$result) {
                    die('Eroare MySQL: ' . mysqli_error($conn));
                }
            }
        }  
        if(isset($procedura3)){
            $sql="SELECT ProceduraID FROM proceduri WHERE Nume='$procedura3'";
            $result=mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($result);
            $proceduraid=$row['ProceduraID'];

            if (!empty($proceduraid)) {
                $sql = "INSERT INTO servicii_programare (ProgramareID, ProceduraID) 
                        VALUES ('$programareid', '$proceduraid')";
                $result = mysqli_query($conn, $sql);
            
                if (!$result) {
                    die('Eroare MySQL: ' . mysqli_error($conn));
                }
            }
        }  
        header("Location:success_insert.php");
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
            <form action="programare2.php" method="post">
                <input type="hidden" name="numeanimal" value="<?php echo htmlspecialchars($numea); ?>">
                <h2>
                    <?php
                        echo "Numele animalului ales anterior: $numea";
                    ?>
                </h2>
                <select name="stapan_id" required>
                    <?php
                        while ($row = mysqli_fetch_assoc($resultOwners)) {
                            echo "<option value='" . $row['StapanID'] . "'>" . $row['Nume'] . " " . $row['Prenume'] . "</option>";

                        }
                    ?>
                </select>
                
                <h1> Doctor </h1>
                <a href="listadoc.php">Vezi lista doctorilor</a>
                <div class="input-box">
                    <input type="text" name="numed" placeholder="Nume doctor">
                </div>
                <div class="input-box">
                    <input type="text" name="prenumed" placeholder="Prenume doctor">
                </div>
                
                <h1>Programare</h1>
                <div class="input-box">
                    <input type="datetime-local" name="data" placeholder="Data">
                </div>
                <div class="input-box">
                    <input type="text" name="pret" placeholder="Pret">
                </div>

                <h1>Adauga maxim 3 proceduri</h1>
                <a href="listaproc.php">Vezi lista procedurilor</a>
                <div class="input-box">
                    <input type="text" name="procedura1" placeholder="Procedura 1">
                </div>
                <div class="input-box">
                    <input type="text" name="procedura2" placeholder="Procedura 2">
                </div>
                <div class="input-box">
                    <input type="text" name="procedura3" placeholder="Procedura 3">
                </div>
                <button type="submit" class="btn" name="submit">Adauga</button>
            </form>
        </div>

    </body>
</html>