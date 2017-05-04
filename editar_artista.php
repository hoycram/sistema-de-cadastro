<?php
require 'conexao.php';
// Recebe o idProfessor do geral do geral via GET
$idProfessor = (isset($_GET['idProfessor'])) ? $_GET['idProfessor'] : '';
// Valida se existe um idProfessor e se ele é numérico
if (!empty($idProfessor) && is_numeric($idProfessor)):
   // Captura os dados do geral solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT idProfessor, nome, nomeartistico, endereco, rg, cpf, cnpj, data_nascimento, email, telefone, celular, categoria, status, foto FROM tab_professor WHERE idProfessor = :idProfessor';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':idProfessor', $idProfessor);
	$stm->execute();
	$geral = $stm->fetch(PDO::FETCH_OBJ);
	if(!empty($geral)):
		// Formata a data no formato nacional
		$array_data_nascimento = explode('-', $geral->data_nascimento);
		$data_formatadas = $array_data_nascimento[2] . '/' . $array_data_nascimento[1] . '/' . $array_data_nascimento[0];
	endif;
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
				<form action="cadastrar_professor.php" method="post" id='form-contato' enctype='multipart/form-data'>
					<div class="row">
						<label for="nome">Alterar Foto</label>
				      	<div class="col-md-2">
						    <a href="#" class="thumbnail">
						      <img src="fotos/<?=$geral->foto?>" height="190" width="150" idProfessor="foto-geral">
						    </a>
					  	</div>
					  	<input type="file" name="foto" id="foto" value="foto" >
				  	</div>

				    <div class="form-group">
				      <label for="nome">nome</label>
				      <input type="text" class="form-control" id="nome" name="nome" value="<?=$geral->nome?>">
				      <span class='msg-erro msg-nome'></span>
				    </div>
 
     <div class="form-group">
				      <label for="nomeartistico">Artistico</label>
				      <input type="text" class="form-control" id="nomeartistico" name="nomeartistico" value="<?=$geral->nomeartistico?>">
				      <span class='msg-erro msg-nomeartistico'></span>
				    </div>
 
<div class="form-group">
				      <label for="endereco">Endereço</label>
				      <input type="text" class="form-control" id="endereco" name="endereco" value="<?=$geral->endereco?>">
				      <span class='msg-erro msg-endereco'></span>
				    </div>
					
					
					 <div class="form-group">
				      <label for="rg">RG</label>
				      <input type="rg" class="form-control" id="rg" name="rg" value="<?=$geral->rg?>">
				      <span class='msg-erro msg-rg'></span>
				    </div>
					
					 <div class="form-group">
				      <label for="cpf">CPF</label>
				      <input type="cpf" class="form-control" id="cpf" name="cpf" value="<?=$geral->cpf?>">
				      <span class='msg-erro msg-cpf'></span>
				    </div>
					
					
					 <div class="form-group">
				      <label for="cnpj">cnpj</label>
				      <input type="cnpj" class="form-control" id="cnpj" name="cnpj" value="<?=$geral->cnpj?>">
				      <span class='msg-erro msg-cnpj'></span>
				    </div>
					
					
					 <div class="form-group">
				      <label for="data_nascimento">Data de Nascimento</label>
				      <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="<?=$geral->data_nascimento?>">
				      <span class='msg-erro msg-data_nascimento'></span>
				    </div>
					
					
					 <div class="form-group">
				      <label for="email">E-mail</label>
				      <input type="email" class="form-control" id="email" name="email" value="<?=$geral->email?>">
				      <span class='msg-erro msg-email'></span>
				    </div>
					
					
					 <div class="form-group">
				      <label for="telefone">Telefone</label>
				      <input type="telefone" class="form-control" id="telefone" name="telefone" value="<?=$geral->telefone?>">
				      <span class='msg-erro msg-telefone'></span>
				    </div>

					<div class="form-group">
				      <label for="celular">Celular</label>
				      <input type="celular" class="form-control" id="celular" name="celular" value="<?=$geral->celular?>">
				      <span class='msg-erro msg-celular'></span>
				    </div>
									
 <div class="form-group">
			      <label for="categoria">Categória</label>
			      <select class="form-control" name="categoria" id="categoria">
			    <option value="Contra Partida">Contra Partida</option>
			    <option value="Arte Educador">Arte Educador</option>
				  </select>
				  <span class='msg-erro msg-contra'></span>
			    </div>
				
</select>
				    <div class="form-group">
				      <label for="status">Status</label>
				      <select class="form-control" name="status" idProfessor="status">
					   
					    <option value="Ativo">Ativo</option>
					    <option value="Inativo">Inativo</option>
					  </select>
					  <span class='msg-erro msg-status'></span>
				    </div>

				    <input type="hidden" name="acao" value="editar">
				    <input type="hidden" name="idProfessor" value="<?=$geral->idProfessor?>">
				    <input type="hidden" name="foto_atual" value="<?=$geral->foto?>">
					
					
				    <button type="submit" class="btn btn-primary" idProfessor='botao'> 
				      Gravar
				    </button>
				    <a href='cadastro_artista.php' class="btn btn-danger">Cancelar</a>
				</form>
			<?php endif; ?>
		</fieldset>

	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>