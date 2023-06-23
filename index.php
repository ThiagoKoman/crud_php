<!DOCTYPE html>
<html>
<head>
	<title>Listagem dos produtos</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./style.css"/>
</head>
<body>
	<?php
		try {
			// conexão com o banco
			$usuario = "root";
			$senha = "";
            $produtos = "";
			$pdo = new PDO(
				"mysql:host=localhost;dbname=ed2",
				$usuario,
				$senha
			);

			// criar uma consulta ao banco
			$produtos = $pdo->query(
				"SELECT * FROM `produto`;"
			)->fetchAll();

			
		} catch (Exception $e) {
			echo($e);
		}
		
	?>

	<h1>Lista de produtos</h1>

	<a class='btn btn-create' href="creat.php">Criar produto</a>

	<table>
		<thead>
			<tr>
				<th>#</th>
				<th>nome</th>
				<th>valor</th>
				<th>descrição</th>
				<th>Opções</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($produtos as $produtos): ?>
				<tr>
					<td><?php echo($produtos["id"]) ?></td>
					<td><?php echo($produtos["nome"]) ?></td>
					<td><?php echo($produtos["valor"]) ?></td>
                    <td><?php echo($produtos["descricao"]) ?></td>
					<td class='last_table_element'>
						<a href="edit.php?produto_id=<?php echo($produtos["id"]); ?>">
							Editar
						</a>
						<a href="remove.php?produto_id=<?php echo($produtos["id"]); ?>">
							Remover
						</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</body>
</html>