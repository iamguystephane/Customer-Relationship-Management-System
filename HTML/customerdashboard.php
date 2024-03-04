<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <title> Home Page </title>
        <link rel = "stylesheet" href = "../CSS/customer.css">
    </head>
    <body>
        <div id = "container">
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
                    margin-top: 30%;
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
        </div>
        <script src = "../JS/all.js"></script>
        <script src = "../JavaScript/general.js" defer></script>
    </body>
</html>
