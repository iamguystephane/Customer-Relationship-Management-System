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
            if(isset($_GET["ID"]))
            {
                $id = $_GET["ID"];
                $sql = "SELECT * FROM `create_project` WHERE ID = $id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $identity = $row["ID"];
                echo "
                    <h4 class='project-title'> Project Title </h4>
                    <p>{$row['Project_Name']}</p>
                    <h4 class='project-description'> Project Description </h4>
                    <p>{$row['Project_Description']}</p>
                    <p style = 'display: flex; gap: 100px;'>
                        <button type='button' class='back-btn' onclick='HideDescription()' style = 'background: black;'><a href = 'admin_dashboard.php' style = 'text-decoration: none; color: white;'> Back </a></button>
                        <button type='button' class='back-btn' onclick='HideDescription()' style = 'background: black;'><a href = 'accept.php?id=$identity' style = 'text-decoration: none; color: white;'> Accept </a></button>
                    </p>
                ";
            }
        ?>
        <style>
            .back-btn
            {
                padding: 5px;
                border-radius: 4px;
                outline: 0px;
                border: 0px;
            }
        </style>
    </div>
    <script src="../JavaScript/general.js"></script>
</body>
</html>
