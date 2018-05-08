<?php
	echo '<html>';
		echo '<head>';
			echo '<title>Palabra</title>';
			echo '<meta charset="UTF-8"/>';
			echo '<link href="https://fonts.googleapis.com/css?family=Philosopher" rel="stylesheet">';
			echo '<style>';
				echo 'body{';
					echo 'text-align: center;';
					echo 'background: blue;';
					echo 'font-family: "Philosopher", sans-serif;';
					echo 'color: white;';
					echo 'font-size: 30px;';
				echo '}';
			echo '</style>';
		echo '</head>';
		echo '<body>';
			echo '<header>';
				echo '<h1>-TEXTO-</h1>';
			echo '</header>';
			echo '<section>';
				$texto = $_GET['texto'];
				$palabra = '/'.$_GET['palabra'].'/';
				
				$num = preg_match_all($palabra, $texto);
					echo 'La palabra "'.$_GET['palabra'].'" se repite '.$num.' veces';
			echo '</section>';
		echo '</body>';
	echo '</html>';
?>	