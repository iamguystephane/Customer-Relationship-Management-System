<!-- Create project, Project History, Progress. -->
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
                    <a href = "customer dashboard.php"> Dashboard </a>
                    <a href = ""> Create Project </a>
                    <a href = ""> Progress </a>
                </div>
                <div class = "secondary-nav">
                    <div class = "notification-icon">
                        <i class = "fas fa-bell" id = "notification-bell"></i>
                    </div>
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
            <button type = "" class = "newproject" onclick = "newProject()"> New Project </button>
            <div class = "main-section">
                <form action = "" method = "post">
                    <h2> Create a project </h2>
                    <div class = "name-username">
                        <span class = inputspan> Your Name </span>
                        <input type = "text" class = "username" name = "username" required>
                    </div>
                    <div class = "name-projectname">
                        <i class = "fa fa-close" aria-hidden = "true" id = "closeBtn" onclick = "closeCreateProject()"></i>
                        <span class = "inputspan project-name"> Project name </span>
                        <input type = "text" class = "projectname" name = "nameOfProject" required>
                    </div>
                    <div class = "projectdescription">
                        <span class = "textareaspan"> Project Description </span>
                        <textarea id = "describeproject" cols = "100" rows = "13" name = "project_description" required></textarea>
                    </div>
                    <button type = "submit" class = "submitproject" name = "submitproject"> Submit request </button>
                </form>
            </div>
            <h3> Project History </h3>
            <hr>
            <div class = "project-history">
                <div class = "createdProject">
                    <p class = "createdprojectname"> Web Creation </p>
                    <p class = "projectStatus"> Status: Ongoing/completed </p>
                    <p class = "createdprojectactions">
                        <button type = "submit"> Details </button>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <button type = "submit"> Clear </button>
                    </p>
                </div>
            </div>
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
                    echo "Project Received";
                }
                else
                {
                    echo "Project Not received";
                }
            }
        ?>

        <script src = "../JS/all.js"></script>
        <script src = "../JavaScript/general.js" defer></script>
    </body>
</html>
