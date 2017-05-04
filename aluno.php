<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Sistema de cadastro</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container'>
		<fieldset>
			<legend><h1>Formulário - Cadastrar o Aluno</h1></legend>
			
			<form action="cadastrar_aluno.php" method="post" id='form-contato' enctype='multipart/form-data'>
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
			      <label for="nomeAluno">Nome Completo</label>
			      <input type="text" class="form-control" id="nomeAluno" name="nomeAluno" placeholder="Infome o nome completo do aluno">
			      <span class='msg-erro msg-nomeAluno'></span>
			    </div>
				
				<div class="form-group">
			      <label for="sexoAluno">Sexo</label>
			      <select class="form-control" name="sexoAluno" id="sexoAluno">
				    <option value="">Selecione o sexo do aluno</option>
				    <option value="feminino">Feminino</option>
				    <option value="masculino">Masculino</option>
				  </select>
				  <span class='msg-erro msg-sexoAluno'></span>
			    </div>
				
			<div class="form-group">
			      <label for="data_Aluno">Data de Nascimento</label>
			      <input type="date" class="form-control" id="data_Aluno" maxlength="10" name="data_Aluno">
			      <span class='msg-erro msg-data'></span>
			    </div>
				
				<div class="form-group">
			      <label for="enderecoAluno">Endereço Completo</label>
			      <input type="text" class="form-control" id="enderecoAluno" name="enderecoAluno" placeholder="Infome o endereço completo">
			      <span class='msg-erro msg-nome'></span>
			    </div>
				
								
				  <div class="form-group">
			      <label for="rgAluno">RG</label>
			      <input type="rgAluno" class="form-control" id="rg" maxlength="13" name="rgAluno" placeholder="Informe o RG com pontos e traços">
			      <span class='msg-erro msg-rgAluno'></span>
			    </div>
				
			    <div class="form-group">
			      <label for="cpfAluno">CPF</label>
			      <input type="cpf" class="form-control" id="cpfAluno" maxlength="14" name="cpfAluno" placeholder="Informe o CPF com pontos e traços">
			      <span class='msg-erro msg-cpf'></span>
			    </div>	
				
				
				<div class="form-group">
			      <label for="estadoCivil">Estado Civil</label>
			      <select class="form-control" name="estadoCivil" id="estadoCivil">
				  
				    <option value="">Selecione o estado civil</option>
				    <option value="Solteiro(a)">Solteiro(a)</option>
				    <option value="Casado(a)">Casado(a)</option>
					 <option value="Separado(a)">Separado(a)</option>
					  <option value="Divorciado(a)">Divorciado(a)</option>
					  <option value="Viúvo(a)">Viúvo(a)</option>

				  </select>
				  <span class='msg-erro msg-estadoCivil'></span>
			    </div>
				
				
				
				  <div class="form-group">
			      <label for="qtdeFilhos">Qtde. Filhos</label>
			      <input type="text" class="form-control" id="qtdeFilhos"  name="qtdeFilhos" placeholder="Informe a quantidade de filhos menor de 14 anos">
			      <span class='msg-erro msg-idadeFilhos'></span>
			    </div>	
				
								
			   
				
				   <div class="form-group">
			      <label for="idadeFilhos">Idade dos filhos</label>
			      <input type="text" class="form-control" id="idadeFilhos"  name="idadeFilhos" placeholder="Informe a idade">
			      <span class='msg-erro msg-idadeFilhos'></span>
			    </div>
								
			    <div class="form-group">
			      <label for="telAluno">Telefone</label>
			      <input type="telefone" class="form-control" id="telAluno" maxlength="12" name="telAluno" placeholder="Informe o Telefone">
			      <span class='msg-erro msg-telefone'></span>
			    </div>
				
			    <div class="form-group">
			      <label for="celular">Celular</label>
			      <input type="celular" class="form-control" id="celAluno" maxlength="13" name="celAluno" placeholder="Informe o Celular">
			      <span class='msg-erro msg-celular'></span>
			    </div>
							

 <div class="form-group">
			      <label for="emailAluno">E-mail</label>
			      <input type="text" class="form-control" id="emailAluno"  name="emailAluno" placeholder="Informe o E-mail">
			      <span class='msg-erro msg-emailAluno'></span>
			    </div>
			
			 <div class="form-group">
			      <label for="cursoAluno">Curso</label>
			      <select class="form-control" name="cursoAluno" id="cursoAluno">
				  <option value="Em seleção">Em seleção</option>
					<option value="Não selecionado">Não selecionado</option>
				  <?php
require_once 'conexao.php';
$odb = new PDO('mysql:host=sistemas.fundacaostickel.org;dbname=sistemas', 'stickel', 'alm#2017');
$query = "select idCurso, nomeCurso from tab_cursos";
    $data = $odb->prepare($query);   
    $data->execute();
    while($row=$data->fetch(PDO::FETCH_ASSOC)){
	echo '<option value="'.$row['idCurso'].'">'.$row['nomeCurso'].'</option>';
	
    }
?>
				  
				  </select>
				  <span class='msg-erro msg-contra'></span>
			    </div>
	 <div class="form-group">
			      <label for="local_insc">Local da Inscrição</label>
			      <select class="form-control" name="local_insc" id="local_insc">
				  
				    <option value="">Selecione o local de inscrição</option>
				    <option value="Site">Site</option>
				    <option value="local da oficina">local da oficina</option>
				  </select>
				  <span class='msg-erro msg-local_insc'></span>
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