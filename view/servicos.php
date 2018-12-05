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

	<div class="servicos">

		<img src="view/imagens/recepcao.jpg" class="img-rounded" width="500" height="450" alt="recepcao">
		<div class="descricao">
			O hóspede ao chegar no Hotel Palácios encontrará um ambiente de requinte e acolhedor.
			</div>

		<img src="view/imagens/funcionarios.jpg" class="img-rounded" width="500" height="450" alt="funcionarios recepção">
		<div class="descricao">
			Nosso funcionários são altamente capacitados para prestar o melhor atendimento.
		</div>

		<img src="view/imagens/camareira.jpg" class="img-rounded" width="500" height="450" alt="camareira">
		<div class="descricao">
			Possuímos uma equipe encarregada da organização do ambiente para a melhor comodidade para os hóspedes.
			
		</div>

		<img src="view/imagens/cafe_da_manha.jpg" class="img-rounded" width="500" height="450" alt="café da manhã">
		<div class="descricao">
			Temos o melhor café colonial da região.</p>
		</div>

		<img src="view/imagens/cafe_da_manha2.jpg" class="img-rounded" width="500" height="450" alt="tcafé da manhã ">
		<div class="descricao">
			Nosso buffet é preparado por renomados chefs, sempre procurando maneiras inovadoras e saudáveis de combinar os melhores ingredientes.
		</div>

		<img src="view/imagens/piscina.jpg" class="img-rounded" width="500" height="450" alt="piscina">
		<div class="descricao">
			Nossa piscina está disponível durante 24horas, contando com salva-vidas em tempo integral e aquecimento.
		</div>

		<img src="view/imagens/spa.jpg" class="img-rounded" width="500" height="450" alt="spa">
		<div class="descricao">Possuímos um spa com profisionais para ajudar no relaxamento dos hóspedes.</div>

		<img src="view/imagens/piscina2.jpg" class="img-rounded" width="500" height="450" alt="piscina spa">
		<div class="descricao">Depois de uma sessão relaxante no spa o hóspede é convidado a dar uma mergulho em nossa piscina aquecida interna.</div>

		<img src="view/imagens/restaurante.jpg" class="img-rounded" width="500" height="450" alt="salão de festas">
		<div class="descricao">O Salão Gold é o ambiente perfeito para grandes celebrações.</div>

		<img src="view/imagens/salao_de_festas.jpg" class="img-rounded" width="500" height="450" alt="salão de festas 2">
		<div class="descricao">O Salão Silver é destinado para eventos profissionais.</div>

		<img src="view/imagens/academia.jpg" class="img-rounded" width="500" height="450" alt="academia">
		<div class="descricao">Nossa academia fica disponível 24horas para os hóspedes que desejam manter sua rotina de exercícios em dia.</div>

		<img src="view/imagens/jardim.jpg" class="img-rounded" width="500" height="450" alt="jardim">
		<div class="descricao">Nosso jardim possui uma grande diversidade de plantas e flores da flora nacional e um cristalino lago para hospédes que gostam de passar um tempo ao ar livre.</div>


	</div>


</body>
</html>
