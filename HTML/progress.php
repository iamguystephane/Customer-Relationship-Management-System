<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> Progress </title>
    <link rel="stylesheet" href="../CSS/general.css">
</head>

<body>
    <div id="container">
        <div class="nav">
            <div class="main-nav-bar">
                <a href="admin_dashboard.php"> Dashboard </a>
                <a href="contact.php"> Contacts </a>
                <a href="progress.php"> Progress </a>
                <a href=""> Reports </a>
                <a href=""> Settings </a>
            </div>
            <div class="secondary-nav">
                <div class="notification-icon">
                    <i class="fas fa-bell" id="notification-bell"></i>
                </div>
                <div class="search-bar">
                    <i class="fas fa-search" id="search-icon"></i>
                    <input type="text" placeholder="Search" class="nav-search-bar">
                </div>
                <div class="user">
                    <i class="fa-solid fa-user" id="user-icon"></i><span class="administrator"> Administrator </span>
                    <i class="fa-solid fa-angle-down" id="angle-down-icon" onclick="logout()"></i>
                </div>
            </div>
        </div>
        <div class="progress-main-section">
            <?php
            include_once("../PHP/databaseconnect.php");
            $sql = "SELECT * FROM `adminImage` WHERE AID = 'user' or AID = 'admin'";
            $result = mysqli_query($conn, $sql);
            echo "<div class = 'user-admin' style = 'display: flex; gap: 50px;'>";
            while ($row = mysqli_fetch_assoc($result)) {
                $status = $row["Status"];
                echo "
                            <form action = '' method = 'post' enctype = 'multipart/form-data'>
                            <div class = 'image-comment' style = 'margin-left: 30%; padding: 5px;'>
                                <div class = 'image-and-comment'>
                                        <p class = 'image-comment-goes-here'></p>
                                        <input type = 'text' class = 'add-image-comment' placeholder = 'add comment to image' name = 'comment'>
                                        <button type = 'submit' class = 'submit-comment-btn' onclick = 'addCommentToImage()' name = 'addImageAndComment' style = 'padding: 5px;'> SUBMIT </button>
                                        <p>
                                            <input type = 'file' id = 'input-file' accept = 'image/png, image/jpeg, image/jpg' name = 'imageFile' style = 'display: block; margin-top: 5px;'>
                                        </p>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
               
                        <div class = 'userProgressHero flex-item'>
                            <div class = ''><img src = '{$row['Image']}' /></div>
                            <p style = 'text-decoration: wrap;' class = 'imageTitle'>{$row['Comment']}</p>

                            <br><br><br>
                        </div>
                ";
            }
            echo "</div>";
            ?>

        </div>
        <style>
            .user-admin {
                display: flex;
                flex-wrap: wrap;
            }

            .flex-item {
                flex: 1;
                flex-direction: column;
                display: block;
                margin-top: 2%;
                margin-left: 10%;
            }

            a {
                text-decoration: none;
                color: white;
            }

            img {
                width: 500px;
                height: 400px;
            }
        </style>

        <?php
        include_once("../PHP/databaseconnect.php");

        if (isset($_POST["addImageAndComment"])) {
            $comment = $_POST["comment"];
            $image = $_FILES["imageFile"];
            $imageFileName = $image["name"];
            $imageFileTemp = $image["tmp_name"];
            $fileName_separate = explode('.', $imageFileName);
            $file_extension = strtolower(end($fileName_separate));
            $extension = array('jpeg', 'jpg', 'png');
            if (in_array($file_extension, $extension)) {
                $upload_image = '../images/' . $imageFileName;
                move_uploaded_file($imageFileTemp, $upload_image);
                $sql = "INSERT INTO `adminImage` (ImgName, Comment) VALUES ('$upload_image', '$comment')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script> alert('Data inserted successfully') </script>";
                } else {
                    die(mysqli_error($conn));
                }
            }
        }
        ?>
        <button type='submit' class='decline finish-project-btn' name='submitproject' style='margin-left: 10%;'> Finish
        </button>
        <script src="../JS/all.js"></script>
        <script src="../JavaScript/general.js" defer></script>
</body>

</html>