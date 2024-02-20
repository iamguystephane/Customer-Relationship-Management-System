<?php
    include_once("../PHP/databaseconnect.php");
    if(isset($_GET["id"]))
    { 
        $id = $_GET["id"];
        $sql = "UPDATE `create_project` SET Status = 'Accept' where ID = $id";
        $result = mysqli_query($conn,$sql);
        header("location: admin_dashboard.php");
        echo "Project has been accepted successfully";
    }
?>