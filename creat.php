<!DOCTYPE html>
<html>
<head>
	<title>Criando um novo produto</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./style.css"/>
</head>
<body>
	<h1>Criando um novo produto!</h1>
	<div class="container">
		<form action="store.php" method="POST">
			<label for="nome">Nome</label>
			<input type="text" name="nome" id="nome" placeholder="Nome do produto..." required>
			
			<label for="valor">Valor</label>
			<input type="number" name="valor" id="valor" placeholder="00" required>
			
			<label for="descricao">Descrição</label>
			<input type="text" name="descricao" id="descricao" placeholder="Digite a descrição do produto" required>
			
			<button class="btn btn-create" type="submit">Enviar</button>
		</form>
		<a class="btn btn-cancel" href="index.php">Cancelar</a>
	</div>
</body>
</html>