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
		$produto_id = '';
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

		// validando campo aluno_id
		if(isset($_POST['produto_id'])){
			$produto_id = $_POST['produto_id'];
		}

        if(isset($_POST['descricao'])){
			$descricao = $_POST['descricao'];
		}

		// conexão com o banco
		if(empty($nome) && empty($valor)&& empty($descricao)&& empty($produto_id)){
			echo("Os campos nome, valor e descricao não podem ser vazios");
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

		$atualizaaluno = $pdo->prepare(
			"UPDATE produto
			SET nome=?, valor=?, descricao=?
			WHERE id=?"
		);

		$atualizaaluno->execute([
            $nome,
            $valor, 
            $descricao,
			$produto_id,	
			
		]);


		echo "Produto atualizado com sucesso..";
	}
?>
</h1>
	<a class="btn btn-cancel" href="index.php">Voltar</a>
</body>
</html>