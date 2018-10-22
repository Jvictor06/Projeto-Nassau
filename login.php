<?php
session_start();
?>
<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="css/signin.css" rel="stylesheet">
    </head>
    <body class="text-center">
		<div class="form-signin" style = "background: #D8D8D8">
        <h1 class="h3 mb-3 font-weight-normal">Área de login</h1>
        <?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>
        <form method="post" action="validar.php" class="form-signin">
            <label class="sr-only">Usuário:</label>
            <input type="text" name="usuario" placeholder="Digite seu usuário"> <br><br>
            
            <label class="sr-only">Senha:</label>
            <input type="password" name="senha" placeholder="Digite sua senha"> <br><br>
            
            <input  button class="btn btn-lg btn-primary btn-block" type="submit" name="Login" value="Acessar">
            
			<a href="cad_usuario.php">Não possui uma conta ?</a>
			<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
        </form>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
    