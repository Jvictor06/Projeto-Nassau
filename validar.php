<?php
session_start();
include_once("conexao.php");

	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = md5(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));
	if((!empty($usuario)) AND (!empty($senha))){
		$result_usuario = "SELECT * FROM usuario WHERE usuario='$usuario' AND senha='$senha' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
    $row_usuario = mysqli_fetch_assoc($resultado_usuario);
		if($row_usuario){
				$_SESSION['id'] = $row_usuario['id'];
				$_SESSION['nome'] = $row_usuario['nome'];
				$_SESSION['email'] = $row_usuario['email'];
				header("Location: principal.php");
		}else{
				$_SESSION['msg'] ="<div class='alert alert-danger'>Login ou senha incorreta</div>";
				header("Location: login.php");
			}
	}else{
		$_SESSION['msg'] ="<div class='alert alert-danger'>Requisição inválida</div>";
    header("Location: login.php");
	}
?>