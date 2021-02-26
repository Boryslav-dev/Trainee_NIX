<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Top navbar example · Bootstrap v5.0</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="navbar-top.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-md navbar-light bg-light mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">NIX_Education</a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Info</a>
                </li>
            </ul>
        <?php include "profile_navigation.php"?>
        </div>
    </div>
</nav>

<?php include "profile.php"?>

</body>
</html>
