<!DOCTYPE html>
<html>
<head>
	<title>Atualizar os produtod</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./style.css"/>
</head>
<body>
	<?php 
		// conexão com o banco
		$usuario = "root";
		$senha = "";
		$pdo = new PDO(
			"mysql:host=localhost;dbname=ed2",
			$usuario,
			$senha
			);

			# validando se não existe a chave aluno_id
			if(!isset($_GET['produto_id'])){
				echo("produto invalido...");
				exit();
			}
			
			$produto_id = $_GET['produto_id'];
			$produto = $pdo->query(
				"SELECT * FROM `produto` WHERE id=$produto_id"
				)->fetch();
				?>
	<h1>Editando o produto: <span class="title-element">#<?php echo($produto['id']) ?> - <?php echo($produto['nome']) ?></span></h1>
	<form action="update.php" method="POST">
		<input 
			type="hidden" 
			name="produto_id" 
			value="<?php echo($produto['id']) ?>">
		
		<label>Produto</label>
		<input 
			type="text" 
			name="nome" 
			placeholder=""
			value="<?php echo($produto['nome']) ?>">
		
		<label>Preço</label>
		<input 
			type="text" 
			name="valor"
			placeholder=""
			value="<?php echo($produto['valor']) ?>">
           
		<label>Descrição</label>
		<input 
			type="text" 
			name="descricao"
			placeholder=""
			value="<?php echo($produto['descricao']) ?>">

		<button class="btn btn-create" type="submit">Atualizar</button>
	</form>
	<a class="btn btn-cancel" href="index.php">Voltar</a>
</body>
</html>