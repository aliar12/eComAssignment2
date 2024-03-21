<!DOCTYPE html>
<html>
<head>
    <title><?= $profile->first_name ?> view</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
    </style>
</head>
<body>
    <div class='container'>
        <div>
            <h1>User profile</h1>
            <dl>
                <dt>First name:</dt>
                <dd><?= $profile->first_name ?></dd>
                <dt>Middle name:</dt>
                <dd><?= $profile->middle_name ?></dd>
                <dt>Last name:</dt>
                <dd><?= $profile->last_name ?></dd>
            </dl>
            <a href='/Profile/modify'>Modify my profile</a> | 
            <a href='/Profile/delete'>Delete my profile</a>
        </div>
        <div class='Publications'>
            <?php if ($publications): ?>
                <?php foreach ($publications as $publication): ?>
                    <a href='#'><?= $publication->publication_title ?></a><br>
                <?php endforeach; ?>
            <?php else: ?>
                No publications available.
            <?php endif; ?>
            <br><a href='/Publication/create'>Create a publication</a> |
        </div>
    </div>
</body>
</html>
