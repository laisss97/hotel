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

		<img src="https://media-cdn.tripadvisor.com/media/photo-s/0a/63/9c/f4/recepcao.jpg" class="img-rounded" width="500" height="450" alt="recepcao">
		<div class="descricao">
			O hóspede ao chegar no Hotel Palácios encontrará um ambiante de requinte e acolhedor.
			</div>

		<img src="http://blog.hospedin.com/wp-content/uploads/2016/02/A-importancia-da-equipe-do-hotel-na-satisfacao-do-cliente.jpg" class="img-rounded" width="500" height="450" alt="funcionarios recepção">
		<div class="descricao">
			Nosso funcionários são altamente capacitados para prestar o melgor atendimento.
		</div>

		<img src="https://i.ytimg.com/vi/amlyljz0CE8/maxresdefault.jpg" class="img-rounded" width="500" height="450" alt="camareira">
		<div class="descricao">
			Possuímos uma equipe encarregada da organização do ambiente para a melhor comodidade para os hóspedes.
			
		</div>

		<img src="http://www.tourqual.com/wp-content/uploads/2018/07/food-3137152_640.jpg" class="img-rounded" width="500" height="450" alt="café da manhã">
		<div class="descricao">
			Temos o melhor café colonial da região.</p>
		</div>

		<img src="https://3.bp.blogspot.com/-uAC-v7gEzxU/Vr_etnYxkoI/AAAAAAAAA1U/Js9F7vSJB54/s1600/cafe-da-manha-mesa-paes-1.jpg" class="img-rounded" width="500" height="450" alt="tcafé da manhã ">
		<div class="descricao">
			Nosso buffet é preparado por renomados chefs, sempre procurando maneiras inovadoras e saudáveis de combinar os melhores ingredientes.
		</div>

		<img src="http://www.hotelestanciaatibainha.com.br/images/lazer/piscinas/coberta-infantil-2.jpg" class="img-rounded" width="500" height="450" alt="piscina">
		<div class="descricao">
			Nossa piscina está disponível durante 24horas, contando com slava-vidas em tempo integral e aquecimento.
		</div>

		<img src="http://www.hotelunique.com.br/images/034_hotel%20unique_%20spa%20room.jpg?crc=319208505" class="img-rounded" width="500" height="450" alt="spa">
		<div class="descricao">Possuímos um spa com profisionais para ajudar no relaxamento dos hóspedes.</div>

		<img src="https://www.hoteleselba.com/sites/default/files/styles/hotel_media/public/media_3_8.jpg?itok=P4tkZG2w" class="img-rounded" width="500" height="450" alt="piscina spa">
		<div class="descricao">Depois de uma sessão relazante no spa o hóspede é convidado a dar uma megulho em nossa piscina aquecida interna.</div>

		<img src="http://www.sw-hotelguide.com/portugal/bussaco/palace-hotel-bussaco/images/stories/rotators/restaurants/restaurants_03.jpg" class="img-rounded" width="500" height="450" alt="salão de festas">
		<div class="descricao">O Salão Gold é o ambiente perfeito para grandes celebrações.</div>

		<img src="http://www.maripelomundo.com.br/wp-content/uploads/2015/12/Pal%C3%A1cio-Nacional-da-Ajuda-em-Lisboa-Sal%C3%A3o-de-Banquetes.jpg" class="img-rounded" width="500" height="450" alt="salaõ de festas 2">
		<div class="descricao">O Salão Silver é destinado para eventos profissionais.</div>

		<img src="http://apureguria.com/wp-content/uploads/2016/02/academia-hotel-alpestre.jpg" class="img-rounded" width="500" height="450" alt="academia">
		<div class="descricao">Nossa academia fica disponível 24horas para os hóspedes que desejam manter sua rotina de exercícios em dia.</div>

		<img src="https://gustavosirelli.files.wordpress.com/2010/04/republica.jpg" class="img-rounded" width="500" height="450" alt="jardim">
		<div class="descricao">Nosso jardim possui uma grande diversidade de plantas e flores da flora nacional e um cristalino lago para hospédes que gostam de passar um tempo ao ar livre.</div>


	</div>


</body>
</html>