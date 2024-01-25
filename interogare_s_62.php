<?php
include("connection.php");

$data = $_GET['datain'];

$year = date('Y', strtotime($data));
$month = date('m', strtotime($data));
$day = date('d', strtotime($data));

$sql = "SELECT DISTINCT PR.Nume, PR.Durata
        FROM programare P
        JOIN servicii_programare SP ON P.ProgramareID = SP.ProgramareID
        JOIN proceduri PR ON SP.ProceduraID = PR.ProceduraID
        WHERE YEAR(P.Data) = '$year' AND MONTH(P.Data) = '$month' AND DAY(P.Data) = '$day'";

$result = mysqli_query($conn, $sql);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $numeProcedura = $row['Nume'];
            $durata = $row['Durata'];
            echo "Nume: $numeProcedura, durata: $durata ";
            echo "<br>";
        }
    } else {
        echo "0 results";
    }
} else {
    echo "Error in query: " . mysqli_error($conn);
}

// Închide conexiunea
mysqli_close($conn);
?>
