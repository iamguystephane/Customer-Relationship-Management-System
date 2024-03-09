<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> Project Team Dashboard </title>
    <link rel = "stylesheet" href = "../CSS/general.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
</head>

<body>
    
    <div id="container">
        <div class="nav">
            <div class="main-nav-bar">
                <div class = "main-nav-bar-a">
                    <div class = "dashboard" style = "display: flex; gap: 20px;">
                    <i class = "fa fa-dashboard" id = "font-awesome"></i>
                        <a href="admin_dashboard.php"> Dashboard </a>
                    </div>
                    <div class = "contacts" style = "display: flex; gap: 25px;">
                        <i class = "fa-solid fa-address-book" id = "font-awesome" style = "margin-top: 55%;"></i>
                        <a href="contact.php" style = "margin-top: 95px;"> Contacts </a>
                    </div>
                    <div class = "line-dashboard"></div>
                    <div class = "progress" style = "display: flex; gap: 25px;">
                        <i class = "fa-solid fa-bars-progress" id = "font-awesome"></i>
                        <a href="progress.php"> Progress </a>
                    </div>
                    <div class = "reports" style = "display: flex; gap: 30px;">
                        <i class = "fa fa-file" id = "font-awesome"> </i>
                        <a href = ""> Reports </a>
                    </div>
                    <div class = "settings" style = "display: flex; gap: 20px;">
                        <i class = "fa fa-cog" aria-hidden = "true" id = "font-awesome"> </i>
                        <a href = ""> Settings </a>
                    </div>
                </div>
            </div>

            <div class="header-bar">
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
                        <i class="fa-solid fa-user" id="user-icon"></i><span class="administrator"> Administrator
                        </span>
                        <a href="signin.php"><i class="fa-solid fa-power-off" id="power-icon"
                        onclick="Logout()"></i></a>
                    </div>
                </div>
                <div class="search-bar" style="margin-top: 3%; margin-left: 32%;">
                    <i class="fas fa-search" id="search-icon"></i>
                    <input type="text" placeholder="Search" class="nav-search-bar">
                </div>
            </div>
        </div>

        <div class="dashboard-square">
            <div class="box">
                <span class="price"> 300,000F </span>
                <i class="fas fa-arrow-up" id="arrow-up"></i>
                <p><span class="revenue"> Total revenue <br> generated </span> </p>
                <p><span class="view-revenue"> view revenue </span></p>
                <i class="fas fa-arrow-right" id="arrow-right"></i>
                <div class="lowerbox"></div>
            </div>
            <div class="box for-job-uncompleted">

                <!-- This is the PHP for counting the number of incomplete projects in the incomplete box -->
                <?php
                    include_once("../PHP/databaseconnect.php");
                    $sql = "SELECT * FROM create_project where Status = 'accept'";
                    $result = mysqli_query($conn,$sql);
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $count = $count + 1;
                    }
                    echo " <span class = 'price uncompletedJobs'> $count </span> ";
                ?>

                <p><span class="revenue jobuncompleted"> Uncompleted <br> Jobs</span> </p>
                <p><span class="view-revenue uncompletedjob"> view uncompleted jobs </span></p>
                <i class="fas fa-arrow-right" id="arrow-uncompletedjob" onclick="uncompletedJob()"></i>
                <div class="lowerbox"></div>
            </div>
            <div class="box for-job-completed">

                <!-- This is the PHP for counting the number of complete projects in the complete box -->
                <?php
                    include_once("../PHP/databaseconnect.php");
                    $sql = "SELECT * FROM create_project where Status = 'complete'";
                    $result = mysqli_query($conn,$sql);
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $count = $count + 1;
                    }
                    echo " <span class = 'price completedJobs' style = 'margin-left: 3%;'> $count </span> ";
                ?>

                <p><span class="revenue jobcompleted"> Completed <br> Jobs </span> </p>
                <p><span class="view-revenue uncompletedjob"> view completed jobs </span></p>
                <i class="fas fa-arrow-right" id="arrow-completedjob" onclick="completedProjects()"></i>
                <div class="lowerbox"></div>
            </div>
            <style>.box{box-shadow :2px 2px 10px 4px rgba(0, 0, 0, 0.5);}</style>
            <div class="box for-customer-requests">
                
                <!-- This is the PHP for counting the number of incoming projects in the view requests box -->
                <?php
                    include_once("../PHP/databaseconnect.php");
                    $sql = "SELECT * FROM create_project where Status = 'decline'";
                    $result = mysqli_query($conn,$sql);
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $count = $count + 1;
                    }
                    echo "<span class = 'price request-count'> $count </span>";
                ?>

                <p><span class="revenue customer-requests"> Customer <br> requests </span> </p>
                <p><span class="view-revenue uncompletedjob"> view customer requests </span></p>
                <i class="fas fa-arrow-right" id="arrow-uncompletedjob" onclick="viewRequests()"></i>
                <div class="lowerbox"></div>
            </div>

        </div>

        <!-- What happens when you click on view requests -->
        <div id="view_request">
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
                if ($result = mysqli_query($conn, $sql)) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $identity = $row["ID"];
                        echo "
                            <form method = 'POST'>
                                <tr>
                                    <td> $identity </td>
                                    <td> $row[Customer_Name] </td>
                                    <td> $row[Project_Name] </td>
                                    <td>
                                        <button type = 'submit' class = 'accept' name = 'accept'>  <a href = 'accept.php?id=$identity' style = 'text-decoration: none; color: white;'> Accept </a> </button>
                                        <button type = 'submit' class = 'decline'><a href = 'decline.php?IDD=$identity' style = 'text-decoration: none; color: white;'> Decline </a></button>
                                        <button type = 'submit' class = 'details' onclick = 'viewDescription()'> <a href = 'details.php?ID=$identity' style = 'text-decoration: none; color: white;'> Details </a></button>
                                    </td>
                                </tr>
                            </form> 
                        ";
                    }
                }
                ?>
            </table>
            <button type="button" class="accept back" onclick="toHomePage()" style = "background: red; color: white;"> Close </button>
        </div>
        <!-- This is what happens when you click on uncompleted projects -->

        <div id="uncompleted-project">
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
                while ($row = mysqli_fetch_assoc($result)) {
                    $identity = $row["ID"];
                    echo "
                    <tr>
                        <form method = 'POST'>
                            <td> $row[ID] </td>
                            <td> $row[Customer_Name] </td>
                            <td> $row[Project_Name] </td>
                            <td>
                                <button type = 'submit' class = 'accept'><a href = 'progress.php'style = 'text-decoration: none; color: black;'> View </a></button>
                                <button type = 'submit' class = 'details'> <a href = 'detailsUncompleted.php?ID=$identity' style = 'text-decoration: none; color: white;'> Details </a></button>
                                <button type = 'submit' class = 'decline'><a href = 'decline.php?IDD=$identity' style = 'text-decoration: none; color: white;'> Delete </a></button>
                            </td>
                        </form>
                    </tr>
                ";
                }
                ?>
            </table>
            <button type="button" class="decline back" onclick="HideUncompletedJob()"> Close </button>
        </div>

        <!-- This is what happens when you click on view completed projects -->

        <div class="">

        </div>

    </div>


    <!-- <div id="pieChartContainer" style="width: 400px; height: 300px; margin-left: 20%; margin-top: -10%; background: none;"></div> -->
    <!-- @@@ Inserting the pie chart @@@@@@  -->
    <script>
    // google.charts.load('current', { 'packages': ['corechart'] });
    //     google.charts.setOnLoadCallback(drawChart);

    //     function drawChart() {
    //         // Create a data table with random values
    //         var data = new google.visualization.DataTable();
    //         data.addColumn('string', 'Category');
    //         data.addColumn('number', 'Value');
            
    //         // Generate some random data
    //         var categories = ['Category A', 'Category B', 'Category C'];
    //         for (var i = 0; i < categories.length; i++) {
    //             data.addRow([categories[i], Math.random() * 100]);
    //         }

    //         // Set chart options
    //         var options = {
    //             title: 'Random Values Pie Chart'
    //         };

    //         // Instantiate and draw the chart
    //         var chart = new google.visualization.PieChart(document.getElementById('pieChartContainer'));
    //         chart.draw(data, options);
    //     }
    </script>
    
    
    <script src="../JS/all.js"></script>
    <script src="../JavaScript/general.js" defer></script>
</body>

</html>