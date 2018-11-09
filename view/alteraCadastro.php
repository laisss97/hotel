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
		<h1>Hotel Palácios Arrumar!!!</h1>
	</header>

	<section>
		<nav>
			<a href="?funcao=home">Início</a>
			<a href="?funcao=login">Login</a>
			<a href="?funcao=cadastro">Cadastro</a>
			<a href="?funcao=reservas">Reservas</a>
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
		            <input name="nome" id="nome" type="text" maxlength="100" value="<?= $hospede->getNome(); ?>" required="required"><br>
		            <!--input type="submit" value="Enviar"-->
		        
		    </p>

		    <p>
		            <label for="email">E-mail:</label><br>
		            <input name="email" id="email" type="email" value="<?= $hospede->getEmail(); ?>" required="required"><br>
		            <!--input type="submit" value="Enviar"-->
		        
		    </p>

	        <p>
		            <label>Telefone para contato:</label><br>
		            <input type="tel" name="telefone" 
		            		pattern="(\+\d{1,3})?\s?([\(]?\d{2,3}[\)]?)?\s?\d{4,5}\s?-?\d{4}" 
		                    value="<?= $hospede->getTelefone(); ?>"><br>

		            <!--input type="submit" value="Enviar"-->
		    </p>

		    <p>
		            <label>Data de nascimento:</label><br>
		            <input type="date" name="dataNascimento" value="<?= $hospede->getDataNascimento(); ?>" required><br>
		            <!--input type="submit" value="Enviar"-->
		       
		    </p>

	        <p>
		  
		            <label>CPF:</label><br>
		            <input name="cpf" value="<?= $hospede->getCpf(); ?>" required maxlength="11"><br>
		            <!--input type="submit" value="Enviar"-->
		        
		    </p>


		    <p> 
		        
		            <label>Endereço:</label><br>
		            <input type="text" name="rua" value="<?= $hospede->getRua(); ?>"><br>
		            <label>Número:</label><br>
		            <input type="number" name="numeroCasa" value="<?= $hospede->getNumeroCasa(); ?>"><br>
		            <label>Bairro:</label><br>
		            <input type="text" name="bairro" value="<?= $hospede->getBairro(); ?>"><br>
		            <label>CEP:</label><br>
		            <input name="cep" placeholder="CEP" value="<?= $hospede->getCep(); ?>" maxlength="8"><br>
		           
		    </p>

		    <p>
				<label for="senha">Senha</label><br>
				<input name="senha" id="senha" type="password" minlenght="8" name="password" value="<?= $hospede->getSenha(); ?>" required="requirited"><br>
			</p>

				 <input type="submit" value="Salvar" name = "cadastroEnviado">
		    </form>
		    <!--<a href="cadastro.html" class="botao" role="button">Editar cadastro</a>-->
	</div>
		    	
</body>
</html>