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
		<h2>Bem vindo <?= $_SESSION['nomeHospede']; ?> !</h2>
		<p>O Hotel Palácios está há 200 anos oferecendo hospedagem, conforto e requinte para seus hóspedes.</p>
		<p>Fundado por Don Cássio de Santana Silvério e a baronesa Hilda Teodora Miranda Lourenço, o Hotel Palácios foi fundado com o objetivo de proporcionar serviços de hospedagem de excelência para cidadãos de alto poder aquisitivo, personagens da política mundial e celebridades.</p>

		<!--Galeria de imagens internas do hotel-->		

		

		<div class="gallery">
			<a target="_blank" href="view/icon/recepcao.jpg">
				<img src="view/icon/recepcao.jpg" alt="recepcao" width="200" height="200">
			</a>
			<div class="desc">Recepção</div>
		</div>

		<div class="gallery">
			<a target="_blank" href="view/icon/quarto1.jpg">
				<img src="view/icon/quarto1.jpg" alt="quarto" width="200" height="200">
			</a>
			<div class="desc">Quarto</div>
		</div>

		<div class="gallery">
			<a target="_blank" href="view/icon/piscina.jpg">
				<img src="view/icon/piscina.jpg" alt="piscina" width="200" height="200">
			</a>
			<div class="desc">Piscina</div>
		</div>

		<div class="gallery">
			<a target="_blank" href="view/icon/spa.jpg">
				<img src="view/icon/spa.jpg" alt="spa" width="200" height="200">
			</a>
			<div class="desc">Spa</div>
		</div>

		<!--<div class="gallery"> 
			<a target="_blank" href="http://www.maripelomundo.com.br/wp-content/uploads/2015/12/Pal%C3%A1cio-Nacional-da-Ajuda-em-Lisboa-Sal%C3%A3o-de-Banquetes.jpg">
				<img src="http://www.maripelomundo.com.br/wp-content/uploads/2015/12/Pal%C3%A1cio-Nacional-da-Ajuda-em-Lisboa-Sal%C3%A3o-de-Banquetes.jpg" alt="salão de festas" width="200" height="200">
			</a>
			<div class="desc">Salão de Festas</div>
		</div>-->

		<div class="gallery">
			<a target="_blank" href="view/icon/academia.jpg">
				<img src="view/icon/academia.jpg" alt="academia" width="200" height="200">
			</a>
			<div class="desc">Academia</div>
		</div>

		<div class="gallery">
			<a target="_blank" href="view/icon/jardim.jpg">
				<img src="view/icon/jardim.jpg" alt="jardim" width="200" height="200">
			</a>
			<div class="desc">Jardim</div>
		</div>
	</article>

	<footer> 
		<p>Entre em contato conosco:<br>Telefone: 555-963-852<br>E-mail: hotelpalacios@palacios.com.br</p>
	</footer>

</body>
</html>
