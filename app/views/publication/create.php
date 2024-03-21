<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $name ?> view</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <div class='container'>
        <h1>Create Publication</h1>
        <form method='post' action=''>
            <div class="form-group">
                <label>Title:<input type="text" class="form-control" name="publication_title" placeholder="Enter title" /></label>
            </div>
            <div class="form-group">
                <label>Text:<textarea class="form-control" name="publication_text" placeholder="Enter text"></textarea></label>
            </div>
            <div class="form-group">
                <label>Status:
                    <select class="form-control" name="publication_status">
                        <option value="public">Public</option>
                        <option value="private">Private</option>
                    </select>
                </label>
            </div>

            <div class="form-group">
                <input type="submit" name="action" value="Create" /> 
            </div>
        </form>
    </div>
</body>
</html>
