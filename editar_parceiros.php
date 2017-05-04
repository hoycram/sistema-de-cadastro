<?php
require 'conexao.php';
// Recebe o id do geral do geral via GET
$id = (isset($_GET['id'])) ? $_GET['id'] : '';
// Valida se existe um id e se ele é numérico
if (!empty($id) && is_numeric($id)):
   // Captura os dados do geral solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, nome, cnpj, endereco, telefone, email, responsavel, cargo,   celular, emailcontato, status, foto FROM tab_parceiros WHERE id = :id';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id', $id);
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
				<form action="cadastrar_parceiro.php" method="post" id='form-contato' enctype='multipart/form-data'>
					<div class="row">
						<label for="nome">Alterar Foto</label>
				      	<div class="col-md-2">
						    <a href="#" class="thumbnail">
						      <img src="fotos/<?=$geral->foto?>" height="190" width="150" id="foto-geral">
						    </a>
					  	</div>
					  	<input type="file" name="foto" id="foto" value="foto" >
				  	</div>

				    <div class="form-group">
				      <label for="nome">Nome</label>
				      <input type="text" class="form-control" id="nome" name="nome" value="<?=$geral->nome?>">
				      <span class='msg-erro msg-nome'></span>
				    </div>
 
     <div class="form-group">
				      <label for="cnpj">CNPJ</label>
				      <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?=$geral->cnpj?>">
				      <span class='msg-erro msg-cnpj'></span>
				    </div>
 
<div class="form-group">
				      <label for="endereco">Endereço</label>
				      <input type="text" class="form-control" id="endereco" name="endereco" value="<?=$geral->endereco?>">
				      <span class='msg-erro msg-endereco'></span>
				    </div>
					
					
					 <div class="form-group">
				      <label for="telefone">Telefone</label>
				      <input type="telefone" class="form-control" id="telefone" name="telefone" value="<?=$geral->telefone?>">
				      <span class='msg-erro msg-telefone'></span>
				    </div>
					
						
					 <div class="form-group">
				      <label for="email">E-mail</label>
				      <input type="email" class="form-control" id="email" name="email" value="<?=$geral->email?>">
				      <span class='msg-erro msg-email'></span>
				    </div>
					
					
					 <div class="form-group">
				      <label for="responsavel">Responsável</label>
				      <input type="responsavel" class="form-control" id="responsavel" name="responsavel" value="<?=$geral->responsavel?>">
				      <span class='msg-erro msg-responsavel'></span>
				    </div>
					
					 <div class="form-group">
				      <label for="cargo">Cargo</label>
				      <input type="cargo" class="form-control" id="cargo" name="cargo" value="<?=$geral->cargo?>">
				      <span class='msg-erro msg-cargo'></span>
				    </div>
					
					
					<div class="form-group">
				      <label for="celular">Celular</label>
				      <input type="celular" class="form-control" id="celular" name="celular" value="<?=$geral->celular?>">
				      <span class='msg-erro msg-celular'></span>
				    </div>
					
					 <div class="form-group">
				      <label for="emailcontato">E-mail do Contato</label>
				      <input type="text" class="form-control" id="emailcontato" name="emailcontato" value="<?=$geral->emailcontato?>">
				      <span class='msg-erro msg-emailcontato'></span>
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
				    <input type="hidden" name="id" value="<?=$geral->id?>">
				    <input type="hidden" name="foto_atual" value="<?=$geral->foto?>">
					
					
				    <button type="submit" class="btn btn-primary" id='botao'> 
				      Gravar
				    </button>
				    <a href='cadastro_parceiro.php' class="btn btn-danger">Cancelar</a>
				</form>
			<?php endif; ?>
		</fieldset>

	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>