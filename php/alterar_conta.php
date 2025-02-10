<?php
    include('conexao.php');

    if(isset($_POST['Alterar'])){
        $codigo = $_POST['alt_cod'];
        $nome = $_POST['alt_nome'];
        $senha = base64_encode($_POST['alt_senha']);
        $plataforma = $_POST['alt_plataforma'];

        mysqli_query($conexao, 'UPDATE tbcontas SET conta_nome="'.$nome.'", conta_senha="'.$senha.'", conta_plataforma="'.$plataforma.'" WHERE conta_id='.$codigo.';');

        echo "<script>alert('Alterado com sucesso.');</script>";
        echo "<script type='text/javascript'> document.location = '../contas.php'; </script>";
    }
?>