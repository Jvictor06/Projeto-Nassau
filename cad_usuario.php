<?php
session_start();
ob_start();
$cadusuario = filter_input(INPUT_POST, 'cadusuario', FILTER_SANITIZE_STRING);
if($cadusuario){
    include_once 'conexao.php';
    $dados_rc = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	
	$erro = false;
	
	$dados_st = array_map('strip_tags', $dados_rc);
	$dados = array_map('trim', $dados_st);
	
	if(in_array('',$dados)){
		$erro = true;
		$_SESSION['msg'] ="<div class='alert alert-danger'>Preencha todos os campos</div>";
	}elseif((strlen($dados['senha'])) < 5){
			$erro = true;
			$_SESSION['msg'] ="<div class='alert alert-danger'>Senha deve conter no minímo 5 caracteres</div>";
		}else{
			$result_usuario = "SELECT id FROM usuario WHERE usuario='". $dados['usuario'] ."'";
			$resultado_usuario = mysqli_query($conn, $result_usuario);
		if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
			$erro = true;
			$_SESSION['msg'] ="<div class='alert alert-danger'>Este usuário já está sendo utilizado</div>";
		}
			$result_usuario = "SELECT id FROM usuario WHERE email='". $dados['email'] ."'";
			$resultado_usuario = mysqli_query($conn, $result_usuario);
		if(($resultado_usuario) AND ($resultado_usuario->num_rows != 0)){
			$erro = true;
			$_SESSION['msg'] ="<div class='alert alert-danger'>Este e-mail já está cadastrado</div>";
		}
	}
	if(!$erro){
		//$dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
		//$senha = hash(sha512,$dados['senha']);
		$senha = md5($dados['senha']);
	
    $result_usuario = "INSERT INTO usuario (nome, email, usuario, senha) VALUES (
    '".$dados['nome']."',
    '".$dados['email']."',
    '".$dados['usuario']."',
    '".$senha."'
    )";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if(mysqli_insert_id($conn)){
        $_SESSION['msg'] ="<div class='alert alert-success'>Cadastrado com sucesso !</div>";
        header("Location: cad_usuario.php");
    }else{
        $_SESSION['msg'] ="<div class='alert alert-alert'>Erro ao cadastrar!</div>";
		}
	}
}
?>
<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Cadastro Usuário</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="css/signin.css" rel="stylesheet">
	</head>
    <body class="text-center">
		<div class="form-signin" style = "background: #D8D8D8">
        <h1 class="h3 mb-3 font-weight-normal">Cadastrar Usuário</h1>
        <?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>
        <form method="post" action="" class="form-signin">
            <label class="sr-only">Nome:</label>
            <input type="text" name="nome" placeholder="Digite seu nome completo" class="form-control"> <br><br>
            
            <label class="sr-only">Email:</label>
            <input type="email" name="email" placeholder="Digite seu email" class="form-control"> <br><br>
            
            <label class="sr-only">Usuário:</label>
            <input type="text" name="usuario" placeholder="Digite seu usuario para login" class="form-control"> <br><br>
            
            <label class="sr-only">Senha:</label>
            <input type="password" name="senha" placeholder="Digite sua senha para login" class="form-control"> <br><br>
            
            <input button class="btn btn-lg btn-primary btn-block" type="submit" name="cadusuario" value="Cadastrar"><br>
			<input type="button" value="Voltar" onClick="history.go(-1)"><br><br>
			
			<a href="login.php">Fazer Login ?</a>
			<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
        </form>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		</div>
	</body>
</html>
    