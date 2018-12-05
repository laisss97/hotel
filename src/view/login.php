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
	<title>Login do usuário</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="view/palacio.css">
</head>

<body>
	<header>
		<h1>Hotel Palácios</h1>
	</header>

	<section>
		<nav>
			<a href="?funcao=home">Início</a>
			<a href="?funcao=login">Login</a>
			<a href="?funcao=cadastro">Cadastro</a>
			<a href="?funcao=quartos">Quartos</a>
			<a href="?funcao=servicos">Serviços</a>
		</nav>
	</section>
	
	<div class="login">
	<h2>Login</h2>

	<h3>Por favor entre com seu login e senha</h3>
	
		<form action="?funcao=processaLogin" method="post">
			<p>
				<label for="login">Login</label><br>
				<input name="email" id="email" type="E-mail" name="E-mail" placeholder="Preencha com o e-mail do cadastro" required="requirided"><br>
			</p>
			<p>
				<label for="senha">Senha</label><br>
				<input name="senha" id="senha" type="password" minlenght="8" name="password" placeholder="Mínimo 8 caracteres" required="requirited"><br>
			</p>
			<p>
	            <input type="submit" value="Entrar" name="loginEnviado"/><br>
	            <a href="?funcao=cadastro" class="botao" role="button">Não possuo cadastro</a>
	        </p>
		</form>
	</div>


</body>
</html>