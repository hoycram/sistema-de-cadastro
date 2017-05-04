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
		$idAluno    = (isset($_POST['idAluno'])) ? $_POST['idAluno'] : '';
		$nomeAluno  = (isset($_POST['nomeAluno'])) ? $_POST['nomeAluno'] : '';
		$sexoAluno  = (isset($_POST['sexoAluno'])) ? $_POST['sexoAluno'] : '';
		$data_Aluno  = (isset($_POST['data_Aluno'])) ? $_POST['data_Aluno'] : '';
		$enderecoAluno  = (isset($_POST['enderecoAluno'])) ? $_POST['enderecoAluno'] : '';
		$rgAluno  = (isset($_POST['rgAluno'])) ? $_POST['rgAluno'] : '';
		$cpfAluno  = (isset($_POST['cpfAluno'])) ? $_POST['cpfAluno'] : '';
		$estadoCivil  = (isset($_POST['estadoCivil'])) ? $_POST['estadoCivil'] : '';
		$qtdeFilhos  = (isset($_POST['qtdeFilhos'])) ? $_POST['qtdeFilhos'] : '';
		$idadeFilhos  = (isset($_POST['idadeFilhos'])) ? $_POST['idadeFilhos'] : '';
		$telAluno  = (isset($_POST['telAluno'])) ? $_POST['telAluno'] : '';
		$celAluno  = (isset($_POST['celAluno'])) ? $_POST['celAluno'] : '';
		$emailAluno  = (isset($_POST['emailAluno'])) ? $_POST['emailAluno'] : '';
		$cursoAluno  = (isset($_POST['cursoAluno'])) ? $_POST['cursoAluno'] : '';
		$local_insc  = (isset($_POST['local_insc'])) ? $_POST['local_insc'] : '';
		$foto_atual = (isset($_POST['foto_atual'])) ? $_POST['foto_atual'] : '';
		$status = (isset($_POST['status'])) ? $_POST['status'] : '';

	
// Valida os dados recebidos
		$mensagem = '';
		if ($acao == 'editar' && $idAluno == ''):
		    $mensagem .= '<li>ID do registros desconhecido.</li>';
	    endif;

	    // Se for ação diferente de excluir valida os dados obrigatórios
	    if ($acao != 'excluir'):
			if ($nomeAluno == '' || strlen($nomeAluno) < 3):
				$mensagem .= '<li>Favor preencher o Nome completo.</li>';
		    endif;
	
	
			if ($sexoAluno == '' || strlen($sexoAluno) < 3):
				$mensagem .= '<li>Favor preencher qual o sexo.</li>';
		    endif;

			
				if ($data_Aluno == '' || strlen($data_Aluno) < 3):
				$mensagem .= '<li>Favor preencher a data de nascimento.</li>';
		    endif;
			
			
				if ($emailAluno == '' || strlen($emailAluno) < 3):
				$mensagem .= '<li>Favor preencher o E-mail.</li>';
		    endif;
			
			
				if ($telAluno == '' || strlen($telAluno) < 3):
				$mensagem .= '<li>Favor preencher o Telefone.</li>';
		    endif;
			
			if ($local_insc == '' || strlen($local_insc) < 0):
				$mensagem .= '<li>Favor preencher o local de inscrição.</li>';
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
	
	
	$sql = 'INSERT INTO tab_alunos (nomeAluno, sexoAluno, data_Aluno, enderecoAluno, rgAluno, cpfAluno, estadoCivil, qtdeFilhos, idadeFilhos, telAluno, celAluno, emailAluno, cursoAluno, local_insc, status, foto)  VALUES(:nomeAluno, :sexoAluno, :data_Aluno, :enderecoAluno, :rgAluno, :cpfAluno, :estadoCivil, :qtdeFilhos, :idadeFilhos, :telAluno, :celAluno, :emailAluno, :cursoAluno, :local_insc, :status, :foto)';

			$stm = $conexao->prepare($sql);
			$stm->bindValue(':nomeAluno', $nomeAluno);
			$stm->bindValue(':sexoAluno', $sexoAluno);
			$stm->bindValue(':data_Aluno', $data_Aluno);
			$stm->bindValue(':enderecoAluno', $enderecoAluno);
			$stm->bindValue(':rgAluno', $rgAluno);
			$stm->bindValue(':cpfAluno', $cpfAluno);
			$stm->bindValue(':estadoCivil', $estadoCivil);
			$stm->bindValue(':qtdeFilhos', $qtdeFilhos);
			$stm->bindValue(':idadeFilhos', $idadeFilhos);
			$stm->bindValue(':telAluno', $telAluno);
			$stm->bindValue(':celAluno', $celAluno);
			$stm->bindValue(':emailAluno', $emailAluno);
			$stm->bindValue(':cursoAluno', $cursoAluno);
			$stm->bindValue(':local_insc', $local_insc);
			$stm->bindValue(':status', $status);
			$stm->bindValue(':foto', $nome_foto);
			$retorno = $stm->execute();
			if ($retorno):
			echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;
			echo "<meta http-equiv=refresh content='3;URL=cadastro_aluno.php'>";
			
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

			$sql = 'UPDATE tab_alunos SET nomeAluno=:nomeAluno, sexoAluno=:sexoAluno, data_Aluno=:data_Aluno, enderecoAluno=:enderecoAluno, rgAluno=:rgAluno, cpfAluno=:cpfAluno,estadoCivil=:estadoCivil, qtdeFilhos=:qtdeFilhos, idadeFilhos=:idadeFilhos, telAluno=:telAluno, celAluno=:celAluno,  emailAluno=:emailAluno,   cursoAluno=:cursoAluno,   local_insc=:local_insc,   status=:status, foto=:foto WHERE idAluno = :idAluno';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':nomeAluno', $nomeAluno);
			$stm->bindValue(':sexoAluno', $sexoAluno);
			$stm->bindValue(':data_Aluno', $data_Aluno);
			$stm->bindValue(':enderecoAluno', $enderecoAluno);
			$stm->bindValue(':rgAluno', $rgAluno);
			$stm->bindValue(':cpfAluno', $cpfAluno);
			$stm->bindValue(':estadoCivil', $estadoCivil);
			$stm->bindValue(':qtdeFilhos', $qtdeFilhos);
			$stm->bindValue(':idadeFilhos', $idadeFilhos);
			$stm->bindValue(':telAluno', $telAluno);
			$stm->bindValue(':celAluno', $celAluno);
			$stm->bindValue(':emailAluno', $emailAluno);
			$stm->bindValue(':cursoAluno', $cursoAluno);
			$stm->bindValue(':local_insc', $local_insc);
			$stm->bindValue(':status', $status);
			$stm->bindValue(':foto', $nome_foto);
			$stm->bindValue(':idAluno', $idAluno);
		
		$retorno = $stm->execute();

			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro editado com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao editar registro!</div> ";
			endif;

			echo "<meta http-equiv=refresh content='3;URL=cadastro_aluno.php'>";
		endif;

		// Verifica se foi solicitada a exclusão dos dados
		
if ($acao == 'excluir'):
	// Captura o nome da foto para excluir da pasta
	
	$sql = "SELECT foto FROM tab_alunos WHERE idAluno=:idAluno AND foto <> 'padrao.jpg'";
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':idAluno', $idAluno);
			$stm->execute();
			$geral = $stm->fetch(PDO::FETCH_OBJ);
			if (!empty($geral) && file_exists('fotos/'.$geral->foto)):
			unlink("fotos/" . $geral->foto);
			endif;

			// Exclui o registro do banco de dados
			$sql = 'DELETE  foto FROM tab_alunos WHERE idAluno = :idAluno';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':idAluno', $idAluno);
			$retorno = $stm->execute();
			if ($retorno):
			echo "<div class='alert alert-success' role='alert'>Registro excluído com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    echo "<div class='alert alert-danger' role='alert'>Erro ao excluir registro!</div> ";
			endif;
			echo "<meta http-equiv=refresh content='3;URL=index.php'>";
endif;
		?>
		
	</div>
</body>
</html>