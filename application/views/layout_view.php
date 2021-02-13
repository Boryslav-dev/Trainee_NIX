<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Top navbar example · Bootstrap v5.0</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/style.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php include "header.php"?>
<?php include "navigation.php"?>
<div id="content">
    <div class="box">
        <?php include 'application/views/' . $content_view; ?>
    </div>
    <br class="clearfix" />
</div>
<br class="clearfix" />

<?php include "footer.php"?>
</body>
</html>

