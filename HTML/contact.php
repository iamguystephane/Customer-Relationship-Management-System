<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <title> Home Page </title>
        <link rel = "stylesheet" href = "../CSS/contact.css">
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
                    <div class = "notification-icon">
                        <i class = "fas fa-bell" id = "notification-bell"></i>
                    </div>
                    <div class = "search-bar" style = 'margin: 0px;'>
                        <i class = "fas fa-search" id = "search-icon"></i>
                        <input type = "text" placeholder = "Search" class = "nav-search-bar">
                    </div>
                    <div class = "user">
                        <i class = "fa-solid fa-user" id = "user-icon"></i><span class = "administrator"> Administrator </span>
                        <i class = "fa-solid fa-angle-down" id = "angle-down-icon" onclick = "logout()"></i>
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
                    while( $row = mysqli_fetch_assoc($result) )
                    {
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
            <button class = "add-record" type = "button" onclick = "createRecord()"> Add Record </button>
            <!-- information that pops up when the user clicks on the add record button -->
            <div class = "add-record-page">
            
                <form>
                        <div class = "id">
                            <label> ID: </label>
                            <input type = "number">
                        </div>
                        <div class = "name">
                            <label> Name: </label>
                            <input type = "text">
                        </div>
                        <div class = "country">
                            <label> Country: </label>
                            <input type = "text">
                        </div>
                        <div class = "city">
                            <label> City: </label>
                            <input type = "text">
                        </div>
                        <div class = "address">
                            <label> Address: </label>
                            <input type = "text">
                        </div>
                        <div class = "tel">
                            <label> Tel: </label>
                            <input type = "text">
                        </div>
                    </form>
                    <button type = "button" class = "submit-add-record add-record" onclick = "addRecord()"> Add </button>
                    <button type = "button" class = "submit-back-record add-record" onclick = "Back()"> Close </button>
            </div>
            <!-- information that pops up when the user clicks on a record -->
            <div class = "update-record-page">
                <h3> Update Record </h3>
                <form>
                    <div class = "id">
                        <label> ID: </label>
                        <input type = "number">
                    </div>
                    <div class = "name">
                        <label> Name: </label>
                        <input type = "text">
                    </div>
                    <div class = "country">
                        <label> Country: </label>
                        <input type = "text">
                    </div>
                    <div class = "city">
                        <label> City: </label>
                        <input type = "text">
                    </div>
                    <div class = "address">
                        <label> Address: </label>
                        <input type = "text">
                    </div>
                    <div class = "tel">
                        <label> Tel: </label>
                        <input type = "text">
                    </div>
                </form>
                <div class = "update-record-btns">
                    <button type = "button" class = "submit-update-record add-record" onclick = "updateRecord()"> Update </button>
                    <button type = "button" class = "submit-delete-record add-record" onclick = "deleteRecord()"> Delete </button>
                    <button type = "button" class = "submit-back-record add-record" onclick = "goBack()"> Close </button>
                </div>
            </div>
        </div>
        <script src = "../JavaScript/general.js" defer></script>
        <script src = "../JS/all.js"></script>
    </body>
</html>