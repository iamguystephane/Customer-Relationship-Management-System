<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <title> Progress </title>
        <link rel = "stylesheet" href = "../CSS/general.css">
    </head>
    <body>
        <div id = "container">
            <div class = "nav">
                <div class = "main-nav-bar">
                    <a href = "admin_dashboard.php"> Dashboard </a>
                    <a href = "contact.php"> Contacts </a>
                    <a href = "progress.php"> Progress </a>
                    <a href = ""> Reports </a>
                    <a href = ""> Settings </a>
                </div>
                <div class = "secondary-nav">
                    <div class = "search-bar">
                        <i class = "fas fa-search" id = "search-icon"></i>
                        <input type = "text" placeholder = "Search" class = "nav-search-bar">
                    </div>
                    <div class = "user">
                        <i class = "fa-solid fa-user" id = "user-icon"></i><span class = "administrator"> Administrator </span>
                        <i class = "fa-solid fa-angle-down" id = "angle-down-icon" onclick = "logout()"></i>
                    </div>
                </div>
            </div>
            <div class = "progress-main-section">
                <form action = '' method = 'post' enctype = 'multipart/form-data'>
                    <div class = 'image-comment'>
                        <div class = 'image-and-comment'>
                            <div class = 'image'></div>
                                <p class = 'image-comment-goes-here'></p>
                                <input type = 'text' class = 'add-image-comment' placeholder = 'add comment to image' name = 'comment'>
                                <button type = 'submit' class = 'submit-comment-btn' onclick = 'addCommentToImage()' name = 'addImageAndComment'> Add </button>
                                <p>
                                    <label for = 'input-file' class = 'image-comment-text'> Upload Image </label>
                                    <input type = 'file' id = 'input-file' accept = 'image/png, image/jpeg, image/jpg' name = 'imageFile'>
                                </p>
                            </div>
                        </div>
                        <hr>
                        <button type = 'submit' class = 'decline finish-project-btn' name = 'submitproject'> Finish </button>
                    </div>
                </form>
            <?php
                include_once("../PHP/databaseconnect.php");
                $sql = "SELECT * FROM `image comment` WHERE Status = 'user'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result))
                {
                    echo"
                    <div class = 'adminProgressHero'>
                        <form action = '' method = 'post' enctype = 'multipart/form-data'>
                            <div class = 'image-comment'>
                                <div class = 'image-and-comment'>
                                    <div class = 'image'></div>
                                        <p class = 'image-comment-goes-here'></p>
                                        <input type = 'text' class = 'add-image-comment' placeholder = 'add comment to image' name = 'comment'>
                                        <button type = 'submit' class = 'submit-comment-btn' onclick = 'addCommentToImage()' name = 'addImageAndComment'> Add </button>
                                        <p>
                                            <label for = 'input-file' class = 'image-comment-text'> Upload Image </label>
                                            <input type = 'file' id = 'input-file' accept = 'image/png, image/jpeg, image/jpg' name = 'imageFile'>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <button type = 'submit' class = 'decline finish-project-btn' name = 'submitproject'> Finish </button>
                            </div>
                            <div class = 'userProgressHero'>
                                <div class = ''><img src = '{$row['Image']}' /></div>
                                <p style = 'text-decoration: wrap;' class = 'imageTitle'>{$row['Comment']}</p>
                                <hr style = 'margin-top: 140px;'>
                                <br><br><br>
                            </div>
                        </form>
                    </div>
                    ";
                }
            ?>

        </div>
        <style>
                    a
                    {
                        text-decoration: none;
                        color: white;
                    }
        </style>

        <?php
            include_once("../PHP/databaseconnect.php");

            if(isset($_POST["addImageAndComment"]))
            {
                $comment = $_POST["comment"];
                $image = $_FILES["imageFile"];
                $imageFileName = $image["name"];
                $imageFileTemp = $image["tmp_name"];
                $fileName_separate = explode('.', $imageFileName);
                $file_extension = strtolower(end($fileName_separate));
                $extension = array('jpeg','jpg','png');
                if(in_array($file_extension, $extension))
                {
                    $upload_image = '../images/'.$imageFileName;
                    move_uploaded_file($imageFileTemp, $upload_image);
                    $sql = "INSERT INTO `image comment` (Comment, Image, Status) VALUES ('$comment', '$upload_image', 'admin')";
                    $result = mysqli_query($conn, $sql);
                    if($result)
                    {
                        echo "<script> alert('Data inserted successfully') </script>";
                    }
                    else
                    {
                        die(mysqli_error($conn));
                    }
                }
            }
        ?>

        <script src = "../JS/all.js"></script>
        <script src = "../JavaScript/general.js" defer></script>
    </body>
</html>