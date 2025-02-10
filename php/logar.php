<?php
    include('conexao.php');
    session_start();

    if(isset($_POST['Logar'])){
        $user = $_POST['user'];
        $senha = sha1($_POST['senha']);
        

        $ret = mysqli_query($conexao,'SELECT * FROM tbusuario WHERE usuario_email="'.$user.'" and usuario_senha="'.$senha.'";');
        $num = mysqli_fetch_array($ret);
        
        if($num > 0){
            $_SESSION['id'] = $num['usuario_id'];
            header("location:../contas.php");
        }else{
            echo "<script>alert('Usuário e/ou senha incorretos.'); document.location = '../login.php'</script>";
        }
    }
?>