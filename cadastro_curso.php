<?php
require 'conexao.php';
// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';
// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):
	$conexao = conexao::getInstance();
	$sql = 'SELECT 	idCurso, nomeCurso, nomeArtista, razaoParceiro, inicio, fim, total, status, foto FROM tab_cursos';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$geral = $stm->fetchAll(PDO::FETCH_OBJ);
else:
	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT 	idCurso, nomeCurso, nomeArtista, razaoParceiro, inicio, fim, total, status, foto FROM tab_cursos WHERE nomeCurso LIKE :nomeCurso OR nomeArtista LIKE :nomeArtista';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nomeCurso', $termo.'%');
	$stm->bindValue(':nomeArtista', $termo.'%');
	$stm->execute();
	$geral = $stm->fetchAll(PDO::FETCH_OBJ);
endif;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Fundação Stickel - Cadastro</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container'>
		<fieldset>

			<!-- Cabeçalho da Listagem -->
			<legend><h1>Sistema de Cadastro</h1></legend>

			<!-- Formulário de Pesquisa -->
			<form action="" method="get" id='form-contato' class="form-horizontal col-md-10">
				<label class="col-md-2 control-label" for="termo">Pesquisar</label>
				<div class='col-md-7'>
			    	<input type="text" class="form-control" id="termo" name="termo" placeholder="Infome o Nome ou E-mail">
				</div>
			    <button type="submit" class="btn btn-danger">Pesquisar</button>
			    <a href='cadastro_artista.php' class="btn btn-danger">Ver Todos</a>
				</form>
			

			<!-- Link para página de cadastro -->
		</div>
<article class="container">
		<hr>			
		<a href='cursos.php' class="btn btn-danger">Cadastrar o Curso</a>
		<a href='index.php' class="btn btn-danger">Voltar</a>
		<div class='clearfix'></div>
	
		
	</article>	
			<?php if(!empty($geral)):?>
				<table class="table table-hover">
					<tr class='active'>
					<th>Foto</th>
					<th>Curso</th>
					<th>Artista</th>
					<th>Parceiro</th>
					<th>Início</th>
					<th>Fim</th>
					<th>Total de Encontros</th>
					<th>Status</th>
					<th>Ação</th>
				
					</tr>
					<?php foreach($geral as $geral):?>
						<tr>
							<td><img src='fotos/<?=$geral->foto?>' height='100' width='100'></td>
					<td><?=$geral->nomeCurso?></td>
					<td><?=$geral->nomeArtista?></td>
					<td><?=$geral->razaoParceiro?></td>
					<td><?=$geral->inicio?></td>
					<td><?=$geral->fim?></td>
					<td><?=$geral->total?></td>
					<td><?=$geral->status?></td>
					<td>
								<a href='editar.php?idCurso=<?=$geral->idCurso?>' class="btn btn-danger">Editar</a>
								<br>
								
								<a href="javascript:if(confirm('Tem certeza que deseja excluir ?')){location= 'deletar_curso.php?idCurso=<?=$geral->idCurso?>';}">Excluir</a>
								
							
</td>
						</tr>	
					<?php endforeach;?>
				</table>

			<?php else: ?>

				<!-- Mensagem caso não exista geral ou não encontrado  -->
				<h3 class="text-center text-primary">Não existem Cursos cadastrados!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>