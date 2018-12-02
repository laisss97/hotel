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
	
	<div class="pagamento">
	<h2>Pagamento</h2> 

	<h3>Por favor escolha o tipo de pagamento: (Fazer o cálculo do preço a ser pago pelo cliente) </h3>

		<form action="?funcao=processaPagamento" method="post">
			<p>
				<label for="cartao"> Cartão :</label>
				<select name="cartao">
				    <option value="credito">Crédito</option>
				    <option value="debito">Débito</option>
			    </select>
			</p>
			    
			<p>
				<label for="numCartao">Número do cartão</label><br>
				<input name="numCartao" id="numCartao" type="text"   required="requirited"><br>
			</p>
			<p>
				<label for="nomeCartao">Nome impresso no cartão</label><br>
				<input name="nomeCartao" id="nomeCartao" type="text"   required="requirited"><br>
			</p>
			<p>
				<label for="validade">Validade do cartão</label><br>
				<input name="validade" id="validade" type="month"   required="requirited"><br>
			</p>
			<p>
				<label for="codSeguranca">Código de segurança</label><br>
				<input name="codSeguranca" id="codSeguranca" type="text" maxlength="4" required="requirited"><br>
			</p>
			<p>
				<label for="parcelas">Parcelar em:</label><br>
				<select name="parcelas">
				    <option value="parcelas_3x">3 vezes</option>
				    <option value="parcelas_5x">5 vezes</option>
				    <option value="parcelas_6x">6 vezes</option>
			    </select>

			</p>
			<p>
				<!-- Deve ir para uma mensagem de paragamento efetuado com sucesso ou erro-->
	            <input type="submit" value="Efetuar Pagamento" name="pagamentoEnviado"/><br>      
	        </p>
	        </form>
	</div>


</body>
</html>
