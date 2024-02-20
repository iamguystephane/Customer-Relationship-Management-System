<?php
    include("../PHP/databaseconnect.php");
    if(isset($_GET["IDD"]))
    {
        $id = $_GET["IDD"];
        $sql = "UPDATE `create_project` SET Status = 'Failed' WHERE ID = $id";
        $result = mysqli_query($conn,$sql);
        header("location: admin_dashboard.php");
    }
?>