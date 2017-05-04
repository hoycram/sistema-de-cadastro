<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Cadastro de Cliente</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container'>
		<fieldset>
			<legend><h1>Formulário - Cadastro do Artista</h1></legend>
			
			<form action="cadastrar_professor.php" method="post" id='form-contato' enctype='multipart/form-data'>
				<div class="row">
					<label for="nome">Selecionar Foto</label>
			      	<div class="col-md-2">
					    <a href="#" class="thumbnail">
					      <img src="fotos/padrao.jpg" height="190" width="150" id="foto-cliente">
					    </a>
				  	</div>
					 <div class="form-group">
				  	<input type="file" name="foto" id="foto" value="foto" >
					</div>
			  	</div>
				<br>
			    <div class="form-group">
			      <label for="nome">Nome Completo</label>
			      <input type="text" class="form-control" id="nome" name="nome" placeholder="Infome o Nome">
			      <span class='msg-erro msg-nome'></span>
			    </div>
				
				
				 <div class="form-group">
			      <label for="nomeartistico">Nome Artistico</label>
			      <input type="text" class="form-control" id="nomeartistico" name="nomeartistico" placeholder="Infome o nome artistico">
			      <span class='msg-erro msg-nome'></span>
			    </div>
				
				
				  <div class="form-group">
			      <label for="endereco">Endereço completo</label>
			      <input type="endereco" class="form-control" id="endereco" name="endereco" placeholder="Informe o endereço completo">
			      <span class='msg-erro msg-endereco'></span>
			    </div>
				
				  <div class="form-group">
			      <label for="rg">RG</label>
			      <input type="rg" class="form-control" id="rg" maxlength="13" name="rg" placeholder="Informe o RG">
			      <span class='msg-erro msg-rg'></span>
			    </div>
				
			    <div class="form-group">
			      <label for="cpf">CPF</label>
			      <input type="cpf" class="form-control" id="cpf" maxlength="14" name="cpf" placeholder="Informe o CPF">
			      <span class='msg-erro msg-cpf'></span>
			    </div>	
				
				  <div class="form-group">
			      <label for="cnpj">CNPJ</label>
			      <input type="cnpj" class="form-control" id="cnpj" maxlength="19" name="cnpj" placeholder="Informe o CNPJ">
			      <span class='msg-erro msg-cnpj'></span>
			    </div>	
				
								
			    <div class="form-group">
			      <label for="data_nascimento">Data de Nascimento</label>
			      <input type="date" class="form-control" id="data_nascimento" maxlength="10" name="data_nascimento">
			      <span class='msg-erro msg-data'></span>
			    </div>
				
				   <div class="form-group">
			      <label for="email">E-mail</label>
			      <input type="email" class="form-control" id="email" name="email" placeholder="Informe o E-mail">
			      <span class='msg-erro msg-email'></span>
			    </div>
								
			    <div class="form-group">
			      <label for="telefone">Telefone</label>
			      <input type="telefone" class="form-control" id="telefone" maxlength="12" name="telefone" placeholder="Informe o Telefone">
			      <span class='msg-erro msg-telefone'></span>
			    </div>
				
			    <div class="form-group">
			      <label for="celular">Celular</label>
			      <input type="celular" class="form-control" id="celular" maxlength="13" name="celular" placeholder="Informe o Celular">
			      <span class='msg-erro msg-celular'></span>
			    </div>
								 
				 <div class="form-group">
			      <label for="categoria">Categória</label>
			      <select class="form-control" name="categoria" id="categoria">
				  
				    <option value="">Selecione a categória do projeto</option>
				    <option value="Contra Partida">Contra Partida</option>
				    <option value="Arte Educador">Arte Educador</option>
				  </select>
				  <span class='msg-erro msg-contra'></span>
			    </div>
				
			   <div class="form-group">
			      <label for="status">Status</label>
			      <select class="form-control" name="status" id="status">
				    <option value="Ativo">Ativo</option>
				    <option value="Inativo">Inativo</option>
				  </select>
				  <span class='msg-erro msg-status'></span>
			    </div>

			    <input type="hidden" name="acao" value="incluir">
			    <button type="submit" class="btn btn-primary" id='botao'> 
			      Gravar
			    </button>
			    <a href='index.php' class="btn btn-danger">Cancelar</a>
			</form>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>