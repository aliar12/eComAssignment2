<html>
<head>
	<title><?= $name ?> view</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
	<div class='container'>
		<h1>Publication</h1>
		<dl>
		<dt>Title:</dt>
		<dd><?= $data->publication_title ?></dd>
		<dt>Content:</dt>
		<dd><?= $data->publication_text ?></dd>
		<dt>Status:</dt>
		<dd><?= $data->publication_status ?></dd>
		</dl>
		<a href='/Publication/modify'>Modify my Post</a> | 
		<a href='/Publication/delete'>Delete my Post</a>
	</div>
</body>
</html>