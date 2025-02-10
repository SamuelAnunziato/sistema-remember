<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <header>
        <?php
            include('./php/header_user.php');
        ?>
    </header>

    <section>
            <form action="./php/logar.php" method="POST">
                <label for="user">E-mail</label>
                <input type="text" name="user" id="user" required>

                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" minlength="8" required>

                <input type="submit" value="Logar" name="Logar">
            </form>
        </section>
</body>
</html>