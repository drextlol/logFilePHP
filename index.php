<?php

/** Esse trecho de código irá listar as exceções do php **/
set_error_handler("logErrorHandler");

function logErrorHandler($errno, $errstr, $errfile, $errline) {
    $logWrite = array();

    /**
    ** Manual: http://php.net/manual/pt_BR/function.set-error-handler.php
    ** Constantes mágicas do PHP
    ** ($errno) O primeiro parâmetro, errno, contém o nível de erro que aconteceu, como um inteiro.
    ** ($errstr) O segundo parâmetro, errstr, contém a mensagem de erro, como uma string.
    ** ($errfile) O terceiro parãmetro é opcional, errfile, o qual contém o nome do arquivo no qual o erro ocorreu, como uma string.
    ** ($errline) O quarto parâmetro é opcional, errline, o qual contém o número da linha na qual o erro ocorreu, como um inteiro.
    ** Na variável ($errstr) irá a string de erro
	** Para pegar a linha no arquivo usar: ($errline) __LINE__
	** Para pegar o arquivo que está executando: ($errfile) __FILE__
    **/

    $filename = 'logs/errors.log';
	$logWrite['hora'] = date('d/m/Y H:i:s') . " | ";
	$logWrite['text'] =  "Erro: "  . $errstr  . " on line " . $errline . " in " . $errfile . "\n\n";

	// Caso não exista cria, e caso exista escreve no arquivo físico
	file_put_contents($filename, $logWrite, FILE_APPEND);
}
/** Fim trecho de código irá listar as exceções do php **/


/* Para chamar a função */
/* logErrorHandler(Parâmetros) */