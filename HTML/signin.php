<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>
    <form action = "" method = "POST">
        <div id = "container">
            <div class = "hero main-section">
                <h2> Log in </h2>
                <div class = "name">
                    <label for = "name" class = label-name> Username or Email </label>
                    <p><input type = "text" name = "name" required autocomplete></p>
                </div>
                <div class = "password">
                    <label for = "name" class = label-password> Password </label>
                    <p><input type = "password" name = "password" required autocomplete></p>
                </div>
                <button type = "submit" name = "submit" class = "submit"> Login </button>
            </div>
        </div>
    </form>
    <?php
        include_once("../PHP/databaseconnect.php");
        if(isset($_POST["submit"]))
        {
            // getting input from form
            $Name = $_POST["name"];
            $Password = $_POST["password"];

            // checking if the username is found in the database
            $usernameCheck = "SELECT * FROM `login` where Username = '$Name' AND Password = '$Password'";
            $resultName = mysqli_query($conn, $usernameCheck);

            // this if condition checks if the username and the password have been found or not and then performs the instructions given

            if ($nameCheck = mysqli_fetch_assoc($resultName))
            {
                $userStatus = $nameCheck['Status'];
                if($userStatus === 'admin')
                {
                    echo "<script> alert('Login Successful') </script> ";
                    header("location: admin_dashboard.php");
                    exit();
                }
                elseif($userStatus === 'user')
                {
                    echo "<script> alert('Login Successful') </script> ";
                    header("location: createproject.php");
                    exit();
                }
                else
                {
                    echo "<script> alert('Unknown Status') </script> ";
                }
            }
            else
            {
                echo "<script> alert('Username or Password is incorrect') </script> ";
            }
        }
    ?>
</body>
</html>