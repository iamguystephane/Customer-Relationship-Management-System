<!-- Create project, Project History, Progress. -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <title> Create Project </title>
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
                
                <div class = "settings" style = "display: flex; gap: 20px;">
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
                    <span class = "logo" style = "color: white; text-transform: uppercase; font-size: 20px;"> CRM </span> 
                    <span class = "logo" style = "color: white; text-transform: uppercase; font-size: 20px;"> System </span>
                    <style>
                        .notification-icon
                        {
                            margin-left: -65%;
                        }
                    </style>
                    <div class="notification-icon">
                        <i class="fas fa-bell" id="notification-bell"></i>
                    </div>   

                    <div style="display: flex; gap: 30px; margin-left: 43%; width: 18%; margin-top: -5px; height: 100%;">
                    
                        <div class = "policy" style = "margin-top: 8px;">
                            <a href = ""> Policy </a>
                        </div>
                        <div class = "contact" style = "width: 100vw;">
                            <a href = ""> Contact Us </a>
                        </div>
                    </div>
                    <style>
                        marquee
                        {
                            margin-right: -40%;
                            margin-left: 10%;
                            color: white;
                            font-size: 30px;
                            font-weight: bolder;
                        }
                        .contact a, .policy a
                        {
                            font-size: 20px;
                            margin-bottom: 20px;
                            text-decoration: none;
                            height: 10px;
                            color: lightgrey;
                        }                        
                        .policy a:hover
                        {
                            color: white;   
  
                        }
                        .contact a:hover
                        {
                            color: white;
                            
                        }
                        .notification-icon
                        {
                            margin-left: 70px;
                        }
                        #notification-bell
                        {
                            margin-left: 0px;
                        }
                    </style>

                    <div class="user">
                        <i class="fa-solid fa-user" id="user-icon"></i><span class="administrator"> Administrator </span>
                        <a href = "signin.php"><i class="fa-solid fa-power-off" id = "power-icon" onclick="Logout()"></i></a>
                    </div>
                </div>
            </div>
            
        </div>
            <button type = "" class = "newproject" onclick = "newProject()"> New Project </button>
            <div class = "main-section">
                <form action = "" method = "post">
                    <h2 style = "color: #2a0053"> Create a project </h2>
                    <div class = "name-username">
                        <input type = "text" class = "username" name = "username" placeholder = "name" required>
                    </div>
                    <div class = "name-projectname">
                        <i class = "fa fa-close" aria-hidden = "true" id = "closeBtn" onclick = "closeCreateProject()"></i>
                        <input type = "text" class = "projectname" name = "nameOfProject" placeholder = "project title" required>
                    </div>
                    <div class = "projectdescription">
                        <textarea id = "describeproject" cols = "50" rows = "20" name = "project_description" required placeholder = "Please describe fully what your business is all about inorder to better understand your needs and provide you with quality service"></textarea>
                    </div>
                    <button type = "submit" class = "submitproject" name = "submitproject"> Submit </button>
                </form>
            </div>
            <h3 style = 'margin-top: 15%;'> Project History </h3>
            <hr style = 'margin-top: 20%;'>
            <div class = "project-history">
                <div class = "createdProject">
                    <p class = "createdprojectname"> Web Creation </p>
                    <p class = "projectStatus"> Status: Ongoing/completed </p>
                    <p class = "createdprojectactions">
                        <button type = "submit" class = "details"> Details </button>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <button type = "submit" class = "details clear"> Clear </button>
                    </p>
                </div>
            </div>

            <style>

            </style>

        </div>

        <!-- create project  -->
        <?php
            include_once("../PHP/databaseconnect.php");
            if(isset($_POST["submitproject"]))
            {
                $projectName = $_POST["nameOfProject"];
                $projectDescription = $_POST["project_description"];
                $customerName = $_POST["username"];
        
                $sql = "INSERT INTO `create_project` (Project_Name, Project_Description, Customer_Name) VALUES ('$projectName', '$projectDescription', '$customerName')";
        
                $result = mysqli_query($conn, $sql);
                if ($result)
                {
                    echo "<script> alert('Project Received, check your project status') </script>";
                }
                else
                {
                    echo "<script> alert('Project Submission Failed') </script>";
                }
            }
        ?>

        <script src = "../JS/all.js"></script>
        <script src = "../JavaScript/general.js" defer></script>
    </body>
</html>