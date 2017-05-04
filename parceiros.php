<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Cadastro de parceiros</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container'>
		<fieldset>
			<legend><h1>Formulário - Cadastro do Parceiro</h1></legend>
			
			<form action="cadastrar_parceiro.php" method="post" id='form-contato' enctype='multipart/form-data'>
				<div class="row">
					<label for="nome">Selecionar Logo</label>
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
			      <label for="nome">Razão Social</label>
			      <input type="text" class="form-control" id="nome" name="nome" placeholder="Razão Social do Parceiro">
			      <span class='msg-erro msg-nome'></span>
			    </div>
				
				
				 <div class="form-group">
			      <label for="cnpj">CNPJ</label>
			      <input type="text" class="form-control" id="cnpj"  maxlength="18" name="cnpj" placeholder="Infome o CNPJ">
			      <span class='msg-erro msg-cnpj'></span>
			    </div>
				
				
				  <div class="form-group">
			      <label for="endereco">Endereço completo</label>
			      <input type="endereco" class="form-control" id="endereco" name="endereco" placeholder="Informe o endereço completo">
			      <span class='msg-erro msg-endereco'></span>
			    </div>
				
				<div class="form-group">
			      <label for="telefone">Telefone</label>
			      <input type="telefone" class="form-control" id="telefone" maxlength="12" name="telefone" placeholder="Informe o Telefone">
			      <span class='msg-erro msg-telefone'></span>
			    </div>
				
				
				  <div class="form-group">
			      <label for="email">E-mail</label>
			      <input type="email" class="form-control" id="email" name="email" placeholder="Informe o E-mail">
			      <span class='msg-erro msg-email'></span>
			    </div>
				
				
				  <div class="form-group">
			      <label for="responsavel">Pessoal responsável</label>
			      <input type="text" class="form-control" id="responsavel" name="responsavel" placeholder="Informe a Pessoal responsável">
			      <span class='msg-erro msg-responsavel'></span>
			    </div>
				
			    <div class="form-group">
			      <label for="cargo">Cargo</label>
			      <input type="text" class="form-control" id="cargo"  name="cargo" placeholder="Informe o cargo">
			      <span class='msg-erro msg-cargo'></span>
			    </div>	
				
				   <div class="form-group">
			      <label for="celular">Contato</label>
			      <input type="text" class="form-control" id="celular" maxlength="13" name="celular" placeholder="Informe o Celular">
			      <span class='msg-erro msg-celular'></span>
			    </div>
				
				<div class="form-group">
			      <label for="emailcontato">E-mail</label>
			      <input type="text" class="form-control" id="emailcontato"  name="emailcontato" placeholder="Informe o E-mail do responsavel">
			      <span class='msg-erro msg-cnpj'></span>
			    </div>	
				
			    <div class="form-group">
			      <label for="status">Status</label>
			      <select class="form-control" name="status" id="status">
				    <option value="">Selecione o Status</option>
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