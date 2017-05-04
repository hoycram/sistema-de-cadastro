<?php
require 'conexao.php';
// Recebe o idAluno do geral do geral via GET
$idAluno = (isset($_GET['idAluno'])) ? $_GET['idAluno'] : '';
// Valida se existe um idAluno e se ele é numérico
if (!empty($idAluno) && is_numeric($idAluno)):
   // Captura os dados do geral solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT  idAluno, nomeAluno, sexoAluno, data_Aluno, enderecoAluno, rgAluno,  cpfAluno, estadoCivil, qtdeFilhos,idadeFilhos, telAluno, celAluno, emailAluno,cursoAluno,  local_insc, status, foto FROM tab_alunos WHERE idAluno = :idAluno';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':idAluno', $idAluno);
	$stm->execute();
	$geral = $stm->fetch(PDO::FETCH_OBJ);
	
endif;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Editar o Artista</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container'>
		<fieldset>
			<legend><h1>Formulário - Editar o Artista</h1></legend>
			
			<?php if(empty($geral)):?>
				<h3 class="text-center text-danger">Artista não encontrado!</h3>
			<?php else: ?>
				<form action="cadastrar_aluno.php" method="post" id='form-contato' enctype='multipart/form-data'>
					<div class="row">
						<label for="fotos">Alterar Foto</label>
				      	<div class="col-md-2">
						    <a href="#" class="thumbnail">
						      <img src="fotos/<?=$geral->foto?>" height="190" width="150" id="foto-geral">
						    </a>
					  	</div>
					  	<input type="file" name="foto" id="foto" value="foto" >
				  	</div>

				    <div class="form-group">
				      <label for="nomeAluno">Nome completo</label>
				      <input type="text" class="form-control" id="nomeAluno" name="nomeAluno" value="<?=$geral->nomeAluno?>">
				      <span class='msg-erro msg-nomeAluno'></span>
				    </div>
 
     <div class="form-group">
				      <label for="sexoAluno">Sexo</label>
				      <input type="text" class="form-control" id="sexoAluno" name="sexoAluno" value="<?=$geral->sexoAluno?>">
				      <span class='msg-erro msg-sexoAluno'></span>
				    </div>
 
<div class="form-group">
				      <label for="data_Aluno">Data de Nascimento</label>
				      <input type="text" class="form-control" id="data_Aluno" name="data_Aluno" value="<?=$geral->data_Aluno?>">
				      <span class='msg-erro msg-data_Aluno'></span>
				    </div>
					
					
					 <div class="form-group">
				      <label for="enderecoAluno">Endereço completo</label>
				      <input type="endereco" class="form-control" id="enderecoAluno" name="enderecoAluno" value="<?=$geral->enderecoAluno?>">
				      <span class='msg-erro msg-enderecoAluno'></span>
				    </div>
					
						
					 <div class="form-group">
				      <label for="rgAluno">RG</label>
				      <input type="text" class="form-control" id="rgAluno" name="rgAluno" value="<?=$geral->rgAluno?>">
				      <span class='msg-erro msg-rgAluno'></span>
				    </div>
					
					
					 <div class="form-group">
				      <label for="cpfAluno">CPF</label>
				      <input type="text" class="form-control" id="cpfAluno" name="cpfAluno" value="<?=$geral->cpfAluno?>">
				      <span class='msg-erro msg-cpfAluno'></span>
				    </div>
					
					 <div class="form-group">
				      <label for="estadoCivil">Estado Civil</label>
				      <input type="text" class="form-control" id="estadoCivil" name="estadoCivil" value="<?=$geral->estadoCivil?>">
				      <span class='msg-erro msg-estadoCivil'></span>
				    </div>
					
					
					<div class="form-group">
				      <label for="qtdeFilhos">Qtd. de Filhos</label>
				      <input type="qtdeFilhos" class="form-control" id="qtdeFilhos" name="qtdeFilhos" value="<?=$geral->qtdeFilhos?>">
				      <span class='msg-erro msg-qtdeFilhos'></span>
				    </div>
					
<div class="form-group">

				      <label for="idadeFilhos">Idade dos Filhos</label>
						<input type="text" class="form-control" id="idadeFilhos" name="idadeFilhos" value="<?=$geral->idadeFilhos?>">
				      <span class='msg-erro msg-idadeFilhos'></span>
</div>
					
						
					 <div class="form-group">
				      <label for="telAluno">Telefone</label>
				      <input type="text" class="form-control" id="telAluno" name="telAluno" value="<?=$geral->telAluno?>">
				      <span class='msg-erro msg-telAluno'></span>
				    </div>
						
					 <div class="form-group">
				      <label for="celAluno">Celular</label>
				      <input type="text" class="form-control" id="celAluno" name="celAluno" value="<?=$geral->celAluno?>">
				      <span class='msg-erro msg-celAluno'></span>
				    </div>
					
						
					 <div class="form-group">
				      <label for="emailAluno">E-mail</label>
				      <input type="text" class="form-control" id="emailAluno" name="emailAluno" value="<?=$geral->emailAluno?>">
				      <span class='msg-erro msg-emailAluno'></span>
				    </div>
					
					 <div class="form-group">
			      <label for="cursoAluno">Curso</label>
				  <select class="form-control" name="cursoAluno" id="cursoAluno">

					
					<?php
require_once 'conexao.php';
$odb=new PDO('mysql:host=sistemas.fundacaostickel.org;dbname=sistemas', 'stickel', 'alm#2017');
$query = "select idCurso, nomeCurso from tab_cursos";
    $data = $odb->prepare($query);   
    $data->execute();
    while($row=$data->fetch(PDO::FETCH_ASSOC)){
	echo '<option value="'.$row['nomeCurso'].'">'.$row['nomeCurso'].'</option>';
	
    }
?>
</select>
				  <span class='msg-erro msg-nomeArtista'></span>
			    </div>
				
				<div class="form-group">
			      <label for="local_insc">Local da Inscrição</label>
			      <select class="form-control" name="local_insc" id="local_insc">
				  
				 
				    <option value="Site">Site</option>
				    <option value="local da oficina">local da oficina</option>
				  </select>
				  <span class='msg-erro msg-local_insc'></span>
		</div>
				
					
								
				    <div class="form-group">
				      <label for="status">Status</label>
				      <select class="form-control" name="status" id="status">
					   
					    <option value="Ativo">Ativo</option>
					    <option value="Inativo">Inativo</option>
					  </select>
					  <span class='msg-erro msg-status'></span>
				    </div>

				    <input type="hidden" name="acao" value="editar">
				    <input type="hidden" name="idAluno" value="<?=$geral->idAluno?>">
				    <input type="hidden" name="foto_atual" value="<?=$geral->foto?>">
					
					
				    <button type="submit" class="btn btn-primary" idAluno='botao'> 
				      Gravar
				    </button>
				    <a href='cadastro_aluno.php' class="btn btn-danger">Cancelar</a>
				</form>
			<?php endif; ?>
		</fieldset>

	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>