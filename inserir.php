<?php
include "conexao.php";

 $cpf = $_POST['cpf_cliente'];
 $nome = $_POST['nome_cliente'];
 $email = $_POST['email_cliente'];
 $numero =$_POST['numero_cliente'];
 $data_nascimento =$_POST['nascimento_cliente'];
 $opcao = isset($_POST['confirmacao']) ? 1 : 0;
 
//  1º Passo - Comando SQL
$sql = "INSERT INTO tb_clientes
        (cpf_cliente, nome_cliente, email_cliente, data_nascimento, numero_cliente, receber_notificacoes) VALUES
        ( '$cpf','$nome', '$email' , '$data_nascimento' ,'$numero', '$opcao')";

//  2º Passo - Preparar a conexão
$inserir = $pdo->prepare($sql);

//  3º Passo - Tentar executar
try{
    $inserir->execute();
    echo("<script>window.alert('Cadastrado com sucesso!')
    window.location.href = 'index.html';
    </script>");
} catch(PDOException $erro){
    echo "Falha ao inserir" . $erro->getMessage();
};

?>