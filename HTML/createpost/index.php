<?php
// index.php

// Establish a database connection (replace with your actual credentials)
$conn = new mysqli("localhost", "root", "", "post");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve posts from the 'posts' table
$get_posts_query = "SELECT * FROM posts";
$posts_result = $conn->query($get_posts_query);

// Display posts and their replies
while ($post = $posts_result->fetch_assoc()) {
    echo "<p>{$post['content']}</p>";

    // Display replies for each post
    $post_id = $post['id'];
    $get_replies_query = "SELECT * FROM replies WHERE post_id = $post_id";
    $replies_result = $conn->query($get_replies_query);

    while ($reply = $replies_result->fetch_assoc()) {
        echo "<blockquote>{$reply['content']}</blockquote>";
    }

    // Display form for replying to each post
    echo "<form action='reply.php' method='post'>";
    echo "<input type='hidden' name='post_id' value='{$post['id']}'>";
    echo "<textarea name='reply_content' rows='2' cols='30'></textarea>";
    echo "<input type='submit' value='Reply'>";
    echo "</form>";
}

// Close the database connection
$conn->close();
?>
