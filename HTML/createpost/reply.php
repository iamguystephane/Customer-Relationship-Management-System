<?php
// reply.php

// Establish a database connection (replace with your actual credentials)
$conn = new mysqli("localhost", "root", "", "post");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the submitted reply
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST["post_id"];
    $reply_content = $_POST["reply_content"];

    // Insert the reply into the 'replies' table
    $insert_reply_query = "INSERT INTO replies (post_id, content) VALUES ('$post_id', '$reply_content')";
    $conn->query($insert_reply_query);

    // Redirect back to the main page or display a success message
    header("Location: index.php");
    exit();
}

// Close the database connection
$conn->close();
?>
