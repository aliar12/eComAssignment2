<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Comment</title>
</head>
<body>
    <h2>Edit Comment</h2>
    <form action="/Publication/editComment/<?php echo $comment_id; ?>" method="post">
        <label for="comment_text">Comment:</label><br>
        <textarea id="comment_text" name="comment_text" rows="4" cols="50"><?php echo $comment_text; ?></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>