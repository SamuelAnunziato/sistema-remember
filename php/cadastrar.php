<?php
    include('conexao.php');

    if(isset($_POST['Cadastrar'])){
        $user = $_POST['user'];
        $senha = sha1($_POST['senha']);

        $sql=mysqli_query($conexao,'SELECT * FROM tbusuario WHERE usuario_email="'.$user.'";');
        $row=mysqli_num_rows($sql);

        if($row > 0){
            echo "<script>alert('Email já cadastrado. Por favor tente outro email.'); document.location = '../cadastro.php'</script>";
        } else{
            mysqli_query($conexao,'INSERT INTO tbusuario(usuario_email, usuario_senha) VALUES("'.$user.'", "'.$senha.'");');

            echo "<script>alert('Registrado com sucesso.');</script>";
            echo "<script type='text/javascript'> document.location = '../login.php'; </script>";
        }
    } else{
        echo "<script>alert('Cadastre primeiro.'); document.location = '../cadastro.php'</script>";
    }
?>