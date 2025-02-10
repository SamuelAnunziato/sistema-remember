<?php
    include('conexao.php');
    session_start();
    $id = $_SESSION['id'];

    if(isset($_POST['Cadastrar'])){
        $nome = $_POST['nome'];
        $senha = base64_encode($_POST['senha']);
        $plataforma = $_POST['plataforma'];

        mysqli_query($conexao, 'INSERT INTO tbcontas(conta_nome, conta_senha, conta_plataforma, conta_usuario_id) VALUES("'.$nome.'", "'.$senha.'", "'.$plataforma.'", '.$id.');');

        echo "<script>alert('Registrado com sucesso.');</script>";
        echo "<script type='text/javascript'> document.location = '../contas.php'; </script>";
    } else{
        echo "<script>alert('Cadastre primeiro.'); document.location = '../contas.php'</script>";
    }
?>