<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <title> Project Team Dashboard </title>
        <link rel = "stylesheet" href = "../CSS/general.css">
    </head>
    <body>
        <div id = "container">
            <div class = "nav">
                <div class = "main-nav-bar">
                    <a href = "admin dashboard.php"> Dashboard </a>
                    <a href = "contact.php"> Contacts </a>
                    <a href = "progress.php"> Progress </a>
                    <a href = ""> Reports </a>
                    <a href = ""> Settings </a>
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
                        <i class = "fa-solid fa-user" id = "user-icon"></i><span class = "administrator"> Administrator </span>
                        <i class = "fa-solid fa-angle-down" id = "angle-down-icon" onclick = "logout()"></i>
                    </div>
                </div>
            </div>

            <div class = "dashboard-square">
                <div class = "box">
                    <span class = "price"> 300,000F </span>
                    <i class = "fas fa-arrow-up" id = "arrow-up"></i>
                   <p><span class = "revenue"> Total revenue <br> generated </span> </p>
                   <p><span class = "view-revenue"> view revenue </span></p>
                   <i class = "fas fa-arrow-right" id = "arrow-right"></i>
                   <div class = "lowerbox"></div>
                </div>
                <div class = "box for-job-uncompleted">
                    <span class = "price uncompletedJobs"> 3 </span>
                   <p><span class = "revenue jobuncompleted"> Uncompleted <br> Jobs</span> </p>
                   <p><span class = "view-revenue uncompletedjob"> view uncompleted jobs </span></p>
                   <i class = "fas fa-arrow-right" id = "arrow-uncompletedjob" onclick = "uncompletedJob()"></i>
                   <div class = "lowerbox"></div>
                </div>
                <div class = "box for-job-completed">
                    <span class = "price completedJobs"> 50 </span>
                   <p><span class = "revenue jobcompleted"> Completed <br> Jobs </span> </p>
                   <p><span class = "view-revenue uncompletedjob"> view completed jobs </span></p>
                   <i class = "fas fa-arrow-right" id = "arrow-completedjob" onclick = "completedProjects()"></i>
                   <div class = "lowerbox"></div>
                </div>
                <div class = "box for-customer-requests">
                    <span class = "price request-count"> 11 </span>
                   <p><span class = "revenue customer-requests"> Customer <br> requests </span> </p>
                   <p><span class = "view-revenue uncompletedjob"> view customer requests </span></p>
                   <i class = "fas fa-arrow-right" id = "arrow-uncompletedjob" onclick = "viewRequests()"></i>
                   <div class = "lowerbox"></div>
                </div>
                
            </div>

            <!-- What happens when you click on view requests -->
            <div id = "view_request">
                <h3> Project Requests </h3>
                <table>
                    <tr>
                        <th> ID </th>
                        <th> Client name </th>
                        <th> Project Title </th>
                        <th> Action </th>
                    </tr>
                    <?php
                        include_once("../PHP/databaseconnect.php");
                       $sql = "SELECT * FROM `create_project` WHERE Status = 'Decline'";
                       if($result = mysqli_query($conn, $sql))
                       {
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $identity = $row["ID"];
                            echo "
                            <form method = 'POST'>
                                    <tr>
                                        <td> $identity </td>
                                        <td> $row[Customer_Name] </td>
                                        <td> $row[Project_Name] </td>
                                        <td>
                                            <button type = 'submit' class = 'accept' name = 'accept'>  <a href = 'accept.php?id=$identity' style = 'text-decoration: none; color: black;'> Accept </a> </button>
                                            <button type = 'submit' class = 'decline'><a href = 'decline.php?IDD=$identity' style = 'text-decoration: none; color: black;'> Decline </a></button>
                                            <button type = 'submit' class = 'details' onclick = 'viewDescription()'> <a href = 'details.php?ID=$identity' style = 'text-decoration: none; color: black;'> Details </a></button>
                                        </td>
                                    </tr>
                                </form> 
                                ";   
                        }
                       }
                    ?>
                </table>
                <button type = "button" class = "accept back" onclick = "toHomePage()"> Close </button>
            </div>
             <!-- This is what happens when you click on uncompleted projects -->

             <div id = "uncompleted-project">
                <h3> Uncompleted Projects </h3>
                <table>
                    <tr>
                        <th> ID </th>
                        <th> Client name </th>
                        <th> Project Title </th>
                        <th> Action </th>
                    </tr>
                    <?php
                        include_once("../PHP/databaseconnect.php");
                        $sql = "SELECT * FROM `create_project` WHERE Status = 'Accept'";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $identity = $row["ID"];
                            echo "
                                <tr>
                                    <form method = 'POST'>
                                        <td> $row[ID] </td>
                                        <td> $row[Customer_Name] </td>
                                        <td> $row[Project_Name] </td>
                                        <td>
                                            <button type = 'submit' class = 'accept'><a href = 'progress.php'style = 'text-decoration: none; color: black;'> View </a></button>
                                            <button type = 'submit' class = 'accept'> <a href = 'details.php?ID=$identity' style = 'text-decoration: none; color: black;'> Details </a></button>
                                            <button type = 'submit' class = 'accept'><a href = 'decline.php?IDD=$identity' style = 'text-decoration: none; color: black;'> Delete </a></button>
                                        </td>
                                    </form>
                                </tr>
                            ";
                        }
                    ?>
                </table>
                <button type = "button" class = "accept back" onclick = "HideUncompletedJob()"> Close </button>
            </div>

            <!-- This is what happens when you click on view completed projects -->

            <div id = "uncompleted-project completed-project">
                <h3> Uncompleted Projects </h3>
                <table>
                    <tr>
                        <th> ID </th>
                        <th> Client name </th>
                        <th> Project Title </th>
                        <th> Action </th>
                    </tr>
                </table> 
            </div>          
        </div>

        <style>
            
        </style>

        <script src = "../JS/all.js"></script>
        <script src = "../JavaScript/general.js" defer></script>
    </body>
</html>