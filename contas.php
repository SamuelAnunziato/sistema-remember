<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contas</title>
</head>
<body>
    <header>
        <?php
            include('./php/header_user.php');
        ?>
    </header>
    
    <section>
        <form action="./php/cadastrar_conta.php" method="POST">
            <label for="nome">Nome de usuário: </label>
            <input type="text" id="nome" name="nome" required>

            <label for="senha">Senha: </label>
            <input type="text" id="senha" name="senha" required>

            <label for="plataforma">Plataforma: </label>
            <input type="text" id="plataforma" name="plataforma" required>

            <input type="submit" value="Cadastrar" name="Cadastrar">
        </form>
    </section>

    <section>
        <?php
        include('./php/conexao.php');

            if(isset($_GET['deletar'])){
                $codigo = $_GET['deletar'];
        
                mysqli_query($conexao, 'DELETE FROM tbcontas WHERE conta_id='.$codigo.';');
                echo "<script>alert('Deletado com sucesso.');</script>";
            }

            if(isset($_GET['alterar'])){
                $codigo = $_GET['alterar'];

                $resul = mysqli_query($conexao, 'SELECT * FROM tbcontas WHERE conta_id = '.$codigo.';');
                $con = mysqli_fetch_array($resul);
        ?>
        <form action="./php/alterar_conta.php" method="POST">
            <input type="hidden" name="alt_cod" id="alt_cod" value="<?php echo $con['conta_id']; ?>" readonly>
            
            <label for="alt_nome">Nome: </label>
            <input type="text" name="alt_nome" id="alt_nome" value="<?php echo $con['conta_nome']; ?>">

            <label for="alt_class">Senha: </label>
            <input type="text" name="alt_senha" id="alt_senha"  value="<?php echo base64_decode($con['conta_senha']); ?>">

            <label for="alt_episodios">Plataforma: </label>
            <input type="text" name="alt_plataforma" id="alt_plataforma" value="<?php echo $con['conta_plataforma']; ?>">

            <input type="submit" value="Alterar" name="Alterar">
        </form>
        <?php
            }
        ?>
    </section>

    <section>
        <?php
            include('./php/listagem.php');
        ?>
    </section>
</body>
</html>