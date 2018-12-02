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
		<h2>ESCOLHA OS QUARTOS:</h2>

    <form action="?funcao=verificaDisponibilidade" method="post">
    	<label>Quarto Simple:</label><br>
	    <input type="number" name="nQuartoSimple" required><br>

		<label>Quarto Lux:</label><br>
	    <input type="number" name="nQuartoLux" required><br>

		<label>Quarto Lux Master:</label><br>
	    <input type="number" name="nQuartoLuxMaster" required><br>

	    <label>Quarto Lux Imperial:</label><br>
	    <input type="number" name="nQuartoLuxImperial" required><br>

	    <input type="submit" value="Disponibilidade" name = "quartosEnviado">

	</form>
   
  </div>

			
</body>
</html>
