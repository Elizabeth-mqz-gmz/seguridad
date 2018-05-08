<?php
echo '<html>';
		echo '<head>';
			echo '<title>Info</title>';
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
				echo '<h1>-INFO-</h1>';
			echo '</header>';
			echo '<section>';
				$nom="/".$_GET["nom"]."/";
				$ape="/".$_GET["ape"]."/";
				$numcta="/".$_GET["numcta"]."/";
				$contra="/".$_GET["contra"]."/";
				$tel="/".$_GET["tel"]."/";
				$email="/".$_GET["email"]."/";
				$curp="/".$_GET["curp"]."/";
				
					if (preg_match("/[A-Za-z]/",$nom)) 
						echo "Correcto<br/>";
					else 
						echo "Nombre incorrecto<br/>";
					
					if (preg_match("/[A-Za-z]/",$ape)) 
						echo "Apellido correcto<br/>";
					else 
						echo "Apellido incorrecto ape<br/>";
					
					if (preg_match("/[0-9]{9,9}/",$numcta)) 
						echo "Número de cuenta correcto cun<br/>";
					else 
						echo "Número de cuenta incorrecto cun<br/>";
					
					if (preg_match("/(?=^.{9,}$)((?=.\d)|(?=.\W+))(?![.\n])(?=.[A-Z])(?=.[a-z]).*$/",$contra)) 
						echo "Contraseña incorrecta<br/>";
					else 
						echo "Contraseña incorrecta<br/>";
					
					if (preg_match("/[0-9]{10,10}/",$tel)) 
						echo "Teléfono correcto<br/>";
					else 
						echo "Teléfono incorrecto tel<br/>";
					
					if (preg_match("/@(?=gmail.com|comunidad.unam.mx|gmail.com.mx)/",$email)) 
						echo "Email correcto<br/>";
					else 
						echo "Email incorrecto<br/>";
					
					if (preg_match("/[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}/",$curp)) 
						echo "CURP correcto curp<br/>";
					else 
						echo "CURO incorrecto curp<br/>";
			echo '</section>';
		echo '</body>';
	echo '</html>';
	
?>