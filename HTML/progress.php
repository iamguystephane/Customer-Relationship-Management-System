<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <title> Home Page </title>
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
                        <i class = "fa-solid fa-angle-down" id = angle-down-icon></i>
                    </div>
                </div>
            </div>
            <div class = "progress-main-section">
                <div class = "image-comment">
                    <div class = "image-and-comment">
                        <div class = "image"></div>
                        <p class = "image-comment-goes-here"></p>
                        <input type = "text" class = "add-image-comment" placeholder = "add comment to image">
                        <button type = "submit" class = "submit-comment-btn" onclick = "addCommentToImage()"> Add </button>
                        <p>
                            <label for = "input-file" class = "image-comment-text"> Upload Image </label>
                            <input type = "file" id = "input-file" accept = "image/png, image/jpeg, image/jpg">
                        </p>
                    </div>
                    <hr>
                </div>
                <form method = "POST">
                    <button type = "submit" class = "decline finish-project-btn" name = "submitproject"><a href = "finish.php"> Finish </button>
                </form>
                <style>
                    a
                    {
                        text-decoration: none;
                        color: white;
                    }
                </style>
            </div>
        </div>
        <script src = "../JS/all.js"></script>
        <script src = "../JavaScript/general.js" defer></script>
    </body>
</html>