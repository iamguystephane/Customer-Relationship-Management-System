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
                    <i class="fas fa-search" id="search-icon" style = "left: 49%;"></i>
                    <input type="text" placeholder="Search" class="nav-search-bar">
                </div>
                <div class="image1" style="margin-top: 50px;">
                    <?php
                    include_once("../PHP/databaseconnect.php");
                    $sql = "SELECT * FROM `adminImage`";
                    $result = mysqli_query($conn, $sql);
                    echo "<div class = '' style = 'display: flex; gap: 125px; flex-wrap: wrap; width: 95%; margin-left: 2%;'>";
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
                            <div class = 'adminProgressHero' style = 'margin-left: 2%;'>
                                <div class = 'progressAdmin'>
                                    <div class = ''><img src = '$img' /></div>
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
                                echo "<div class = ''><img src = '$image' /></div>";
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
        </div>
    </div>

    <?php
    ?>

    <script src="../JS/all.js"></script>
    <script src="../JavaScript/general.js" defer></script>
</body>

</html>