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
			
			</nav>
		</section>

		<article>

			<h2>Cancelamento da Reserva</h2>

				<p> <?= $_SESSION['nomeHospede']?>, confirme o cancelamento da reserva abaixo: </p>

				<table>
	            <caption>Dados da Reserva</caption>
	            <thead>
	                <tr>
	                    <th>Dados</th>
	                    <th>Conteúdo</th>
	                </tr>
	            </thead>
	            <tbody>
	                <?php
		               	echo "<tr> <th> Email do Hospede: </th> <th>" . $_SESSION['emailHospede'] . "</th> </tr>";
						echo "<tr> <th> Data de entrada: </th> <th>" . $_SESSION['dataEntrada'] . "</th> </tr>";
						echo "<tr> <th> Data de Saída: </th> <th>" . $_SESSION['dataSaida'] . " </th> </tr>";

						echo "<tr> <th> Quarto Simplex: </th> <th>" . $_SESSION['nQuartoSimple']  . "</th> </tr>";
						echo "<tr> <th> Quarto Lux: </th> <th>" . $_SESSION['nQuartoLux'] . " </th> </tr>";
						echo "<tr> <th> Quarto Lux Master: </th> <th>" . $_SESSION['nQuartoLuxMaster'] . "</th> </tr>"; 
						echo "<tr> <th> Quarto Lux Imperial: </th> <th>" . $_SESSION['nQuartoLuxImperial'] . "</th> </tr>"; 

						echo "<tr> <th> Tipo de cartão: </th> <th>" . $_SESSION['numCartao'] . "</th> </tr>";
						echo "<tr> <th> Nome no cartão: </th> <th>" . $_SESSION['nomeCartao'] . "</th> </tr>";
						echo "<tr> <th> Validade do cartão: </th> <th>" . $_SESSION['validade'] . "</th> </tr>";
						echo "<tr> <th> CodSegurança do cartão: </th> <th>" . $_SESSION['codSeguranca'] . "</th> </tr>";
						echo "<tr> <th> Parcelas: </th> <th>" . $_SESSION['parcelas'] . "</th> </tr>";
					?>
		              
		            </tbody>
		            
		        </table>

		        <p> <a href="?funcao=cancelaReservaId" class="clica1" role="button">Confirmar</a> <a href="?funcao=homeLogin" class="clica2" role="button"> Cancelar</a> </p>


		    
		</article>

		<footer> 
			<p>Entre em contato conosco:<br>Telefone: 555-963-852<br>E-mail: hotelpalacios@palacios.com.br</p>
		</footer>

	</body>
</html>
