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
                <div class = "main-nav-bar-a">
                    <div class = "dashboard" style = "display: flex; gap: 20px;">
                    <i class = "fa fa-dashboard" id = "font-awesome"></i>
                        <a href="admin_dashboard.php"> Dashboard </a>
                    </div>
                    <div class = "contacts" style = "display: flex; gap: 25px;">
                        <i class = "fa-solid fa-address-book" id = "font-awesome" style = "margin-top: 55%;"></i>
                        <a href="contact.php" style = "margin-top: 95px;"> Contacts </a>
                    </div>
                    <div class = "line-dashboard"></div>
                    <div class = "progress" style = "display: flex; gap: 25px;">
                        <i class = "fa-solid fa-bars-progress" id = "font-awesome"></i>
                        <a href="progress.php"> Progress </a>
                    </div>
                    <div class = "reports" style = "display: flex; gap: 30px;">
                        <i class = "fa fa-file" id = "font-awesome"> </i>
                        <a href = ""> Reports </a>
                    </div>
                    <div class = "settings" style = "display: flex; gap: 20px;">
                        <i class = "fa fa-cog" aria-hidden = "true" id = "font-awesome"> </i>
                        <a href = ""> Settings </a>
                    </div>
                </div>
            </div>

            <div class = "header-bar">
                <div class="secondary-nav">
                <span class = "logo" style = "color: white; text-transform: uppercase; font-size: 20px;"> CRM System </span>
                    <style>
                        .notification-icon
                        {
                            margin-left: -65%;
                        }
                        
                    </style>
                    <div class="notification-icon">
                        <i class="fas fa-bell" id="notification-bell"></i>
                    </div>
                    <div class="user">
                        <i class="fa-solid fa-user" id="user-icon"></i><span class="administrator"> Administrator </span>
                        <a href = "signin.php"><i class="fa-solid fa-power-off" id = "power-icon" onclick="Logout()"></i></a>
                    </div>
                </div>
            </div>
            <div class="secondary-nav">
                <div class="notification-icon">
                    <i class="fas fa-bell" id="notification-bell"></i>
                </div>
                <div class="user">
                    <i class="fa-solid fa-user" id="user-icon"></i><span class="administrator"> Administrator </span>
                    <i class="fa-solid fa-angle-down" id="angle-down-icon" onclick="logout()"></i>
                </div>
            </div>
        </div>
        <div class="search-bar" style = "margin-top: 3%; margin-left: 33%;">
            <i class="fas fa-search" id="search-icon" style = "margin-left: 2%;"></i>
            <input type="text" placeholder="Search" class="nav-search-bar">
        </div>
        <div class="progress-main-section">
            <div class = "post-section">

                <form action = '' method = 'post' enctype = 'multipart/form-data'>
                    <div class = 'image-comment' style = 'margin-left: 10%; padding: 5px; margin-top: -12%;'>
                        <div class = 'image-and-comment'>
                            <p class = 'image-comment-goes-here'></p>
                            <input type = 'text' class = 'add-image-comment' placeholder = 'Write your comment here' name = 'comment' style = "width: 80%; padding: 10px;">
                            <p style = "display: flex;">
                                <input type = 'file' id = 'input-file' accept = 'image/png, image/jpeg, image/jpg' name = 'imageFile' style = 'display: block; margin-top: 5px; color: white; padding: 5px;'>
                                <button type = 'submit' class = 'submit-comment-btn' onclick = 'addCommentToImage()' name = 'addImageAndComment' style = 'padding: 5px; margin-left: 52%;'> SUBMIT </button>
                            </p>
                        </div>
                    </div>
                </form>

        </div>
            <?php
            include_once("../PHP/databaseconnect.php");
            $sql = "SELECT * FROM `adminImage`";
            $result = mysqli_query($conn, $sql);
            echo "<div class = 'user-admin' style = 'display: flex; margin-left: 5%;'>";
            while ($row = mysqli_fetch_assoc($result)) {
                $adminID = $row["AID"];
                $stmt = "SELECT ImgName, Comment From customerimage WHERE AID = $adminID";
                if($resultc = mysqli_query($conn, $stmt))
                {
                    if( mysqli_num_rows($resultc) > 0 )
                    {
                        $rowc = mysqli_fetch_assoc($resultc);
                        $image = $rowc["ImgName"];
                        $cmnt = $rowc["Comment"];
                    }
                    else
                    {
                        $image = NULL;
                        $cmnt = NULL;
                    }
                }
                echo "
                <div class = 'adminProgressHero flex-item'>
                    <div class = ''><img src = '{$row['ImgName']}' /></div>
                    <p style = 'text-decoration: wrap; color: white; font-weight: 600;' class = 'imageTitle'>{$row['Comment']}</p>

                    <br><br><br><br><br><br>
                </div>
                <div class = 'userProgressHero' style = 'margin-right: 4%; margin-top: 2%;'>
                ";
                    showimage($image);

                echo "

                    <p style = 'text-decoration: wrap; color: white; font-weight: 600;' class = 'imageTitle'>{$rowc['Comment']}</p>
                </div>
                ";
                $image = NULL;
                $cmnt = NULL;
            }
            echo "</div>";
            function showimage($image)
            {
                if($image != "")
                {
                    echo "<div class = ''><img src = '$image' /></div>";
                }
            }
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
                margin-top: 2%;;
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
        <button type='submit' class='decline finish-project-btn' name='submitproject' style='margin-left: 15%;'> Finish
        </button>
        <script src="../JS/all.js"></script>
        <script src="../JavaScript/general.js" defer></script>
</body>

</html>