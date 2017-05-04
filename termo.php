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
			<legend><h1>Formulário - Cadastro dos Termos</h1></legend>
			
			<form action="cadastrar_termos.php" method="post" id='form-contato' enctype='multipart/form-data'>
				<div class="row">
					<label for="nome">Adicione o Termo </label>
			      	<div class="col-md-2">
					    <a href="#" class="thumbnail">
					   <img src="fotos/pdf.png" height="190" width="150" id="foto-cliente">
					    </a>
				  	</div>
					 <div class="form-group">
				  	<input type="file" name="foto" id="foto" value="foto" >
					</div>
										 
			  	</div>
				<br>
			     <div class="form-group">
			      <label for="nomeartistico">Nome do Artista</label>
				  <select class="form-control" name="nomeartistico" id="nomeartistico">
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
			      <label for="razaoParceiro">Parceiro citado no Termo</label>
			      <select class="form-control" name="parceiro" id="parceiro">
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
		
	<br>	
		
 <div class="form-group">
			      <label for="curso">Curso citado no Termo</label>

			      <select class="form-control" name="curso" id="curso">
				 <option value="">Selecione o Curso</option>
				 
<?php
require_once 'conexao.php';
$odb = new PDO('mysql:host=sistemas.fundacaostickel.org;dbname=sistemas', 'stickel', 'alm#2017');
$query = "select idCurso, nomeCurso from tab_cursos";
    $data = $odb->prepare($query);   
    $data->execute();
    while($row=$data->fetch(PDO::FETCH_ASSOC)){
	echo '<option value="'.$row['nomeCurso'].'">'.$row['nomeCurso'].'</option>';
	
    }				 
?>			 
 </div>
				  </select>
				  
				  <br>
				  
				<div class="form-group">
			      <label for="dataEntrega">Data da Entrega do Termo</label>
			      <input type="date" class="form-control" id="dataEntrega" name="dataEntrega" >
			      <span class='msg-erro msg-dataEntrega'></span>
			    </div>
								  <br>

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