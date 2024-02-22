<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Customer Create Account </title>
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>
    <form action = "" method = "POST" id = "myform">
        <div id = "container">
            <div class = "hero">
                <h2> Customer registration </h2>
                <div class = "name">
                    <label for = "name" class = label-name> Username </label>
                    <p><input type = "text" name = "name" required autocomplete></p>
                </div>
                <div class = "email">
                    <label for = "name" class = label-email> Email </label>
                    <p><input type = "email" name = "email" required autocomplete></p>
                </div>
                <div class = "tel">
                    <label for = "name" class = label-email> Tel </label>
                    <p><input type = "text" name = "tel" required autocomplete></p>
                    <span id="integerError" class="error"></span>
                </div>
                <div class = "address">
                    <label for = "name" class = label-email> Address </label>
                    <p><input type = "text" name = "addy" required autocomplete></p>
                </div>
                <div class = "gender">
                    <label for = "gender" class = label-gender> Gender </label>
                    <p><select id = "gender" name = "gender" required>
                        <option> Male </option>
                        <option> Female </option>
                    </select></p>
                </div>
                <div class = "country">
                    <label for = "name" class = label-country> Country </label>
                    <p><input type = "text" name = "country" required autocomplete></p>
                </div>
                <div class = "country-code">
                    <label for = "text" class = label-cc> Country code </label>
                    <p><input type = "text" name = "country-code" required autocomplete></p>
                </div>
                <div class = "password">
                    <label for = "name" class = label-password> Password </label>
                    <p><input type = "password" name = "password" required autocomplete></p>
                </div>
                <button type = "submit" name = "submit" class = "submit"> Register </button>
            </div>
        </div>
    </form>


    <?php
        include_once("../PHP/databaseconnect.php");
        if(isset($_POST["submit"]))
        {
            $Name = $_POST["name"];
            $Email = $_POST["email"];
            $Tel = $_POST["tel"];
            $Password = $_POST["password"];
            $Gender = $_POST["gender"];
            $Country = $_POST["country"];
            $CountryCode = $_POST["country-code"];
            $Address = $_POST["addy"];

            $sql = "SELECT Username, Email FROM `create_account` WHERE Username = '$Name' OR Email = '$Email'";
            $result = mysqli_query($conn, $sql);
            if($result)
            {
                if(mysqli_num_rows($result) > 0)
                {
                    echo "<script> alert('Email or Username already used') </script> ";
                }
                else
                {
                    $sql = "INSERT INTO `create_account` (Username, Email, Tel, Address, Gender, Country, Country_Code, Password, Status) VALUES ('$Name', '$Email', '$Tel', '$Address', '$Gender', '$Country', '$CountryCode', '$Password', 'user')";
                    $result = mysqli_query($conn, $sql);
                    if($result)
                    {
                        echo "<script> alert('Account successfully created') </script> ";
                        $sql = "INSERT INTO `login` VALUES ('$Name', '$Password', 'user')";
                        $result = mysqli_query($conn, $sql);
                        header("location: signin.php");
                    }
                    else
                    {
                        die ("Account could not be created".mysqli_errno($conn));
                    }
                }
            }    
        }      
    ?>
</body>
</html>