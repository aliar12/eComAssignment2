<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $name ?> view</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script></head>
<body>
    <div class="container">
        <h1>Publications</h1>
        <a href="/Publication/create" class="btn btn-primary mb-3">Create Publication</a>
        <?php if (empty($publications)) : ?>
            <p>No publications found.</p>
        <?php else : ?>
            <ul class="list-group">
                <?php foreach ($publications as $publication) : ?>
                    <li class="list-group-item">
                        <h4><?= $publication['publication_title'] ?></h4>
                        <p><?= $publication['publication_text'] ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</body>
</html>
