<?php
	$texto = $_GET['texto'];
	$valor = $_GET['codif'];
	
	$letras = Array('A'=>'g', 'B'=>'w', 'C'=>'z', 'D'=>'f', 'E'=>'a', 'F'=>'o', 'G'=>'l', 'H'=>'s', 'I'=>'x',
				'J'=>'b', 'K'=>'c', 'L'=>'k', 'M'=>'m', 'N'=>'h', 'O'=>'y', 'P'=>'i', 'Q'=>'t', 'R'=>'u',
				'S'=>'j', 'T'=>'e', 'U'=>'n', 'V'=>'d', 'W'=>'r', 'X'=>'p', 'Y'=>'v', 'Z'=>'q');
	if($valor == '1')
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
	
	if($valor == '2')
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
	
	if($valor == '3')
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
	
	if($valor == '4')
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
?>