<?php
	$texto = $_POST['texto'];
	$valor = $_POST['codif'];
	$key = $_POST['llave'];
	
	$letras = Array('A'=>'g', 'B'=>'w', 'C'=>'z', 'D'=>'f', 'E'=>'a', 'F'=>'o', 'G'=>'l', 'H'=>'s', 'I'=>'x',
				'J'=>'b', 'K'=>'c', 'L'=>'k', 'M'=>'m', 'N'=>'h', 'O'=>'y', 'P'=>'i', 'Q'=>'t', 'R'=>'u',
				'S'=>'j', 'T'=>'e', 'U'=>'n', 'V'=>'d', 'W'=>'r', 'X'=>'p', 'Y'=>'v', 'Z'=>'q');
	if($valor == '1') //cifrado personal
	{
		$texto = strtoupper($texto);
		$clean = str_replace(' ','',$texto);
		$porciones = str_split($clean);
		$codigo = array();
		$long = -1;
		foreach ($porciones as $ind => $val)
			foreach ($letras as $indice => $valor)
			{
				if($val == $indice)
				{
					$long++;
					$codigo [$long] = $valor;
				}
			}
		$cadena_cod = implode('', $codigo);
		echo $cadena_cod;
	}
	
	if($valor == '2')//descifrado personal
	{
		$long = -1;
		$texto = str_split($texto);
		$descod = array();
		foreach ($texto as $ind => $val)
			foreach($letras as $indice => $valor)
			{
				if($val == $valor)
				{
					$long++;
					$descod [$long] = $indice;
				}
			}
		$cadena_descod = implode('', $descod);
		echo $cadena_descod;
	}
	
	if($valor == '3')//hash
	{
		$sal = 'eA!k=7P';
		$pim = 'W6k+o3h5g';
		$texto = strtolower($texto);
		$clean = str_replace(' ','',$texto);
		$porciones = str_split($clean);
		foreach ($porciones as $ind => $val)
		{
			$d=$ind%2;
			if($d != 0)
				unset($porciones[$ind]);
		}
		$porciones = implode('', $porciones);
		$hach = $sal.$porciones.$pim;
		$hach = str_split($hach);
		$codigo = array();
		$long = -1;
		foreach($hach as $ind => $val)
		{
			$d=$ind%2;
			if($d != 0)
			{
				$long++;
				$codigo[$long]=$val;
			}
		}
		$codigo = implode('', $codigo);
		echo substr($codigo, 0, 8);
	}
	
	if($valor == '4')//cifrado simétrico
	{
		$texto = strtolower($texto);
		$clean = str_replace(' ','',$texto);
		$long = strlen($clean)-1;
		$porciones = str_split($clean);
		$imp = array();
		$par = array();
		$des = array();
		$k=-1;
		foreach($porciones as $ind => $val)
		{
			$d=$ind%2;
			if($d != 0)
			{
				$k++;
				$imp[$k]= $val;
			}
		}
		foreach($porciones as $ind => $val)
		{
			$d=$ind%2;
			if($d == 0)
			{
				$k++;
				$par[$k]= $val;
			}
		}
		$imp = implode('', $imp);
		$par = implode('', $par);
		echo $imp.$par;
	}
	
	if($valor == '5')//descrifrado simétrico
	{
		$longi = strlen($texto);
		$pol_imp = substr($texto, 0, $longi/2);
		$pol_imp = str_split($pol_imp.'X');
		$d=$longi%2;
		if($d != 0)
		{
			$pol_imp = substr($texto, 0, $longi/2);
			$pol_imp = str_split($pol_imp.'X');
		}
		$pol_par = substr($texto, $longi/2, $longi);
		$pol_par = str_split($pol_par);
		for($x=0; $x<=$longi/2; $x++)
		{
			echo $pol_par[$x];
			echo $pol_imp[$x];
		}
	}
	
	if($valor == '6')//cifrado playfair
	{	
		$texto = strtoupper($texto);
		$clean = str_replace(' ','',$texto);
		//echo $clean;
		$pal = strlen($clean);
		$mat = $pal/$key;
		if(is_float($mat))
		{
			$clean = str_split($clean);
			for($comp=0; $comp<$key; $comp++)
				array_push($clean, 'X');
			$clean = implode($clean);
		}
		//echo $clean;
		//echo $mat;
		$arre = [];
		$i = 0;
			for($ren=0; $ren<$mat; $ren++)
				for($col=0; $col<$key; $col++)
				{
					$arre[$ren][$col] = $clean[$i];
					$i++;
				}
		//print_r ($arre);
		echo '<br/>';
		for($col=0; $col<$key; $col++)
			for($ren=0; $ren<$mat; $ren++)
				echo $arre[$ren][$col];
	}
	
	if($valor == '7')//descifrado playfair
	{
		$pal = strlen($texto);
		$mat = $pal/$key;
		//echo $texto;
		$arre = [];
		$i = 0;
				for($col=0; $col<$key; $col++)
					for($ren=0; $ren<$mat; $ren++)
				{
					$arre[$ren][$col] = $texto[$i];
					$i++;
					//echo $arre[$ren][$col];
				}
		//print_r ($arre);
		echo '<br/>';
		for($ren=0; $ren<$mat; $ren++)
			for($col=0; $col<$key; $col++)
				echo $arre[$ren][$col];
	}
?>