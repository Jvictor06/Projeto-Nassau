<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);

echo "Nome: $nome <br>";
echo "E-mail: $email <br>";
echo "Telefone:$telefone<br>";

$result_cliente = "INSERT INTO cliente (nome, email, telefone, data_cadastro) VALUES ('$nome', '$email', '$telefone', NOW())";
$resultado_cliente = mysqli_query($conn, $result_cliente);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: cadcliente.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: cadcliente.php");
}
