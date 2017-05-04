<?php
require 'conexao.php';
// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';
// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):
	$conexao = conexao::getInstance();
	$sql = 'SELECT 	idProfessor, nome, nomeartistico, endereco, rg, cpf, cnpj, data_nascimento, email, telefone, celular, status, foto, categoria FROM tab_professor';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$geral = $stm->fetchAll(PDO::FETCH_OBJ);
else:
	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT 	idProfessor, nome, nomeartistico, endereco, rg, cpf, cnpj, data_nascimento, email, telefone, celular, status, foto, categoria FROM tab_professor WHERE nome LIKE :nome OR email LIKE :email';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome', $termo.'%');
	$stm->bindValue(':email', $termo.'%');
	$stm->execute();
	$geral = $stm->fetchAll(PDO::FETCH_OBJ);
endif;
?>
<!DOCTYPE html>
<html lang="pt-br">
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
			<form action="" method="get" idProfessor='form-contato' class="form-horizontal col-md-10">
				<label class="col-md-2 control-label" for="termo">Pesquisar</label>
				<div class='col-md-7'>
			    	<input type="text" class="form-control" idProfessor="termo" name="termo" placeholder="Infome o Nome ou E-mail">
				</div>
			    <button type="submit" class="btn btn-danger">Pesquisar</button>
			    <a href='cadastro_artista.php' class="btn btn-danger">Ver Todos</a>
				</form>
</div>
<article class="container">
		<hr>			
		<a href='cadastro.php' class="btn btn-danger">Cadastrar Artistas</a>
		<a href='index.php' class="btn btn-danger">Voltar</a>
		<div class='clearfix'></div>
	
		
	</article>	
			<?php if(!empty($geral)):?>

				<!-- Tabela de geral -->
				<table class="table table-hover">
					<tr class='active'>
					<th><center>Foto</center></th>
					<th><center>Nome</th>
					<th><center>Nome Artistico</center></th>
					<th><center>Endereço</center></th>
					<th><center>RG</center></th>
					<th><center>CPF</center></th>
					<th><center>CNPJ</center></th>
					<th><center>Data de Nascimento</center></th>
					<th><center>E-mail</center></th>
					<th><center>Telefone</center></th>
					<th><center>Celular</center></th>
					<th><center>Categória</center></th>
					<th><center>Status</center></th>
					<th><center>Ação</center></th>
				
					</tr>
					<?php foreach($geral as $geral):?>
						<tr>
				<td><img src='fotos/<?=$geral->foto?>' height='100' width='100'></td>
					<td><center><?=$geral->nome?></center></td>
					<td><center><?=$geral->nomeartistico?></center></td>
					<td><center><?=$geral->endereco?></center></td>
					<td><center><?=$geral->rg?></center></td>
					<td><center><?=$geral->cpf?></center></td>
					<td><center><?=$geral->cnpj?></center></td>
					<td><center><?=$geral->data_nascimento?></center></td>
					<td><center><?=$geral->email?></center></td>
					<td><center><?=$geral->telefone?></center></td>
					<td><center><?=$geral->celular?></td>
					<td><center><?=$geral->categoria?></center></td>
					<td><center><?=$geral->status?></center></td>
					
							
							<td>
								<a href='editar_artista.php?idProfessor=<?=$geral->idProfessor?>' class="btn btn-danger">Editar</a>
								<br>
									<a href="javascript:if(confirm('Tem certeza que deseja excluir ?')){location= 'deletar_artista.php?idProfessor=<?=$geral->idProfessor?>';}">Excluir</a>
							
							
								
								</td>
						</tr>	
					<?php endforeach;?>
				</table>

			<?php else: ?>

				<!-- Mensagem caso não exista geral ou não encontrado  -->
				<h3 class="text-center text-primary">Não existem Professores cadastrados!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>