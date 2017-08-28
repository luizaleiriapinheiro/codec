<?php

function encriptar($texto = null, $chave = null) { // Função para encriptar
    for ($i=0; $i<strlen($texto); $i++){
        $ascii = ord($texto[$i]);
        $ascii = $ascii + $chave;
        if ($ascii > 126){
            $ascii = $ascii - 62;
        }
        $newString[$i] = chr($ascii);
        $ascii++;
    }
    $textoPronto = implode("",$newString);
    return $textoPronto;
}

function decriptar($texto = null, $chave = null) { // Função para decriptar
    for ($i=0; $i<strlen($texto); $i++){
        $ascii = ord($texto[$i]);
        $ascii = $ascii - $chave;
        if ($ascii < 64){
            $ascii = $ascii + 62;
        }
        $newString[$i] = chr($ascii);
        $ascii++;
    }
    $textoPronto = implode("",$newString);
    return $textoPronto;
}

function decriptarSemChave($texto) { // Função para decriptar sem chave
    //pega a palavra chave e conta letra IFRS = 4
    //se movendo de um em um, estuda o conjunto de 4 letras procurando a palavra chave
    //para isso, testa todas as chaves possíveis até 50
    //quando encontra, para e decripta o texto do começo
    
    $palavraChave = "IFRS";
    $teste = '';
    for ($i=0; $i<strlen($texto); $i++){
        $teste = substr($texto, $i, 4);
		for ($k=1; $k <= 50; $k++){
			$decriptografa = decriptar($teste, $k);
			if ($decriptografa == $palavraChave){
				$chave = $k;
				break;
			}
		} 
		
    }
	$textoPronto = decriptar($texto,$chave);
    return $textoPronto;
} 

?>