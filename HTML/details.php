<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Project Details </title>
</head>
<body>
    <div id="description">
        <?php
            include_once("../PHP/databaseconnect.php");
            if(isset($_GET["id"]))
            {
                $id = $_GET["id"];
                $sql = "SELECT Project_Description, Project_Name FROM `create_project` WHERE ID = $id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                echo "
                    <h4 class='project-title'> Project Title </h4>
                    <p>{$row['Project_Name']}</p>
                    <h4 class='project-description'> Project Description </h4>
                    <p>{$row['Project_Description']}</p>
                    <button type='button' class='accept back' onclick='HideDescription()'> Close </button>
                ";
            }
        ?>
    </div>
    <script src="../JavaScript/general.js"></script>
</body>
</html>
