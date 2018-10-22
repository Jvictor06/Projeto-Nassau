<?php
session_start();
if(!empty($_SESSION['id'])){
	
	echo "Olá ".$_SESSION['nome'].", Bem vindo <br>";
	echo "<a href='sair.php'>Sair</a> <br>";
	echo "<a href='listar_clientes.php'> Lista de clientes</a> <br>";
	echo "<a href='lista_produto.php'> Lista de Produtos</a> <br>";
	echo "<a href='cad_usuario.php'>Cadastrar Usuario</a><br>";
	echo "<a href='cadcliente.php'>Cadastrar Cliente</a>";
}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");	
}
