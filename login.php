<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
    <title>Login</title>
</head>
<body>
    <div>
        <h1>Login</h1>
        <form action="testLogin.php" method="POST">
            <input type="text" name="email" placeholder="Email">
            <br><br>
            <input type="text" name="senha" placeholder="Senha">
            <br><br>
            <input class="inputSubmit" type="submit" name="submit_login" value="Enviar">
        </form>
        <br><br>
        <a class="voltar" href="home.php">Voltar</a>
    </div>
</body>
</html>
