<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <title> Customer progress </title>
        <link rel = "stylesheet" href = "../CSS/general.css">
    </head>
    <body>
        <div id = "container">

            <div id = "logout">
                <button type = "" class = "logout"><a href = "signin.php"> Logout </a></button>
            </div>
    
            <style>
                #logout
                {
                    width: 10vw;
                    height: 20vh;
                    background-image: linear-gradient(rgb(236, 21, 21)0, rgb(0, 0, 0));
                    position: absolute;
                    z-index: 1;
                    right: 1px;
                    top: 6%;
                    padding: 5px;
                    border-radius: 5px;
                    display: none;
                }
                #logout button
                {
                    color: red;
                    position: absolute;
                    background: grey;
                    width: 80%;
                    height: 30px;
                    border-radius: 4px;
                    color: white;
                    border: 0px;
                    outline: 0px;
                    left: 10%;
                    top: 15%;
                    cursor: pointer;
                }
            </style>

            <div class = "nav">
                <div class = "main-nav-bar">
                    <a href = "customerdashboard.php"> Dashboard </a>
                    <a href = "createproject.php"> Create Project </a>
                    <a href = "progress.php"> Progress </a>
                </div>
                <style>
                    .main-nav-bar a
                    {
                        line-height: 12.6;
                    }
                </style>
                <div class = "secondary-nav">
                    <div class = "notification-icon">
                        <i class = "fas fa-bell" id = "notification-bell"></i>
                    </div>
                    <div class = "search-bar">
                        <i class = "fas fa-search" id = "search-icon"></i>
                        <input type = "text" placeholder = "Search" class = "nav-search-bar">
                    </div>
                    <div class = "user">
                        <i class = "fa-solid fa-user" id = "user-icon"></i><span class = "administrator"> Administrator </span>
                        <i class = "fa-solid fa-angle-down" id = "angle-down-icon" onclick = "Logout()"></i>
                    </div>
                </div>
            </div>
            <div class = "progress-main-section">
                <div class = "image-comment section1">
                    <div class = "image1" style = "margin-top: 50px;">

                        <?php
                            include_once("../PHP/databaseconnect.php");
                            $sql = "SELECT * FROM `image comment` WHERE Status = 'admin'";
                            $result = mysqli_query($conn,$sql);
                            while ($row = mysqli_fetch_assoc($result))
                            {
                                echo "
                                <div class = 'progressHero'>
                                    <div class = 'progressAdmin'>
                                        <div class = ''><img src = '{$row['Image']}' /></div>
                                        <p style = 'text-decoration: wrap;' class = 'imageTitle'>{$row['Comment']}</p>
                                        <hr style = 'margin-top: 140px;'>
                                        <br><br><br>
                                    </div>
                                    <div class = 'image-comment comment2'>
                                        <form action = '' method = 'post'>
                                            <div class = 'image-and-comment'>
                                                <div class = 'image2'></div>
                                                <p class = 'image-comment-goes-here'></p>
                                                <textarea name = 'customerText' id = '' cols ='31' rows ='3' class = 'add-image-comment' placeholder = 'upload a comment based on the image directly on your left. You can also add an image to help us better understand you'></textarea>
                                                <p><button type = 'submit' class = 'submit-comment-btn btn-2' onclick = 'addCommentToImage()' name = 'customerSend'> SEND </p></button>
                                                <p>
                                                    <label for = 'enterFile' class = 'image-comment-text' name = ''> Upload Image </label>
                                                    <input type = 'file' name = 'addImg' id = 'enterFile' accept = 'image/png, image/jpeg, image/jpg'>
                                                </p>
                                            </div>
                                        </form>
                                        <hr>
                                    </div>
                                </div>
                                ";
                            }
                        ?>
                    </div>
                </div>
    
                <style>
                    .progressHero
                    {
                        display: flex;
                        gap: 180px;
                    }
                    .image2
                    {
                        width: 500px;
                        height: 400px;
                        border: 1px solid black;
                        margin-top: -50px;
                        background-position: center;
                        background-size: cover;
                    }
                    img
                    {
                        width: 500px;
                        height: 400px;
                    }
                    #enterFile
                    {
                        display: none;
                    }
                    a
                    {
                        text-decoration: none;
                        color: white;
                    }
                    .progress-main-section
                    {
                        display: flex;
                        gap: 150px;
                    }
                    .finish-project-btn
                    {
                        margin-left: 10%;
                    }
                    .image-comment
                    {
                        margin-top: 5%;
                    }
                    .comment2
                    {
                        margin-top: -4.5%;
                    }
                    .image-comment-text
                    {
                        margin-left: 40%;
                    }
                    textarea
                    {
                        padding: 3px;
                    }
                    .btn-2
                    {
                        width: 20%;
                    }
                    .add-image-comment
                    {
                        width: 97%;
                    }
                </style>
            </div>
        </div>

        <?php
            include_once("../PHP/databaseconnect.php");

            if(isset($_POST["customerSend"]))
            {
                $comment = $_POST["customerText"];
                $image = $_FILES["addImg"];
                $imageFileName = $image["name"];
                $imageFileTemp = $image["tmp_name"];
                $fileName_separate = explode('.', $imageFileName);
                $file_extension = strtolower(end($fileName_separate));
                $extension = array('jpeg','jpg','png');
                if(in_array($file_extension, $extension))
                {
                    $upload_image = '../images/'.$imageFileName;
                    move_uploaded_file($imageFileTemp, $upload_image);
                    $sql = "INSERT INTO `image comment` (Comment, Image, Status) VALUES ('$comment', '$upload_image', 'user')";
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


