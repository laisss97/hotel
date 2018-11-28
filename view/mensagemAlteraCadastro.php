<!DOCTYPE html>

<!-- 
Trablaho de Programação Web.
Tema: reserva de quarto em hotel.
Data: 11 /10 /2018
-->
<html lang="pt-br">
<head>
	<title>Reserva no Hotel Palácios</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="view/palacio.css">
</head>

<body>
	
	<header>
		<h1>Hotel Palácios</h1>
	</header>

	<section>
		<nav>
			<a href="?funcao=homeLogin">Início</a>
			<a href="?funcao=alterarCadastro">Alterar Cadastro</a>
			<a href="?funcao=reservar">Reservar</a>
			<a href="?funcao=cancelarReserva">Cancelar Reserva</a>
			<a href="?funcao=quartos">Quartos</a>
			<a href="?funcao=servicos">Serviços</a>
			<a href="?funcao=sairLogin">Sair</a>
		</nav>
	</section>

	<article>
		<h2>Altere seu Cadastro:</h2>
		<p><?= $msg; ?></p>
	</article>

	<footer> 
		<p>Entre em contato conosco:<br>Telefone: 555-963-852<br>E-mail: hotelpalacios@palacios.com.br</p>
	</footer>

</body>
</html>
