<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Comment</title>
</head>
<body>
    <h2>Add Comment</h2>
    <form action="/Publication/addComment/<?php echo $publication_id; ?>" method="post">
        <label for="comment_text">Comment:</label><br>
        <textarea id="comment_text" name="comment_text" rows="4" cols="50"></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>