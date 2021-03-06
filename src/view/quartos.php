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
			<?php
			
			if(!isset($_SESSION['sucesso']) || $_SESSION['sucesso'] == 0) {
				
				echo "<nav>"; 
					echo "<a href=\"?funcao=home\">Início</a>";
					echo "<a href=\"?funcao=login\">Login</a>";
					echo "<a href=\"?funcao=cadastro\">Cadastro</a>";
					echo "<a href=\"?funcao=quartos\">Quartos</a>";
					echo "<a href=\"?funcao=servicos\">Serviços</a>";
				echo "</nav>";
			}
			else
			{
				echo "<nav>";
					echo "<a href=\"?funcao=homeLogin\">Início</a>";
					echo "<a href=\"?funcao=alterarCadastro\">Alterar cadastro</a>";
					echo "<a href=\"?funcao=reservar\">Reservar</a>";
					echo "<a href=\"?funcao=cancelarReserva\">Cancelar reserva</a>";
					echo "<a href=\"?funcao=quartos\">Quartos</a>";
					echo "<a href=\"?funcao=servicos\">Serviços</a>";
					echo "<a href=\"?funcao=sairLogin\">Sair</a>";
				echo "</nav>";
			}
			?>
		</nav>
	</section>

	<div class="quartos">
		
		<img src="view/imagens/quarto1.jpg"class="img-rounded" alt="quarto1"  width=60%; height=70%;>
		<div class="descricao"><strong>Quarto Simplex:</strong> cama king-size, ar-condicionado, wi-fi, tv e decoração em tons quentes. <strong>Valor da diária: R$ 1000,00</strong></div>

		<img src="view/imagens/quarto2.jpg" class="img-rounded" alt="quarto2" width=60%; height=60%;>
		<div class="descricao"><strong>Quarto Lux:</strong> cama king-size, ar-condicionado, wi-fi, smart-tv, pequeno escritório adjunto para reuniões, minibar e decoração em tons pastéis. <strong>Valor da diária: R$ 1500,00</strong></div></div>


		<img src="view/imagens/quarto3.jpg" class="img-rounded" alt="quarto3" width=60%; height=60%;>
		<div class="descricao"><strong>Quarto Lux Master:</strong> cama king-size, ar-condicionado, wi-fi, smart-tv, pequeno escritório adjunto para reuniões, frigorífico, minibar e decoração em tons claros. <strong>Valor da diária: R$ 2000,00</strong></div>


		<img src="view/imagens/quarto4.jpg" class="img-rounded" alt="quarto4" width=60%; height=60%;>
		<div class="descricao"><strong>Quarto Lux Imperial:</strong> cama king-size, ar-condicionado, wi-fi, smart-tv, pequeno escritório adjunto para reuniões, frigorífico, minibar, visão panorâmica da cidade e decoração em tons escuros. <strong>Valor da diária: R$ 2500,00</strong></div>


	</div>

			
</body>
</html>

