<?php
include("../PHP/databaseconnect.php");
if(isset($_GET["IDD"]))
{
    $id = $_GET["IDD"];
    $sql = "DELETE FROM `create_project` WHERE ID = $id";
    $result = mysqli_query($conn,$sql);

    header("Location: admin_dashboard.php");
}
?>