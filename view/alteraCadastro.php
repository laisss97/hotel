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
			<a href="?funcao=alterarCadastro">Alterar cadastro</a>
			<a href="?funcao=reservar">Reservar</a>
			<a href="?funcao=cancelarReserva">Cancelar reserva</a>
			<a href="?funcao=quartos">Quartos</a>
			<a href="?funcao=servicos">Serviços</a>
			<a href="?funcao=sairLogin">Sair</a>
		</nav>
	</section>


	<div class="cadastro">

		<h2>Altere seu cadastro:</h2>
        <h3>Coloque as informações:</h3>
        
        	<p>
		        <form action="?funcao=alterarCadastro" method="post">
		        	<input type="hidden" id="id" name="id" value="<?= $hospede[0]->getId(); ?>">
		
		            <label for="nome">Nome Completo:</label><br>
		            <input name="nome" id="nome" type="text" maxlength="100" required="required" 
		            value="<?= $hospede[0]->getNome(); ?>"/><br>
		            <!--input type="submit" value="Enviar"-->
		        
		    </p>

		    <p>
		            <label for="email">E-mail:</label><br>
		            <input name="email" id="email" type="email" required="required" 
		            value="<?= $hospede[0]->getEmail(); ?>"/><br>
		            <!--input type="submit" value="Enviar"-->
		    </p>

	        <p>
		            <label>Telefone para contato:</label><br>
		            <input type="tel" name="telefone" 
		            		pattern="(\+\d{1,3})?\s?([\(]?\d{2,3}[\)]?)?\s?\d{4,5}\s?-?\d{4}" 
		                    value="<?= $hospede[0]->getTelefone(); ?>"><br>

		            <!--input type="submit" value="Enviar"-->
		    </p>

		    <p>
		            <label>Data de nascimento:</label><br>
		            <input type="date" name="dataNascimento" value="<?= $hospede[0]->getDataNascimento(); ?>" required><br>
		            <!--input type="submit" value="Enviar"-->
		       
		    </p>

	        <p>
		  
		            <label>CPF:</label><br>
		            <input name="cpf" value="<?= $hospede[0]->getCpf(); ?>" required maxlength="11"><br>
		            <!--input type="submit" value="Enviar"-->
		        
		    </p>


		    <p> 
		        
		            <label>Endereço:</label><br>
		            <input type="text" name="rua" value="<?= $hospede[0]->getRua(); ?>"><br>
		            <label>Número:</label><br>
		            <input type="number" name="numeroCasa" value="<?= $hospede[0]->getNumeroCasa(); ?>"><br>
		            <label>Bairro:</label><br>
		            <input type="text" name="bairro" value="<?= $hospede[0]->getBairro(); ?>"><br>
		            <label>CEP:</label><br>
		            <input name="cep" placeholder="CEP" value="<?= $hospede[0]->getCep(); ?>" maxlength="8"><br>
		           
		    </p>

		    <p>
				<label for="senha">Senha</label><br>
				<input name="senha" id="senha" type="password" minlenght="8" name="password" value="<?= $hospede[0]->getSenha(); ?>" required="requirited"><br>
			</p>

				 <input type="submit" value="Salvar" name = "alteraCadastroEnviado">
		    </form>
		    <!--<a href="cadastro.html" class="botao" role="button">Editar cadastro</a>-->
	</div>
		    	
</body>
</html>