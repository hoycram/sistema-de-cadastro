<?php
require 'conexao.php';
// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';
// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):
	$conexao = conexao::getInstance();
	$sql = 'SELECT 	idAluno, nomeAluno, sexoAluno, data_Aluno, enderecoAluno, rgAluno, cpfAluno, estadoCivil, qtdeFilhos, idadeFilhos, telAluno, celAluno, emailAluno, cursoAluno, local_insc, status, foto  FROM tab_alunos';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$geral = $stm->fetchAll(PDO::FETCH_OBJ);
else:
	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT 	idAluno, nomeAluno, sexoAluno, data_Aluno, enderecoAluno, rgAluno, cpfAluno, estadoCivil, qtdeFilhos, idadeFilhos, telAluno, celAluno, emailAluno, cursoAluno, local_insc, status, foto FROM tab_alunos WHERE nomeAluno LIKE :nomeAluno OR cursoAluno LIKE :cursoAluno';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nomeAluno', $termo.'%');
	$stm->bindValue(':cursoAluno', $termo.'%');
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
		<a href='aluno.php' class="btn btn-danger">Cadastrar o Aluno</a>
		<a href='index.php' class="btn btn-danger">Voltar</a>
		<div class='clearfix'></div>
	
		
	</article>	
			<?php if(!empty($geral)):?>
<div class="table-responsive">
				<!-- Tabela de geral -->
				<table class="table table-hover">
				 
					<tr class='active'>
					<th><center>Foto</center></th>
					<th><center>Nome</center></th>
					<th><center>Sexo</center></th>
					<th><center>Nascimento</center></th>
					<th><center>Endereço</center></th>
					<th><center>RG</center></th>
					<th><center>CPF</center></th>
					<th><center>Estado Cívil</center></th>
					<th><center>Qtde. Filhos</center></th>
					<th><center>Idade</center></th>
					<th><center>Telefone</center></th>
					<th><center>Celular</center></th>
					<th><center>E-mail</center></th>
					<th><center>Curso</center></th>
					<th><center>Inscrição</center></th>
					<th><center>Status</center></th>
					<th><center>Ação</center></th>
				
					</tr>
					<?php foreach($geral as $geral):?>
						<tr>
							<td><img src='fotos/<?=$geral->foto?>' height='100' width='100'></td>
					<td><?=$geral->nomeAluno?></center></td>
					<td><?=$geral->sexoAluno?></center></td>
					<td><center><?=$geral->data_Aluno?></center></td>
					<td><center><?=$geral->enderecoAluno?></center></td>
					<td><center><?=$geral->rgAluno?></center></td>
					<td><center><?=$geral->cpfAluno?></center></td>
					<td><center><?=$geral->estadoCivil?></center></td>
					<td><center><?=$geral->qtdeFilhos?></center></td>
					<td><center><?=$geral->idadeFilhos?></center></td>
					<td><center><?=$geral->telAluno?></center></td>
					<td><center><?=$geral->celAluno?></center></td>
					<td><center><?=$geral->emailAluno?></center></td>
					<td><center><?=$geral->cursoAluno?></center></td>
					<td><center><?=$geral->local_insc?></center></td>
					<td><center><?=$geral->status?></center></td>
					<td>
								<a href='editar_aluno.php?idAluno=<?=$geral->idAluno?>' class="btn btn-danger">Editar</a>
								<br>
							
							
					<a href="javascript:if(confirm('Tem certeza que deseja excluir ?')){location= 'deletar_aluno.php?idAluno=<?=$geral->idAluno?>';}">Excluir</a>

						
							</td>
						</tr>	
						     
						
					<?php endforeach;?>
				</table>
		
	  
</div>
    <?php else: ?>

				<!-- Mensagem caso não exista geral ou não encontrado  -->
				<h3 class="text-center text-primary">Não existem Alunos cadastrados!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>