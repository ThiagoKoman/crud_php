<!DOCTYPE html>
<html>
<head>
	<title>Listagem dos produtos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./style.css"/>
</head>
<body>
	<h1><?php 
		// validação do tipo da requisição
		if($_SERVER['REQUEST_METHOD'] == 'POST'){

			// recuperar os dados da requisição
			$nome = '';
			$valor = '';
			$descricao = '';

			// validando campo nome
			if(isset($_POST['nome'])){
				$nome = $_POST['nome'];
			}

			// validando campo ra
			if(isset($_POST['valor'])){
				$valor = $_POST['valor'];
			}

			if(isset($_POST['descricao'])){
				$descricao = $_POST['descricao'];
			}

			// conexão com o banco
			if(empty($nome) && empty($valor) && empty($descricao)){
				echo("Os campos nome e produto não podem ser vazios");
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

			// criar o registro na tabela
			$novoproduto = $pdo->prepare(
				"INSERT INTO `produto`(nome, valor, descricao) VALUES(:nome,:valor,:descricao)"
			); // prepara a query

			// define as variaveis com os valores
			$novoproduto->bindParam(':nome', $nome);
			$novoproduto->bindParam(':valor', $valor);
			$novoproduto->bindParam(':descricao', $descricao);
			// executar a inserção
			$novoproduto->execute();

			echo("Novo produto criado com sucesso.");
		}
	?>
	</h1>
	<a class="btn btn-cancel" href="index.php">Voltar</a>
</body>
</html>