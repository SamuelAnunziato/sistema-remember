<?php
    include('conexao.php');
    $id = $_SESSION['id'];

    if(isset($_POST['Pesquisar'])){
        $conta = $_POST['pesq_conta'];
        $plataforma = $_POST['pesq_plataforma'];

        $conta = $conta == null ? '%' : $_POST['pesq_conta'];
        $plataforma = $plataforma == null ? '%' : $_POST['pesq_senha'];

        $sqlin = 'SELECT * FROM tbcontas WHERE conta_nome LIKE "%'.$pesq.'%" && conta_plataforma LIKE "%'.$plataforma.'%" && conta_usuario_id='.$id.';';
    } else{
        $sqlin = 'SELECT * FROM tbcontas WHERE conta_usuario_id='.$id.';';
    }
    
    $resul = mysqli_query($conexao, $sqlin);
    $linhas = mysqli_num_rows($resul);

    if($linhas === 0){
        echo 'Nenhum registro encontrado.';
    } else{
        echo '<section id="lista">';
            while($con = mysqli_fetch_array($resul)){
                echo '<div class="contas">
                <p class="conta_id">'.$con['conta_id'].'</p>
                <p class="conta_nome">'.$con['conta_nome'].'</p>
                <p class="conta_senha">'.base64_decode($con['conta_senha']).'</p>
                <p class="conta_plataforma">'.$con['conta_plataforma'].'</p>
                <a href="contas.php?alterar='.$con['conta_id'].'"><img src="./icon/alter.png" alt="alterar" title="Alterar" class="icon"></a><a href="contas.php?deletar='.$con['conta_id'].'"><img src="./icon/lixo.png" alt="excluir" title="Excluir" class="icon"></a>
                </div>';
            }
        echo '</section>';
    }
?>