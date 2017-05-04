<?php
if ( isset( $_FILES[ 'dados_documento' ] ) ){
$dbHost = 'localhost:888';
$dbUser = 'root';
$dbPswd = '';
$dbName = 'blog';
$upFile =& $_FILES[ 'dados_documento' ];

if ( is_file( $upFile[ 'tmp_name' ] ) && is_readable( $upFile[ 'tmp_name' ] ) ){
	$upName = $upFile[ 'name' ];
	$upDesc = 'Descrição do arquivo'; //De onde vem essa informação ???
	$upSize = filesize( $upFile[ 'tmp_name' ] );
	$upHndl = fopen( $upFile[ 'tmp_name' ] , 'rb' );
	
	$stm = $pdo->prepare = 'INSERT INTO arquivos (descricao_documento, tamanho_documento, dados_documento) VALUES ( ?, ?, ?,? )';
	
		$stm->bindParam( upName, $upName);
		$stm->bindParam( upDesc, $upDesc);
		$stm->bindParam( upSize, $upSize);
		$stm->bindParam( upHndl, $upHndl);

		$execute = $stm->execute();

		fclose( $upHndl );

		if ( !$execute ){
			throw new Exception( 'Não foi possível gravar o arquivo.' , $stm->errorCode() );
		}
	} 
}