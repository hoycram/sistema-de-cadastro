<?php
require 'conexao.php';

// Recebe o id do geral do geral via GET
$idCurso = (isset($_GET['idCurso'])) ? $_GET['idCurso'] : '';

// Valida se existe um id e se ele é numérico
if (!empty($idCurso) && is_numeric($idCurso)):
   // Captura os dados do geral solicitado
	$conexao = conexao::getInstance();
	$sql = 'SELECT idCurso, nomeCurso, nomeArtista, razaoParceiro, inicio, fim, total, status, foto FROM tab_cursos WHERE idCurso = :idCurso';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':idCurso', $idCurso);
	$stm->execute();
	$geral = $stm->fetch(PDO::FETCH_OBJ);

	if(!empty($geral)):

		// Formata a data no formato nacional
		$array_inicio     = explode('-', $geral->inicio);
		$array_fim    = explode('-', $geral->fim);

		$data_formatadas = $array_inicio[2] . '/' . $array_inicio[1] . '/' . $array_inicio[0];
		$data_formatada = $array_fim[2] . '/' . $array_fim[1] . '/' . $array_fim[0];


	endif;
endif;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Editar o curso</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container'>
		<fieldset>
			<legend><h1>Formulário - Editar o Curso</h1></legend>
			
			<?php if(empty($geral)):?>
				<h3 class="text-center text-danger">Curso não encontrado!</h3>
			<?php else: ?>
				<form action="cadastrar_cursos.php" method="post" id='form-contato' enctype='multipart/form-data'>
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
				      <label for="nomeCurso">Curso</label>
				      <input type="text" class="form-control" id="nomeCurso" name="nomeCurso" value="<?=$geral->nomeCurso?>">
				      <span class='msg-erro msg-nomeCurso'></span>
				    </div>
 <div class="form-group">
			      <label for="nomeArtista">Nome do Artista</label>
				  <select class="form-control" name="nomeArtista" id="nomeArtista">
				    <option value="">Selecione o Artista</option>
					
					<?php
require_once 'conexao.php';
$odb=new PDO('mysql:host=sistemas.fundacaostickel.org;dbname=sistemas', 'stickel', 'alm#2017');
$query = "select idProfessor, nome from tab_professor";
    $data = $odb->prepare($query);   
    $data->execute();
    while($row=$data->fetch(PDO::FETCH_ASSOC)){
	echo '<option value="'.$row['nome'].'">'.$row['nome'].'</option>';
	
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
$odb=new PDO('mysql:host=sistemas.fundacaostickel.org;dbname=sistemas', 'stickel', 'alm#2017');
$query = "select id, nome from tab_parceiros";
    $data = $odb->prepare($query);   
    $data->execute();
    while($row=$data->fetch(PDO::FETCH_ASSOC)){
	echo '<option value="'.$row['nome'].'">'.$row['nome'].'</option>';
	
    }
?> </div>
				  </select>
					
					 <div class="form-group">
				      <label for="inicio">Início</label>
				      <input type="date" class="form-control" id="inicio" name="inicio" value="<?=$geral->inicio?>">
				      <span class='msg-erro msg-inicio'></span>
				    </div>
					
					 <div class="form-group">
				      <label for="fim">Fim</label>
				      <input type="date" class="form-control" id="fim" name="fim" value="<?=$geral->fim?>">
				      <span class='msg-erro msg-fim'></span>
				    </div>
					
					
					 <div class="form-group">
				      <label for="total">Total</label>
				      <input type="text" class="form-control" id="total" name="total" value="<?=$geral->total?>">
				      <span class='msg-erro msg-fim'></span>
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
				    <input type="hidden" name="idCurso" value="<?=$geral->idCurso?>">
				    <input type="hidden" name="foto_atual" value="<?=$geral->foto?>">
					
					
				    <button type="submit" class="btn btn-primary" id='botao'> 
				      Gravar
				    </button>
				    <a href='cadastro_curso.php' class="btn btn-danger">Cancelar</a>
				</form>
			<?php endif; ?>
		</fieldset>

	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>