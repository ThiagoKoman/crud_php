<!DOCTYPE html>
<html>
<head>
	<title>Listagem dos produtos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./style.css"/>
</head>
<body>
	<h1>
	<?php 
		// validação do tipo da requisição
		if($_SERVER['REQUEST_METHOD'] == 'GET'){

			// recuperar os dados da requisição
			$produto_id = '';

			// validando campo aluno_id
			if(isset($_GET['produto_id'])){
				$produto_id = $_GET['produto_id'];
			}

			// conexão com o banco
			if(empty($produto_id)){
				echo("Dados invalidos....");
				exit();
			}

			// conectando no banco de dados
			$usuario = "root";
			$senha = "";
			$pdo = new PDO(
				"mysql:host=localhost;dbname=ed2",
				$usuario,
				$senha
			);

			$removeproduto = $pdo->prepare(
				"DELETE FROM `produto` where id=?"
			);

			$removeproduto->execute([
				$produto_id
			]);


			echo "Aluno removido com sucesso..";
		}
	?>
	</h1>
	<a class="btn btn-cancel" href="index.php">Voltar</a>
</body>
</html>