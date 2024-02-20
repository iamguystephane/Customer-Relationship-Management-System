<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <title> Home Page </title>
        <link rel = "stylesheet" href = "../CSS/customer.css">
    </head>
    <body>
        <div id = "container">
            <div class = "nav">
                <div class = "main-nav-bar">
                    <a href = "customerdashboard.php"> Dashboard </a>
                    <a href = "createproject.php"> Create Project </a>
                    <a href = "customerprogress.php"> Progress </a>
                </div>
                <div class = "secondary-nav">
                    <div class = "search-bar">
                        <i class = "fas fa-search" id = "search-icon"></i>
                        <input type = "text" placeholder = "Search" class = "nav-search-bar">
                    </div>
                    <div class = "user">
                        <i class = "fa-solid fa-user" id = "user-icon"></i><span class = "administrator"> Guy Stephane </span>
                        <i class = "fa-solid fa-angle-down" id = angle-down-icon></i>
                    </div>
                </div>
            </div>
        </div>
        <script src = "../JS/all.js"></script>
        <script src = "../JavaScript/general.js" defer></script>
    </body>
</html>
