<?php
// post.php

// Establish a database connection (replace with your actual credentials)
$conn = new mysqli("localhost", "root", "", "post");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the submitted post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_content = $_POST["post_content"];

    // Insert the post into the 'posts' table
    $insert_post_query = "INSERT INTO posts (content) VALUES ('$post_content')";
    $conn->query($insert_post_query);

    // Redirect back to the main page or display a success message
    header("Location: index.php");
    exit();
}

// Close the database connection
$conn->close();
?>