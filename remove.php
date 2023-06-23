<!DOCTYPE html>
<html>
<head>
	<title>Removendo produto</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./style.css"/>
</head>
<body>
	<!-- <?php 
		// conexão com o banco
		$usuario = "root";
		$senha = "";
		$pdo = new PDO(
			"mysql:host=localhost;dbname=ed2",
			$usuario,
			$senha
		);

		$produto_id = $_GET['produto_id'];

		# validando se não existe a chave aluno_id
		if(!isset($_GET['produto_id'])){
			echo("produto invalido...");
			exit();
		}

		$produto_id = $_GET['produto_id'];
		$produto = $pdo->query(
			"SELECT * FROM `produto` WHERE id=$produto_id"
		)->fetch();
	?> -->
	<h1>Tem certeza que deseja remover o produto <span class="title-element"><?php echo($produto['nome']) ?></span>?</h1>

	

	<form action="destroy.php" action="GET">
		<input 
			type="hidden" 
			name="produto_id" 
			value="<?php echo($produto['id']) ?>">
		<button class="btn btn-create btn-remove btn-remove-sim" type="submit">Sim</button>
		<a class="btn btn-cancel btn-remove" href="index.php">Não</a>
	</form>
</body>
</html>