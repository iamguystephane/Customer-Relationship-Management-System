<?php
    // Database connection

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "register";
    
    // create connection
    $conn = new mysqli("$servername", "$username", "$password", "$dbname");

    // checking connection
    if($conn -> connect_errno)
    {
        die ('Connection unsuccessful'.$conn -> connection_error);
    }

        // process form submission
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $Name = $_POST["name"];
        $Email = $_POST["email"];
        $Password = $_POST["password"];
        $Gender = $_POST["gender"];
        $Country = $_POST["country"];
        $CountryCode = $_POST["country-code"];

        // insert data into the database
        $sql = "INSERT INTO user (Name, Email, Password, Gender, Country, CountryCode) VALUES('$Name', '$Email', '$Password', '$Department', '$Gender', '$Country', '$CountryCode')";

        if ($conn->query($sql) === TRUE)
        {
            echo "Registration successful";
        }
        else
        {
            echo "Error!". $sql."<br>".$conn -> error;
        }
    }

    // close database connection

    $conn -> close();
?>