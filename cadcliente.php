<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Cadastro Cliente</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link href="css/signin.css" rel="stylesheet">
    </head>
    <body class="text-center">
	<div class="form-signin" style = "background: #D8D8D8">
        <h1 class="h3 mb-3 font-weight-normal">Cadastro do Cliente</h1>
        <?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="post" action="processo.php" class="form-signin">
            <label class="sr-only">Nome: </label>
            <input type="text" name="nome" placeholder="Digite seu nome" required><br><br>
            
            <label class="sr-only">E-mail: </label>
            <input type="text" name="email" placeholder="Digite seu e-mail" required><br><br>
            
            <label class="sr-only">Telefone: </label>
            <input type="number" name="telefone" placeholder="Digite seu telefone" required><br><br>
			
			<input  button class="btn btn-lg btn-primary btn-block" type="submit" value="Cadastrar"><br>
			<input  type="button" value="Voltar" onClick="history.go(-1)">
			<p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
        </form>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		</div>
	</body>
</html>