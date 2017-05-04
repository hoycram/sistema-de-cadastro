 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Sistema de Cadastro</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container box-mensagem-crud'>
		<?php 
		require 'conexao.php';
		// Atribui uma conexão PDO
		$conexao = conexao::getInstance();
		// Recebe os dados enviados pela submissão
		$acao  = (isset($_POST['acao'])) ? $_POST['acao'] : '';
		$idCurso    = (isset($_POST['idCurso'])) ? $_POST['idCurso'] : '';
		$nomeCurso  = (isset($_POST['nomeCurso'])) ? $_POST['nomeCurso'] : '';
		$nomeArtista  = (isset($_POST['nomeArtista'])) ? $_POST['nomeArtista'] : '';
		$razaoParceiro  = (isset($_POST['razaoParceiro'])) ? $_POST['razaoParceiro'] : '';
		$inicio  = (isset($_POST['inicio'])) ? $_POST['inicio'] : '';
		$fim  = (isset($_POST['fim'])) ? $_POST['fim'] : '';
		$total = (isset($_POST['total'])) ? $_POST['total'] : '';
		$foto_atual = (isset($_POST['foto_atual'])) ? $_POST['foto_atual'] : '';
		$status = (isset($_POST['status'])) ? $_POST['status'] : '';
	
// Valida os dados recebidos
		$mensagem = '';
		if ($acao == 'editar' && $idCurso == ''):
		    $mensagem .= '<li>ID do registros desconhecido.</li>';
	    endif;

	    // Se for ação diferente de excluir valida os dados obrigatórios
	    if ($acao != 'excluir'):
			if ($nomeCurso == '' || strlen($nomeCurso) < 3):
				$mensagem .= '<li>Favor preencher o Nome do curso completo.</li>';
		    endif;
	
	
			/*if ($nomeArtista == '' || strlen($nomeArtista) < 3):
				$mensagem .= '<li>Favor preencher o Nome do Artista completo.</li>';
		    endif;*/

			
			/*	if ($razaoParceiro == '' || strlen($razaoParceiro) < 3):
				$mensagem .= '<li>Favor preencher o Nome do Parceiro completo.</li>';
		    endif;
			
			
				if ($inicio == '' || strlen($inicio) < 3):
				$mensagem .= '<li>Favor preencher o inicio do curso.</li>';
		    endif;
			
			
				if ($fim == '' || strlen($fim) < 3):
				$mensagem .= '<li>Favor preencher o fim do curso.</li>';
		    endif;*/
			
			if ($total == '' || strlen($total) < 0):
				$mensagem .= '<li>Favor preencher o total de aulas.</li>';
		    endif;
			
			
			if ($status == ''):
			   $mensagem .= '<li>Favor preencher o Status.</li>';
			endif;

			if ($mensagem != ''):
				$mensagem = '<ul>' . $mensagem . '</ul>';
				echo "<div class='alert alert-danger' role='alert'>".$mensagem."</div> ";
				exit;
			endif;

		endif;

	// Verifica se foi solicitada a inclusão de dados
		if ($acao == 'incluir'):

			$nome_foto = 'padrao.jpg';
			if(isset($_FILES['foto']) && $_FILES['foto']['size'] > 0):  

				$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
			    $extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));

			     // Validamos se a extensão do arquivo é aceita
			    if (array_search($extensao, $extensoes_aceitas) === false):
			       echo "<h1>Extensão Inválida!</h1>";
			       exit;
			    endif;
 
			     // Verifica se o upload foi enviado via POST   
			     if(is_uploaded_file($_FILES['foto']['tmp_name'])):  
			             
			          // Verifica se o diretório de destino existe, senão existir cria o diretório  
			          if(!file_exists("fotos")):  
			               mkdir("fotos");  
			          endif;  
			  
			          // Monta o caminho de destino com o nome do arquivo  
			          $nome_foto = date('dmY') . '_' . $_FILES['foto']['name'];  
			            
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/'.$nome_foto)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
			          endif;  
			     endif;  
			endif;
			
	$sql = 'INSERT INTO tab_cursos (nomeCurso, nomeArtista, razaoParceiro, inicio, fim, total, status, foto)
							   VALUES(:nomeCurso, :nomeArtista, :razaoParceiro, :inicio, :fim, :total, :status, :foto)';
							   

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':nomeCurso', $nomeCurso);
			$stm->bindValue(':nomeArtista', $nomeArtista);
			$stm->bindValue(':razaoParceiro', $razaoParceiro);
			$stm->bindValue(':inicio', $inicio);
			$stm->bindValue(':fim', $fim);
			$stm->bindValue(':total', $total);
			$stm->bindValue(':status', $status);
			$stm->bindValue(':foto', $nome_foto);
			$retorno = $stm->execute();
			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=cadastro_curso.php'>";
			

		endif;
	  	
		// Verifica se foi solicitada a edição de dados
		
		
		if ($acao == 'editar'):

			if(isset($_FILES['foto']) && $_FILES['foto']['size'] > 0): 

				// Verifica se a foto é diferente da padrão, se verdadeiro exclui a foto antiga da pasta
				if ($foto_atual <> 'padrao.jpg'):
					unlink("fotos/" . $foto_atual);
				endif;

				$extensoes_aceitas = array('bmp' ,'png', 'svg', 'jpeg', 'jpg');
			    $extensao = strtolower(end(explode('.', $_FILES['foto']['name'])));

			     // Validamos se a extensão do arquivo é aceita
			    if (array_search($extensao, $extensoes_aceitas) === false):
			       echo "<h1>Extensão Inválida!</h1>";
			       exit;
			    endif;
 
			     // Verifica se o upload foi enviado via POST   
			     if(is_uploaded_file($_FILES['foto']['tmp_name'])):  
			             
			          // Verifica se o diretório de destino existe, senão existir cria o diretório  
			          if(!file_exists("fotos")):  
			               mkdir("fotos");  
			          endif;  
			  
			          // Monta o caminho de destino com o nome do arquivo  
			          $nome_foto = date('dmY') . '_' . $_FILES['foto']['name'];  
			            
			          // Essa função move_uploaded_file() copia e verifica se o arquivo enviado foi copiado com sucesso para o destino  
			          if (!move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/'.$nome_foto)):  
			               echo "Houve um erro ao gravar arquivo na pasta de destino!";  
			          endif; 
					endif;   
			 else:
			 	$nome_foto = $foto_atual;
			endif;
			$sql = 'UPDATE tab_cursos SET nomeCurso=:nomeCurso, nomeArtista=:nomeArtista, razaoParceiro=:razaoParceiro, inicio=:inicio, fim=:fim, total=:total, status=:status, foto=:foto WHERE idCurso = :idCurso';
			//$sql .= 'WHERE idCurso = :idCurso';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':nomeCurso', $nomeCurso);
			$stm->bindValue(':nomeArtista', $nomeArtista);
			$stm->bindValue(':razaoParceiro', $razaoParceiro);
			$stm->bindValue(':inicio', $inicio);
			$stm->bindValue(':fim', $fim);
			$stm->bindValue(':total', $total);
			$stm->bindValue(':status', $status);
			$stm->bindValue(':foto', $nome_foto);
			$stm->bindValue(':idCurso', $idCurso);
			$retorno = $stm->execute();
			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro editado com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao editar registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=cadastro_curso.php'>";
	
	    endif;  
	
		// Verifica se foi solicitada a exclusão dos dados
		
		
		
		if ($acao == 'excluir'):
			// Captura o nome da foto para excluir da pasta
			$sql = "SELECT foto FROM tab_cursos WHERE idCurso = :idCurso AND foto <> 'padrao.jpg'";
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':foto', $foto);
			$stm->execute();
			$geral = $stm->fetch(PDO::FETCH_OBJ);

			if (!empty($geral) && file_exists('fotos/'.$geral->foto)):
				unlink("fotos/" . $geral->foto);
			endif;

			// Exclui o registro do banco de dados
			$sql = 'DELETE FROM tab_cursos WHERE idCurso = :idCurso';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':idCurso', $idCurso);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao excluir registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;	
		
?>	</div>
</body>
</html>