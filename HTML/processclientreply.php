<?php 

include_once("../PHP/databaseconnect.php");

/*###################### inserting into customers table ################ */

    if(isset($_POST["addImageAndComment"]))
    {
        $adminID = $_POST['idvalue'];
        $comment = $_POST["comment"];
        $image = $_FILES["imageFile"];
        $imageFileName = $image["name"];
        $imageFileTemp = $image["tmp_name"];
        $fileName_separate = explode('.', $imageFileName);
        $file_extension = strtolower(end($fileName_separate));
        $extension = array('jpeg', 'jpg', 'png');
        if (in_array($file_extension, $extension)) {
            $upload_image = '../images/' . $imageFileName;
            move_uploaded_file($imageFileTemp, $upload_image);
        }
        if($comment != '' OR $upload_image != '')
        {
            $sqli = "SELECT * FROM customerImage";
            $resulti = mysqli_query($conn,$sqli);
            while( $row = mysqli_fetch_assoc($resulti) ){
                $imageColumn = $row["ImgName"];
                $adminIDColumn = $row["AID"];
                $commentColumn = $row["Comment"];
                if($adminIDColumn == $adminID)
                {
                    $sql = "UPDATE `customerImage` SET ImgName = '$upload_image' WHERE AID = $adminID";
                    $result = mysqli_query($conn,$sql);

                    $sqlcomment = "UPDATE `customerImage` SET Comment = '$comment' WHERE AID = $adminID";
                    $result = mysqli_query($conn,$sqlcomment);

                    header("Location: customerprogress.php");
                }

                else
                {
                    $sql = "INSERT INTO `customerImage` (AID, ImgName, Comment) VALUES ('$adminID', '$upload_image', '$comment')";
                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        echo "<script> alert('Data inserted successfully') </script>";
                    }       
                    else {
                        die(mysqli_error($conn));
                    }
                }
            }
        }
    }
    header("Location: customerprogress.php");

?>