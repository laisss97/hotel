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
		</nav>
	</section>

	<div class="reserva">

    <h2>ESCOLHA SUA DATA:</h2>

    <form action="?funcao=verificaDisponibilidade" method="post">
	    <label>CHECK IN:</label><br>
	    <input type="date" name="dataEntrada" required><br>

	    <label>CHECK OUT:</label><br>
	    <input type="date" name="dataSaída" required><br> 

	    <input type="submit" value="Disponibilidade" name = "disponibilidadeEnviado">

	</form>
  </div>

	<?php // if variavel flag esta setada escrever: Esta data não está disponivel ?>		
</body>
</html>
