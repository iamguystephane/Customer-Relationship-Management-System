<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Details</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: grey;
        }

        #description {
            max-width: 600px;
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .back-btn {
            padding: 10px 20px;
            border-radius: 4px;
            outline: 0;
            border: 0;
            cursor: pointer;
        }

        .accept {
            background-color: green;
        }

        .back-btn a {
            text-decoration: none;
            color: white;
        }
    </style>
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
                    <h4 class='project-title'>Project Title</h4>
                    <p>{$row['Project_Name']}</p>
                    <h4 class='project-description'>Project Description</h4>
                    <p>{$row['Project_Description']}</p>
                    <p style='display: flex; gap: 20px; justify-content: center;'>
                        <button type='button' class='back-btn' onclick='HideDescription()' style='background: red;'><a href='admin_dashboard.php'>Back</a></button>
                    </p>
                ";
            }
        ?>
    </div>
    <script src="../JavaScript/general.js"></script>
</body>
</html>
