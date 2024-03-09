<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> Customer progress </title>
    <link rel="stylesheet" href="../CSS/general.css">
</head>

<body>
    <div id="container">


        <style>
            body
            {
                overflow-x: hidden;
            }
            #logout {
                width: 10vw;
                height: 20vh;
                background-image: linear-gradient(rgb(236, 21, 21), rgb(0, 0, 0));
                position: absolute;
                z-index: 1;
                right: 1px;
                top: 6%;
                padding: 5px;
                border-radius: 5px;
                /* display: none; */
            }

            #logout button {
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
        
        <div class="nav">
            <div class="main-nav-bar">
                <div class = "dashboard" style = "display: flex; gap: 20px;">
                <i class = "fa fa-dashboard" id = "font-awesome"></i>
                    <a href="customerdashboard.php"> Dashboard </a>
                </div>

                <div class = "progress" style = "display: flex; gap: 30px;">
                <i class = "fa fa-file" id = "font-awesome"> </i>
                    <a href="createproject.php"> Project </a>
                </div>
                
                <div class = "settings" style = "display: flex; gap: 25px;">
                <i class = "fa-solid fa-bars-progress" id = "font-awesome"></i>
                    <a href = "customerprogress.php"> Progress </a>
                </div>
            </div>
            <style>
                .main-nav-bar a
                {
                    line-height: 7;
                }
                
                #font-awesome
                {
                    margin-top: 105px;
                }
            </style>
             <script>
            document.addEventListener("DOMContentLoaded", function () {
            // Get references to elements
            const popup = document.querySelector('.popupImage');
            const popupImage = document.querySelector('.popupImage img');
            const popupClose = document.querySelector('.popupImageClose');
            
            // Get references to all images
            const images = document.querySelectorAll('.adminImage img, .customerimage img');

            // Attach click event to each image
            images.forEach(function (image) {
                image.addEventListener('click', function () {
                    // Set the clicked image source to the popup image source
                    popupImage.src = this.src;

                    // Display the popup
                    popup.style.display = 'block';
                });
            });

            // Attach click event to close button
            popupClose.addEventListener('click', function () {
                // Hide the popup
                popup.style.display = 'none';
            });
        });
            </script>
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
            
        </div>

        <style>
            .main-nav-bar a {
                margin-top: 30%;
            }

        </style>
        
        <div class="progress-main-section">
            <div class="image-comment section1">
                <div class="search-bar">
                    <i class="fas fa-search" id="search-icon" style = "left: 57%;"></i>
                    <input type="text" placeholder="Search" class="nav-search-bar" style = 'margin-left: 8%;'>
                </div>
                <div class="image1" style="margin-top: 50px;">
                    <?php
                    include_once("../PHP/databaseconnect.php");
                    $sql = "SELECT * FROM `adminImage`";
                    $result = mysqli_query($conn, $sql);
                    echo "
                        <div class = 'popupImage' >
                            <span class = 'popupImageClose'> &times; </span>
                            <img src = '../Images/Edited.jpg' />
                        </div>
                    ";
                    echo "<div class = '' style = 'display: flex; gap: 125px; flex-wrap: wrap; width: 120%; margin-left: 10%;'>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        $adminID = $row["AID"];
                        $img = $row["ImgName"];
                        $comment = $row["Comment"];

                        /*@@@@@@@@@@@@@@@@@ selecting images uploaded by customer @@@@@@@@@@@@@@@@ */

                        $stmt = "SELECT ImgName, Comment From customerimage WHERE AID = $adminID";
                        if($resultc = mysqli_query($conn, $stmt))
                        {
                            if(mysqli_num_rows($resultc) > 0 )
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
                            <div class = 'adminProgressHero' style = 'margin-left: 5%;'>
                                <div class = 'progressAdmin'>
                                    <div class = 'adminImage'><img src = '$img' style = 'width: 400px; height: 300px;'></div>
                                    <p class = 'imageTitle' style = 'color: white; font-weight: 550;'>$comment</p>
                                    
                                </div>
                            </div>
                            <div class = 'userProgressHero'>
                        ";
                        
                            showimage($image);
                        echo "
                            <p class = 'imageTitle' style = 'color: white; font-weight: 550;'>$cmnt</p>

                            <form action = 'processclientreply.php' method = 'POST' enctype = 'multipart/form-data' style = 'margin-top: 5%;'>
                                <p class='image-comment-goes-here'>
                                    <textarea cols = '50' rows = '5' name ='comment'
                                    placeholder = 'comment on the image as seen directly on your left. you can add an image if necessary to help us understand you better.'></textarea>
                                </p>
                                <p>
                                    <input type='file' id='input-file' accept='image/png, image/jpeg, image/jpg' name = 'imageFile' style = 'display: block; margin-top: 5px;'>
                                </p>
                                <p>
                                    <input type='number' name ='idvalue' value=$adminID hidden>
                                    <button type='submit' class='submit-comment-btn' onclick='addCommentToImage()'
                                    name='addImageAndComment' style='padding: 5px;'> SUBMIT </button>
                                </p>
                            </form>
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
                                echo "<div class = 'customerimage'><img src = '$image' style = 'width: 400px; height: 300px;'></div>";
                            }
                        }
                    ?>
                </div>
            </div>

            <style>
                .progressHero {
                    display: flex;
                    gap: 180px;
                }

                .image2 {
                    width: 500px;
                    height: 400px;
                    border: 1px solid black;
                    margin-top: -50px;
                    background-position: center;
                    background-size: cover;
                }

                img {
                    width: 500px;
                    height: 400px;
                }

                #enterFile {
                    display: none;
                }

                a {
                    text-decoration: none;
                    color: white;
                }

                .progress-main-section {
                    display: flex;
                    gap: 150px;
                }

                .finish-project-btn {
                    margin-left: 10%;
                }

                .image-comment {
                    margin-top: 5%;
                }

                .comment2 {
                    margin-top: -4.5%;
                }

                .image-comment-text {
                    margin-left: 40%;
                }

                textarea {
                    border: 2px solid black;
                    padding: 3px;
                }

                .btn-2 {
                    width: 20%;
                }

                .add-image-comment {
                    width: 97%;
                }
            </style>
            <style>
                img:hover
                {
                    transform: scale(1.1);
                    cursor: pointer;
                }
                .popupImage
                {
                    position: fixed; 
                    z-index: 100; 
                    background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7));
                    height: 100%;
                    width: 100%;
                    top: 0px; 
                    left: 0px;
                    display: none;
                }
                .popupImage img
                {
                    transform: scale(1);
                    width: 800px;
                    height: 500px;
                    margin-left:20%;
                    margin-top: 5%;
                    border: 5px solid white;
                    border-radius: 10px;
                }
                .popupImageClose
                {
                    position: absolute;
                    top: 0;
                    right: 0;
                    font-size: 70px;
                    color: white;
                    cursor: pointer;
                    font-weight: bolder;
                }
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
        </div>
    </div>

    <?php
    ?>

    <script src="../JS/all.js"></script>
    <script src="../JavaScript/general.js" defer></script>
</body>

</html>