<?php
    include("connection.php");
    $numea = isset($_GET['numeanimal']) ? $_GET['numeanimal'] : '';
    $stapan_id = isset($_GET['stapan_id']) ? $_GET['stapan_id'] : '';
    
    $sql = "SELECT AnimalID
            FROM animale A
            WHERE A.StapanID='$stapan_id' AND A.Nume='$numea' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $idanimal = $row['AnimalID'];
    
    $sql = "SELECT P.ProgramareID, P.Data
            FROM programare P 
            WHERE P.AnimalID='$idanimal'";
    
    $result = mysqli_query($conn, $sql);
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $animal_id = $_POST['animalid'];
        $programare_id = $_POST['programareid'];
        $data = $_POST['data'];
        $medicament1 = isset($_POST['medicament1']) ? $_POST['medicament1'] : null;
        $medicament2 = isset($_POST['medicament2']) ? $_POST['medicament2'] : null;
        $medicament3 = isset($_POST['medicament3']) ? $_POST['medicament3'] : null;

        $cantitate1 = isset($_POST['cantitate1']) ? $_POST['cantitate1'] : null;
        $cantitate2 = isset($_POST['cantitate2']) ? $_POST['cantitate2'] : null;
        $cantitate3 = isset($_POST['cantitate3']) ? $_POST['cantitate3'] : null;

        $sql= "INSERT INTO reteta (AnimalID,ProgramareID, Data) VALUES ('$animal_id','$programare_id','$data')";
        $result = mysqli_query($conn,$sql);
        if (!$result) {
            die('Eroare MySQL: ' . mysqli_error($conn));
        }

        if ($result) {
            $retetaid = mysqli_insert_id($conn);
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
          if(isset($medicament1) && !empty($medicament1)){
            $sql="SELECT MedicamentID FROM medicamente WHERE Nume='$medicament1'";
            $result=mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($result);
            $medicamentid=$row['MedicamentID'];
        
            if (!empty($medicamentid)) {
                $sql = "INSERT INTO continut_reteta (RetetaID, MedicamentID, Cantitate_medicament) VALUES ('$retetaid', '$medicamentid','$cantitate1')";
                $result = mysqli_query($conn, $sql);
            
                if (!$result) {
                    die('Eroare MySQL: ' . mysqli_error($conn));
                }
            }
        }  
        if(isset($medicament2) && !empty($medicament2)){
            $sql="SELECT MedicamentID FROM medicamente WHERE Nume='$medicament2'";
            $result=mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($result);
            $medicamentid=$row['MedicamentID'];
        
            if (!empty($medicamentid)) {
                $sql = "INSERT INTO continut_reteta (RetetaID, MedicamentID, Cantitate_medicament) VALUES ('$retetaid', '$medicamentid','$cantitate2')";
                $result = mysqli_query($conn, $sql);
            
                if (!$result) {
                    die('Eroare MySQL: ' . mysqli_error($conn));
                }
            }
        } 
        if(isset($medicament3) && !empty($medicament3)){
            $sql="SELECT MedicamentID FROM medicamente WHERE Nume='$medicament3'";
            $result=mysqli_query($conn, $sql);
            $row=mysqli_fetch_assoc($result);
            $medicamentid=$row['MedicamentID'];
        
            if (!empty($medicamentid)) {
                $sql = "INSERT INTO continut_reteta (RetetaID, MedicamentID, Cantitate_medicament) VALUES ('$retetaid', '$medicamentid','$cantitate3')";
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
            <form action="reteta3.php" method="post">
                <input type="hidden" name="animalid" value="<?php echo htmlspecialchars($idanimal); ?>">
                <h2>
                    <?php
                        echo "Numele animalului ales anterior: $numea";
                    ?>
                </h2>
                
                <h1> Programarile animalului </h1>
                <select name="programareid" required>
                    <?php
                        if ($result) {
                            // Verificați dacă există programări
                            if (mysqli_num_rows($result) > 0) {
                                // Există programări, iterați prin ele și faceți ce doriți
                                while ($row_programare = mysqli_fetch_assoc($result)) {
                                    // Procesați fiecare programare
                                    echo "<option value='" . $row_programare['ProgramareID'] . "'>" . $row_programare['Data'] . "</option>";
                                }
                            } else {
                                // Nu au fost găsite programări, afișați opțiunea "Nu există programări"
                                echo "<option disabled selected>Nu există programări</option>";
                            }
                        } else {
                            // A apărut o eroare la executarea interogării
                            echo "Eroare MySQL: " . mysqli_error($conn);
                        }
                    ?>
                </select>

                <div class="input-box">
                    <input type="datetime-local" name="data" placeholder="Data">
                </div>

                <h1>Adauga maxim 3 medicamente</h1>
                <a href="listamedicamente.php">Vezi lista medicamentelor</a>
                <div class="input-box">
                    <input type="text" name="medicament1" placeholder="Medicament 1">
                </div>
                <div class="input-box">
                    <input type="text" name="cantitate1" placeholder="Cantitate medicament 1">
                </div>
                <div class="input-box">
                    <input type="text" name="medicament2" placeholder="Medicament 2">
                </div>
                <div class="input-box">
                    <input type="text" name="cantitate2" placeholder="Cantitate medicament 2">
                </div>
                <div class="input-box">
                    <input type="text" name="medicament3" placeholder="Medicament 3">
                </div>
                <div class="input-box">
                    <input type="text" name="cantitate3" placeholder="Cantitate medicament 2">
                </div>
                <button type="submit" class="btn" name="submit">Adauga</button>
            </form>
        </div>

    </body>
</html>