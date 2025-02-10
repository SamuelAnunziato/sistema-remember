<?php
    include('conexao.php');
    session_start();

    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];

        $sql=mysqli_query($conexao, 'SELECT * FROM tbusuario WHERE usuario_id='.$id.';');
        $usuario = mysqli_fetch_array($sql);
?>
<header>
    Logado como <?php echo $usuario['usuario_email']?>

    <a href="./php/alterar_usuario.php?excluir=<?php echo $id;?>">Excluir conta</a>
    <a href="./php/alterar_usuario.php?sair=<?php echo $id;?>">Sair</a>
</header>
<?php
    } else{     
?>
<a href="login.php">Logar</a>
<a href="cadastro.php">Cadastrar</a>
<?php
    }
?>