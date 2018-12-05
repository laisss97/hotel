<!DOCTYPE html>
<!--
 
/*
* Trabalho realizado para a disciplina de Programação para Web da Faculdade de
* Computação da Universidade Federal de Mato Grosso do Sul (FACOM / UFMS).
* Trata-se de um sistema de reservas de um hotel específico.
* 
*
* @author Isadora Ajala Martinez
* @author Laís Santos de Souza
*
*
* @version 6.0 - 05/Dez/2018
*/

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
			<a href="?funcao=cancelaReserva">Início</a>
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
