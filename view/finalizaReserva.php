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

	<article>
		
		<h2> Confirmação </h2>

		<p>
			Deseja confimar a reserva em nome de <?= $_SESSION['nomeHospede']?> entre as datas <?= $_SESSION['dataEntrada']?> e <?= $_SESSION['dataSaida']?> sendo </p>
		<?php
			if(isset($_SESSION['nQuartoSimple_h']) and $_SESSION['nQuartoSimple_h']>0)
				echo "<p>" . $_SESSION['nQuartoSimple_h'] . " quarto(s) simplex </p>";
		 
			if(isset($_SESSION['nQuartoLux_h']) and $_SESSION['nQuartoLux_h']>0)
				echo "<p>" . $_SESSION['nQuartoLux_h'] . " quarto(s) lux </p>";

			if(isset($_SESSION['nQuartoLuxMaster_h']) and $_SESSION['nQuartoLuxMaster_h']>0)
				echo "<p>" . $_SESSION['nQuartoLuxMaster_h'] . " quarto(s) lux master </p>";

			if(isset($_SESSION['nQuartoLuxImperial_h']) and $_SESSION['nQuartoLuxImperial_h']>0)
				echo "<p>" . $_SESSION['nQuartoLuxImperial_h'] . " quarto(s) lux imperial </p>";
		?>

		<p> <a href="?funcao=confirmaReserva" class="clica1" role="button">Confirmar</a> <a href="?funcao=cancelaReserva" class="clica2" role="button"> Cancelar</a> </p>

	</article>

	<footer> 
		<p>Entre em contato conosco:<br>Telefone: 555-963-852<br>E-mail: hotelpalacios@palacios.com.br</p>
	</footer>

</body>
</html>
