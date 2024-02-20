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
            <table>
                <tr>
                    <th> ID </th>
                    <th> Name </th>
                    <th> Country </th>
                    <th> City </th>
                    <th> Address </th>
                    <th> Tel </th>
                </tr>
                <tr>
                    <td onclick = "updateRecord()"> 1 </td>
                    <td onclick = "updateRecord()"> John Doe </td>
                    <td onclick = "updateRecord()"> America </td>
                    <td onclick = "updateRecord()"> California </td>
                    <td onclick = "updateRecord()"> Los Angeles </td>
                    <td onclick = "updateRecord()"> 012 12121412 </td>
                </tr>
                <tr>
                    <td onclick = "updateRecord()"> 2 </td>
                    <td onclick = "updateRecord()"> Guy Stephane </td>
                    <td onclick = "updateRecord()"> Cameroon </td>
                    <td onclick = "updateRecord()"> Yaounde </td>
                    <td onclick = "updateRecord()"> Mendong </td>
                    <td onclick = "updateRecord()"> 672280977 </td>
                </tr>
                <tr>
                    <td onclick = "updateRecord()"> 3 </td>
                    <td onclick = "updateRecord()"> Rostand Bright </td>
                    <td onclick = "updateRecord()"> Cameroon </td>
                    <td onclick = "updateRecord()"> Bamenda </td>
                    <td onclick = "updateRecord()"> City Chemist </td>
                    <td onclick = "updateRecord()"> 674536434 </td>
                </tr>
                <tr>
                    <td onclick = "updateRecord()"> 4 </td>
                    <td onclick = "updateRecord()"> Marry Anne </td>
                    <td onclick = "updateRecord()"> USA </td>
                    <td onclick = "updateRecord()"> Washington DC </td>
                    <td onclick = "updateRecord()"> Seattle </td>
                    <td onclick = "updateRecord()"> 123 14412312 </td>
                </tr>
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