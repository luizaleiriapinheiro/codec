<?php

function encriptar($texto = null, $chave = null) { // Função para encriptar
    for ($i=0; $i<strlen($texto); $i++){ //realiza um loop que encripta uma letra por vez, para tanto pega o número de caracteres do texto
        $ascii = ord($texto[$i]); //coloca o valor do caractere na tabela ascci
        $ascii = $ascii + $chave; //soma a chave, encriptando
        if ($ascii > 126){ //caso não seja um valor reconhecido e aceito, volta para o inicio (menor possível)
            $ascii = $ascii - 62;
        }
        $newString[$i] = chr($ascii); //retorna do modo ascci para o caractere, agora encriptado
        $ascii++;
    }
    $textoPronto = implode("",$newString); //transforma o array de caracteres (separados no for) de volta em string
    return $textoPronto; //retorna o texto encriptado
}

function decriptar($texto = null, $chave = null) { // Função para decriptar
    for ($i=0; $i<strlen($texto); $i++){ //realiza um loop que decripta uma letra por vez, para tanto pega o número de caracteres do texto
        $ascii = ord($texto[$i]); //coloca o valor do caractere na tabela ascci
        $ascii = $ascii - $chave; //diminui a chave, decriptando
        if ($ascii < 64){ //caso não seja um valor reconhecido e aceito, volta para o final (maior possível)
            $ascii = $ascii + 62;
        }
        $newString[$i] = chr($ascii); //retorna do modo ascci para o caractere, agora decriptado
        $ascii++;
    }
    $textoPronto = implode("",$newString); //transforma o array de caracteres (separados no for) de volta em string
    return $textoPronto; //retorna o texto decriptado
}

function decriptarSemChave($texto) { // Função para decriptar sem chave
    $palavraChave = "IFRS";     //define a palavra chave
    $teste = ''; // inicializa variável
    for ($i=0; $i<strlen($texto); $i++){ //realiza um loop que decripta a partir de uma letra por vez, para tanto pega o número de caracteres do texto
        $teste = substr($texto, $i, 4); //corta o texto em um conjunto de 4 letras (tamanho da palavra chave), iniciando pela letra informada no loop anterior (sempre se move de 1 em 1)
		for ($k=1; $k <= 50; $k++){
			$decriptografa = decriptar($teste, $k);  // testa a decriptografia de todas as chaves possíveis até 50, à procura da palavra chave
			if ($decriptografa == $palavraChave){ //se encontra a palavra chave quando decriptografa, define a chave e sai do loop
				$chave = $k;
				break;
			}
		} 
		
    }
	$textoPronto = decriptar($texto,$chave); //decriptografa o texto inteiro, agora que sabe a chave
    return $textoPronto; //retorna texto decriptografado
} 

?>