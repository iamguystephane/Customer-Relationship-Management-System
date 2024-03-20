<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> Home Page </title>
    <link rel="stylesheet" href="../CSS/contact.css">
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

            <style>
                #font-awesome
                {
                    color: white;
                    margin-top: 90px;
                    font-size: 30px;
                    margin-left: 7%;
                    cursor: pointer;
                }
            </style>

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
                        <i class="fa-solid fa-user" id="user-icon"></i><span class="administrator"> Project Team
                        </span>
                        <a href="signin.php"><i class="fa-solid fa-power-off" id="power-icon"
                                onclick="Logout()"></i></a>
                    </div>
                </div>
                <div class="search-bar" style="margin-top: 3%; margin-left: 35%;">
                    <i class="fas fa-search" id="search-icon"></i>
                    <input type="text" placeholder="Search" class="nav-search-bar">
                </div>
            </div>
        </div>
        <table>
            <tr>
                <th> ID </th>
                <th> Name </th>
                <th> Country </th>
                <th> Email </th>
                <th> Address </th>
                <th> Tel </th>
            </tr>
            <?php
            include("../PHP/databaseconnect.php");
            $sql = "SELECT ID, Username, Country, Email, Address, Tel FROM `create_account` WHERE Status = 'user'";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                        <tr>
                            <td onclick = 'updateRecord()'> $row[ID] </td>
                            <td onclick = 'updateRecord()'> $row[Username] </td>
                            <td onclick = 'updateRecord()'> $row[Country] </td>
                            <td onclick = 'updateRecord()'> $row[Email] </td>
                            <td onclick = 'updateRecord()'> $row[Address] </td>
                            <td onclick = 'updateRecord()'> $row[Tel] </td>
                        </tr>
                        ";
            }
            ?>

        </table>
        <button class="add-record" type="button" onclick="createRecord()"> Add Record </button>
        <!-- information that pops up when the user clicks on the add record button -->
        <div class="add-record-page">

            <form>
                <div class="id">
                    <label> ID: </label>
                    <input type="number">
                </div>
                <div class="name">
                    <label> Name: </label>
                    <input type="text">
                </div>
                <div class="country">
                    <label> Country: </label>
                    <input type="text">
                </div>
                <div class="city">
                    <label> City: </label>
                    <input type="text">
                </div>
                <div class="address">
                    <label> Address: </label>
                    <input type="text">
                </div>
                <div class="tel">
                    <label> Tel: </label>
                    <input type="text">
                </div>
            </form>
            <button type="button" class="submit-add-record add-record" onclick="addRecord()"> Add </button>
            <button type="button" class="submit-back-record add-record" onclick="Back()"> Close </button>
        </div>
        <!-- information that pops up when the user clicks on a record -->
        <div class="update-record-page">
            <h3> Update Record </h3>
            <form>
                <div class="id">
                    <label> ID: </label>
                    <input type="number">
                </div>
                <div class="name">
                    <label> Name: </label>
                    <input type="text">
                </div>
                <div class="country">
                    <label> Country: </label>
                    <input type="text">
                </div>
                <div class="city">
                    <label> City: </label>
                    <input type="text">
                </div>
                <div class="address">
                    <label> Address: </label>
                    <input type="text">
                </div>
                <div class="tel">
                    <label> Tel: </label>
                    <input type="text">
                </div>
            </form>
            <div class="update-record-btns">
                <button type="button" class="submit-update-record add-record" onclick="updateRecord()"> Update </button>
                <button type="button" class="submit-delete-record add-record" onclick="deleteRecord()"> Delete </button>
                <button type="button" class="submit-back-record add-record" onclick="goBack()"> Close </button>
            </div>
        </div>
    </div>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            height: 100%;
            width: 100%;
            position: relative;
            background-color: rgba(0, 0, 0, 0.74);
            background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url("../Images/homepage.jpg");
            background-position: center;
            background-size: cover;
        }

        /* nav bar */
        .nav {
            display: flex;
        }

        .header-bar {
            width: 100%;
            height: 50px;
            padding: 10px;
            background: #5c0031;
            text-align: center;
            justify-content: center;
            position: fixed;
            z-index: 1;
        }

        .main-nav-bar {
            background-color: #2a0053;
            width: 13%;
            height: 100vh;
            position: fixed;
        }

        .main-nav-bar a {
            display: block;
            text-decoration: none;
            color: grey;
            line-height: 1.5;
            text-align: center;
            margin-top: 50%;
            font-size: 20px;
        }
        .main-nav-bar a:hover {
            color: white;
        }
        .line-dashboard
        {
            height: 1px;
            width: 60px;
            background: white;
            margin-left: 40%;
            margin-top: -15%;
            display: none;
        }
        .secondary-nav {
            display: flex;
            margin: 10px;
            justify-content: space-between;
            width: 100%;
        }

        /* dashboard */
        .contact {
            display: flex;
            margin: 10px;
            justify-content: space-between;
            width: 100%;
            margin-left: 10%;
            margin-bottom: -100%;
        }

        .search-bar {
            position: relative;
            height: 6vh;
            display: flex;
        }

        .nav-search-bar {
            outline: 0;
            padding: 10px;
            width: 450px;
            height: 25px;
            padding-left: 2em;
            border: 0;
            border-radius: 20px;
            background-color: rgba(0, 0, 0, 0.616);
            color: white;
        }

        #notification-bell {
            width: 25px;
            height: 25px;
            margin-top: -5px;
            margin-left: 100px;
            cursor: pointer;
            padding: 5px;
            color: white;
        }

        #notification-bell:hover {
            background-color: #6a1ab9;
            border-radius: 50%;
            color: white;
        }

        .nav-search-bar::placeholder {
            color: white;
        }

        #search-icon {
            position: absolute;
            top: 10px;
            left: 48%;
            font-size: 20px;
            /* transform: rotate(90deg); */
            cursor: pointer;
            color: white;
        }

        .search-bar {
            margin-left: 25%;
            margin-top: -2%;
        }

        .nav-search {
            text-transform: uppercase;
            padding: 4px;
            border: 0;
            background-color: red;
            color: white;
            font-weight: 600;
            cursor: pointer;
        }

        .user {
            display: flex;
            gap: 20px;
            margin-right: 5%;
        }

        .administrator {
            font-size: 20px;
            font-weight: bold;
            color: white;
            margin-top: 4px;
        }

        #user-icon {
            font-size: 20px;
            color: white;
            margin-top: 4px;
        }

        #power-icon {
            width: 20px;
            height: 20px;
            color: white;
            background: grey;
            border-radius: 50%;
            padding: 5px;
            cursor: pointer;
        }

        table,
        th,
        td {
            margin-left: 15%;
            text-align: center;
            border: 2px solid black;
            border-collapse: collapse;
            padding: 10px;
            margin-top: 12%;
            color: white;
        }

        table th {
            background-color: black;
            color: white;
            width: 165px;
        }

        table tr:hover {
            cursor: pointer;
            background-color: black;
            color: white;
        }

        .add-record-page {
            margin-left: 14%;
            margin-top: 2%;
            padding: 10px;
            width: 600px;
            display: none;
            background: transparent;
        }

        .add-record {
            margin-left: 15%;
            margin-top: 1%;
            padding: 10px;
            background-color: black;
            color: white;
            border: 0;
            cursor: pointer;
            border-radius: 4px;
        }

        .add-record-page input {
            margin-top: 5px;
            line-height: 1.5;
            padding: 5px;
            width: 400px;
            outline: 0;
            border: 0;
            background: transparent;
        }

        legend {
            color: black;
            font-weight: 600;
            font-size: 20px;
        }

        .submit-add-record {
            margin-left: 1%;
        }

        .update-record-page {
            margin-left: 14%;
            margin-top: 2%;
            padding: 10px;
            width: 600px;
            display: none;
            background-color: transparent;
        }

        .update-record-page input {
            margin-top: 5px;
            line-height: 1.5;
            padding: 5px;
            width: 400px;
            outline: 0;
            border: 0;
            background: transparent;
        }

        .view-request {
            margin-left: 17%;
        }
    </style>

    <script src="../JavaScript/general.js" defer></script>
    <script src="../JS/all.js"></script>
</body>

</html>