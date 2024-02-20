<?php
   //connecting to the database

    $localhost = "localhost";
    $user = "root";
    $password = "";
    $db = "crmsystem";

    $conn = mysqli_connect("$localhost", "$user", "$password", "$db");
    
    if($conn)
    {
        echo "";
    }
    else
    {
        die("connection error".mysqli_connect_errno($conn));
    }
    // Accepting input from the create Project section
    
?>