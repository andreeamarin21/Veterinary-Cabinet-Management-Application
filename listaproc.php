<?php
    include("connection.php");
    
        $sql="SELECT Nume FROM proceduri";
        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                echo "".$row["Nume"]."";
                echo "</br>";  
            }
        }else{
            echo "0 results";
        }
       
    
    mysqli_close($conn);
?>