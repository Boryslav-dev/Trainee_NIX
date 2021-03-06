<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sing up</title>
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="/css/authorization.css" rel="stylesheet">
</head>
<body class="text-center">

<main class="form-signup">
    <form action="" method="post">
        <img class="mb-4" src="" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
        <label for="inputLogin" class="visually-hidden">Login</label>
        <input type="login" name="login" id="inputLogin" class="form-control" placeholder="Login" required autofocus>
        <label for="inputEmail" class="visually-hidden">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="visually-hidden">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <p style="color:red"><?php echo("$data") ?></p>
        <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Sign up</button>
    </form>
</main>

</body>
</html>
