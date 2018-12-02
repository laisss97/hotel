<!DOCTYPE html>
<!-- 
Trablaho de Programação Web.
Tema: reserva de quarto em hotel.
Data: 1 /12 /2018
-->
<html lang="pt-br">
<head>
	<title>Pagamento</title> 
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="palacio.css">
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
	
	<div class="pagamento">
	<h2>Pagamento</h2> 

	<h3>Por favor escolha o tipo de pagamento: </h3>
	
		<form action="action_page.php">
			<p>
				<!--<label for="credito">Crédito</label><br>-->
				<input name="credito" id="credito" type="radio" value="credito">Cartão de Crédito<br>
			</p>
			<p>
				<!--<label for="debito">Débito</label><br>-->
				<input name="debito" id="debito" type="radio" value="debito">Cartão de Débito<br>
			</p>
			<p>
				<label for="numcartao">Número do cartão</label><br>
				<input name="numcartao" id="numcartao" type="text"   required="requirited"><br>
			</p>
			<p>
				<label for="nomecartao">Nome impresso no cartão</label><br>
				<input name="nomecartao" id="nomecartao" type="text"   required="requirited"><br>
			</p>
			<p>
				<label for="validade">Validade do cartão</label><br>
				<input name="validade" id="validade" type="month"   required="requirited"><br>
			</p>
			<p>
				<label for="codseguranca">Código de segurança</label><br>
				<input name="codseguranca" id="codseguranca" type="text" maxlength="4" required="requirited"><br>
			</p>
			<p>
				<label for="parcelas">Parcelar em:</label><br>
				<input name="parcelas" id="parcelas" type="text" minlength="1" maxlength="4" required="requirited"><br>
			</p>
			<p>
				<!-- Deve ir para uma mensagem de paragamento efetuado com sucesso ou erro-->
	            <input type="submit" value="Efetuar Pagamento" name="enviado"/><br>      
	        </p>
	        </form>
	</div>


</body>
</html>
