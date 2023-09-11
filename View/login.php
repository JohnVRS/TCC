<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../CSS/login.css">
    
</head>
<body>
        <div class="tela-login">
            <h1>Login</h1>
            <form action="testLogin.php" method="POST">
                <input type="text" name="email" placeholder="Email">
                <br><br>
                <input type="password" name="senha" placeholder="Senha">
                <br><br>
                <input type="submit" name="submit" class="buttonSubmit" value="Enviar">
            </form>
        </div>
        
</body>
</html>