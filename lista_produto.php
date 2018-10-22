<?php
include_once "conexao2.php";


$result_produto= "SELECT P.ID, P.post_title as titulo, P.post_excerpt as descricao, P.guid as url, PM.meta_value as preco, ( select meta_value from wp_postmeta where post_id= ( SELECT meta_value FROM `wp_postmeta` where post_id = P.ID and meta_key = '_thumbnail_id' ) and meta_key = '_wp_attached_file' ) as imagem FROM `wp_posts` P inner JOIN wp_postmeta PM ON P.ID = PM.post_id where P.post_type = 'product' AND PM.meta_key = '_regular_price'";
$resultado_produto = mysqli_query($conn, $result_produto);

?>
<html lang ="pt-br">
<head>
	<meta charset = "utf-8">
</head>

<style>
	table {
    border-collapse: collapse;
	width: 70%;
}

table, th, td {
    border: 1px solid black;
	text-align: center;
}

</style>

<table class="table table-striped" border="1">
     <thead>
    <tr>
      <th>ID</th>
      <th>Nome do Produto</th>
      <th>Link do Produto</th>
      <th>Preço</th>
      <th>Imagem</th>
    </tr>
  </thead>
     <tbody>
<?php

if(($resultado_produto) AND ($resultado_produto->num_rows != 0)){
	while($row_produto = mysqli_fetch_assoc($resultado_produto)){
        ?>
    <tr>
        <th><?php echo $row_produto['ID']?></th>
        <td><?php echo $row_produto['titulo']?></td>
		<td><?php echo $row_produto['url']?></td>
        <td><?php echo $row_produto['preco']?></td>
		<td><?php echo $row_produto['imagem']?></td>
      
    </tr> 
         <?php
	}
}else{
	echo "Nenhum cliente foi encontrado";
}
?>
</tbody>
</table>  
</html>
<?php