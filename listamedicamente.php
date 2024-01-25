<?php
    include("connection.php");
    
        $sql="SELECT Nume, Brand, Pret FROM medicamente";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                echo "Nume: ".$row["Nume"]." -Brand: ".$row["Brand"]." -Pret: ".$row["Pret"]." ";
                echo "</br>";  
            }
        }else{
            echo "0 results";
        }
       
    
    mysqli_close($conn);
?>