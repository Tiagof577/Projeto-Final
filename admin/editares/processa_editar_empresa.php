<?php
// Ligação a Base de Dados
include '../ligacao_bd.php';
?>

<!--========================================================================================================
                                        EDITAR DADOS DA EMPRESAS
=========================================================================================================-->
<?php if(isset($_REQUEST['editar_dados_empresa'])) {
        $id_empresa     =   $_POST['id_empresa'];
        $nome_empresa   =   $_POST['nome_empresa'];
        $morada_rua          =   $_POST['morada_rua'];
        $morada_cod_postal   =   $_POST['morada_cod_postal'];
        $morada_localidade   =   $_POST['morada_localidade'];
        $telefone       =   $_POST['telefone'];
        $email          =   $_POST['email'];
        $nif            =   $_POST['nif'];
        $img_empresa    =   $_FILES['img_empresa'];


        if(isset($_FILES["img_empresa"]) && $_FILES["img_empresa"]["error"] == 0){
        
        $filename = $_FILES["img_empresa"]["name"];
        $target_dir = "../img/";

        move_uploaded_file($_FILES["img_empresa"]["tmp_name"], "$target_dir" . $filename);
        
        $sql = "UPDATE dados_empresa SET nome_empresa = '$nome_empresa', morada_rua = '$morada_rua', morada_cod_postal = '$morada_cod_postal', morada_localidade = '$morada_localidade', telefone = '$telefone', email = '$email', nif = '$nif', url_imagem = 'img/$filename' WHERE id_empresa=$id_empresa";
        
        } else {

        $sql = "UPDATE dados_empresa SET nome_empresa = '$nome_empresa', morada_rua = '$morada_rua', morada_cod_postal = '$morada_cod_postal', morada_localidade = '$morada_localidade', telefone = '$telefone', email = '$email', nif = '$nif' WHERE id_empresa=$id_empresa";
}

        if ($conn->query($sql) === TRUE) {
            header('Location: ../empresa.php');
        } else {
            echo "Erro! Registo não foi inserido. " . $conn->error;
        }
        $conn->close();
    }
?>