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
                    <div class = "image-and-comment">
                        <div class = "image"></div>
                        <p class = "image-comment-goes-here"></p>
                        <input type = "text" class = "add-image-comment" placeholder = "add comment to image">
                        <button type = "submit" class = "submit-comment-btn" onclick = "addCommentToImage()"> SEND </button>
                        <p>
                            <label for = "input-file" class = "image-comment-text"> Upload Image </label>
                            <input type = "file" id = "input-file" accept = "image/png, image/jpeg, image/jpg">
                        </p>
                    </div>
                    <hr>
                </div>
                <div class = "image-comment">
                    <div class = "image-and-comment">
                        <div class = "image2"></div>
                        <p class = "image-comment-goes-here"></p>
                        <textarea name =" " id = "" cols ="31" rows ="3" class = "add-image-comment" placeholder = "upload a comment based on the image directly on your left. You can also add an image to help us better understand you"></textarea>
                        <p><button type = "submit" class = "submit-comment-btn btn-2" onclick = "addCommentToImage()"> SEND </p></button>
                        <p>
                            <label for = "enterFile" class = "image-comment-text"> Upload Image </label>
                            <input type = "file" id = "enterFile" accept = "image/png, image/jpeg, image/jpg">
                        </p>
                    </div>
                    <hr>
                </div>
                <style>
                    .image2
                    {
                        width: 400px;
                        height: 300px;
                        border: 1px solid black;
                        margin-top: -50px;
                        background-position: center;
                        background-size: cover;
                    }
                    #enterFile
                    {
                        display: none;
                    }
                    .section1
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
                        gap: 400px;
                    }
                    .finish-project-btn
                    {
                        margin-left: 10%;
                    }
                    .image-comment
                    {
                        margin-top: 5%;
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
            <form method = "POST">
                <button type = "submit" class = "decline finish-project-btn" name = "submitproject"><a href = "finish.php"> Finish </button>
            </form>
        </div>
        <script src = "../JS/all.js"></script>
        <script src = "../JavaScript/general.js" defer></script>
    </body>
</html>


