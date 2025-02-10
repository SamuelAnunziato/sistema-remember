<?php
    include('conexao.php');
    session_start();

    if(isset($_GET['excluir'])){
        $codigo = $_GET['excluir'];
        
        mysqli_query($conexao, 'DELETE FROM tbusuario WHERE usuario_id='.$codigo.';');
        $_SESSION['id'] = null;

        echo "<script>alert('Deletado com sucesso.');</script>";
        echo "<script type='text/javascript'> document.location = '../cadastro.php'; </script>";
    }

    if(isset($_GET['sair'])){
        $_SESSION['id'] = null;

        echo "<script type='text/javascript'> document.location = '../login.php'; </script>";
    }
?>