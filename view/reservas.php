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

	<div class="reserva">

	    <h2>ESCOLHA A DATA:</h2>

	    <form action="?funcao=recebeData" method="post">
	    	
		    <label>CHECK IN:</label><br>
		    <input type="date" name="dataEntrada" required><br>

		    <label>CHECK OUT:</label><br>
		    <input type="date" name="dataSaida" required><br> 

		    <input type="submit" value="Enviar" name = "datasEnviado">

		</form>
    
		
		<?php 
			if(isset($flag) and $flag == 1)
				echo $_SESSION['msg_data'];
		?>		

    </div>

</body>
</html>
