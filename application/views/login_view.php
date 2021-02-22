<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sing in</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/authorization.css" rel="stylesheet">
</head>
<body class="text-center">

<main class="form-signin">
    <form action="" method="post">
        <img class="mb-4" src="" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        <label for="inputLogin" class="visually-hidden">Login</label>
        <input type="login" name="login" id="inputLogin" class="form-control" placeholder="Login" required autofocus>
        <label for="inputPassword" class="visually-hidden">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <p style="color:red"><?php echo("$data") ?></p>
        <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Sign in</button>
    </form>
</main>

</body>
</html>
