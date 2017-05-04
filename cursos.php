<?php
require 'conexao.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Cadastro de Cursos</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container'>
		<fieldset>
			<legend><h1>Formulário - Cadastro dos Cursos</h1></legend>
			
			<form action="cadastrar_cursos.php" method="post" id='form-contato' enctype='multipart/form-data'>
				<div class="row">
					<label for="nome">Selecionar Banner do curso</label>
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
			      <label for="nomeCurso">Nome do Curso</label>
			      <input type="text" class="form-control" id="nomeCurso" name="nomeCurso" placeholder="Nome completo do curso">
			      <span class='msg-erro msg-nomecurso'></span>
			    </div>
				
				 <div class="form-group">
			      <label for="nomeartistico">Nome do Artista</label>
				  <select class="form-control" name="nomeArtista" id="nomeArtista">
				    <option value="">Selecione o Artista</option>
					
<?php
require_once 'conexao.php';
$odb = new PDO('mysql:host=sistemas.fundacaostickel.org;dbname=sistemas', 'stickel', 'alm#2017');
$query = "SELECT idProfessor, nomeartistico FROM tab_professor";
    $data = $odb->prepare($query);   
    $data->execute();
    while($row=$data->fetch(PDO::FETCH_ASSOC)){
	echo '<option value="'.$row['nomeartistico'].'">'.$row['nomeartistico'].'</option>';
	
    }
?>
</select>
				  <span class='msg-erro msg-nomeArtista'></span>
			    </div>
				
			 <div class="form-group">
			      <label for="razaoParceiro">Razão Social do Parceiro</label>
			      <select class="form-control" name="razaoParceiro" id="razaoParceiro">
			  <option value="">Selecione o Parceiro</option>
<?php
require_once 'conexao.php';
$odb = new PDO('mysql:host=sistemas.fundacaostickel.org;dbname=sistemas', 'stickel', 'alm#2017');
$query = "select id, nome from tab_parceiros";
    $data = $odb->prepare($query);   
    $data->execute();
    while($row=$data->fetch(PDO::FETCH_ASSOC)){
	echo '<option value="'.$row['nome'].'">'.$row['nome'].'</option>';
	
    }
?> </div>
				  </select>
				  
				<div class="form-group">
			      <label for="inicio">Inicio</label>
			      <input type="date" class="form-control" id="inicio" name="inicio" >
			      <span class='msg-erro msg-inicio'></span>
			    </div>
				
				 <div class="form-group">
			      <label for="fim">Fim</label>
			      <input type="date" class="form-control" id="fim" name="fim">
			      <span class='msg-erro msg-inicio'></span>
			    </div>
				
				
				  <div class="form-group">
			      <label for="total">Total dos encontros</label>
			      <input type="text" class="form-control" id="total" name="total" placeholder="Total das aulas">
			      <span class='msg-erro msg-responsavel'></span>
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