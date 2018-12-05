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
			<a href="?funcao=home">Início</a>
			<a href="?funcao=login">Login</a>
			<a href="?funcao=cadastro">Cadastro</a>
			<a href="?funcao=quartos">Quartos</a>
			<a href="?funcao=servicos">Serviços</a>
		</nav>
	</section>


	<div class="cadastro">
		<h2>Preencha o cadastro:</h2>
        <h3>Coloque as informações:</h3>
        

        	<p>
		        <form action="?funcao=processaCadastro" method="post">
		            <label for="nome">Nome Completo:</label><br>
		            <input name="nome" id="nome" type="text" maxlength="100" placeholder="Nome completo" required="required"><br>
		            <!--input type="submit" value="Enviar"-->
		        
		    </p>

		    <p>
		            <label for="email">E-mail:</label><br>
		            <input name="email" id="email" type="email" placeholder="Preencha o email" required="required"><br>
		            <!--input type="submit" value="Enviar"-->
		        
		    </p>

	        <p>
		            <label>Telefone para contato:</label><br>
		            <input type="tel" name="telefone" 
		                   title="telgeral" placeholder="Telefone" required><br>

		            <!--input type="submit" value="Enviar"-->
		    </p>

		    <p>
		            <label>Data de nascimento:</label><br>
		            <input type="date" name="dataNascimento" required><br>
		            <!--input type="submit" value="Enviar"-->
		       
		    </p>

	        <p>
		  
		            <label>CPF:</label><br>
		            <input name="cpf" placeholder="CPF" required maxlength="11" required><br>
		            <!--input type="submit" value="Enviar"-->
		        
		    </p>


		    <p>
		        
		            <label>Endereço:</label><br>
		            <input type="text" name="rua" placeholder="Rua" required><br>
		            <label>Número:</label><br>
		            <input type="number" name="numeroCasa" placeholder="Número" required><br>
		            <label>Bairro:</label><br>
		            <input type="text" name="bairro" placeholder="Bairro" required><br>
		            <label>CEP:</label><br>
		            <input name="cep" placeholder="CEP" maxlength="8" required><br>
		           
		    </p>

		    <p>
				<label for="senha">Senha</label><br>
				<input name="senha" id="senha" type="password" minlenght="8" name="password" placeholder="Mínimo 8 caracteres" required="requirited"><br>
			</p>

				 <input type="submit" value="Salvar" name = "cadastroEnviado">
		    </form>
		    <!--<a href="cadastro.html" class="botao" role="button">Editar cadastro</a>-->
	</div>
		    	
</body>
</html>