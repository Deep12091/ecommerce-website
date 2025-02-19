<?php

include('server/connection.php');

$product_name = $_POST['product_name'];
$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$feedback = $_POST['feedback'];

$stmt = $conn->prepare("INSERT INTO feedback (product_name, user_name, user_email, feedback)
                            VALUES (?,?,?,?)");

    $stmt->bind_param('ssss',$product_name, $user_name, $user_email, $feedback);
    $stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment Section</title>
    <link rel="stylesheet" href="assets/css/feedbackstyle.css">
</head>
<body>
    <div class="container">
    
        <h2>Comment Section</h2>
        <form action="#" method="post">
        
            
        
        <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" required>
      
            <label for="user_name">Your Name:</label>
            <input type="text" id="user_name" name="user_name" required>

            <label for="user_email">Your email:</label>
            <input type="text" id="user_email" name="user_email" required>

            <label for="feedback">Your Comment:</label>
            <textarea id="feedback" name="feedback" required></textarea>

            <button type="submit" class="feedback-submit">Submit Comment</button>
        </form>

        <h3>Comments:</h3>
        <div class="comments">
            
        </div>
    </div>
</body>
</html>*/