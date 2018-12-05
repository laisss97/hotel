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

			<?php
				if(isset($flag_reserva) and $flag_reserva == 1){
					echo "<p> Selecione qual reserva deseja cancelar:</p>";

					echo "<p>";

					//for($i = 0; $i < count($msg); $i++)
            		//	echo "Código = " . $msg[$i];

					echo "<form action=\"?funcao=cancelarReserva\" method=\"post\">
							<label for=\"codigo\">Código:</label><br>
							<select name=\"codigo\">";

					for($i = 0; $i < count($msg); $i++)
						echo "<option value=" . $msg[$i] . "> " . $msg[$i] .  "</option>";

					echo "</select>
						     <input type=\"submit\" value=\"Enviar código\" name=\"codigoEnviado\"/><br>      
		        		</form>";

		        	//echo $c;

	            	echo "</p>";
					}
				else
				{
					echo "<p>" . $msg . "</p>";
				}
			?>		
			
		</article>

		<footer> 
			<p>Entre em contato conosco:<br>Telefone: 555-963-852<br>E-mail: hotelpalacios@palacios.com.br</p>
		</footer>

	</body>
</html>
