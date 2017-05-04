<?php
require 'conexao.php';
// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';
// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):
	$conexao = conexao::getInstance();
	$sql = 'SELECT 	id, nome, cnpj, endereco, telefone, email, responsavel, cargo, celular, emailcontato, status, foto FROM tab_parceiros';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$geral = $stm->fetchAll(PDO::FETCH_OBJ);
else:
	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT 	id, nome, cnpj, endereco, telefone, email, responsavel, cargo, celular, emailcontato, status, foto FROM tab_parceiros WHERE nome LIKE :nome OR email LIKE :email';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome', $termo.'%');
	$stm->bindValue(':email', $termo.'%');
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
		<a href='parceiros.php' class="btn btn-danger">Cadastrar Parceiros</a>
		<a href='index.php' class="btn btn-danger">Voltar</a>
		<div class='clearfix'></div>
	
		
	</article>	
			<?php if(!empty($geral)):?>

				<!-- Tabela de geral -->
				<table class="table table-hover">
					<tr class='active'>
					<th>Foto</th>
					<th>Nome</th>
					<th>CNPJ</th>
					<th>Endereço</th>
					<th>Telefone</th>
					<th>E-mail</th>
					<th>Responsável</th>
					<th>Cargo</th>
					<th><center>E-mail do responsável</center></th>
					<th>Celular</th>
					<th>Status</th>
					<th>Ação</th>
				
					</tr>
					<?php foreach($geral as $geral):?>
						<tr>
							<td><img src='fotos/<?=$geral->foto?>' height='100' width='100'></td>
					<td><?=$geral->nome?></td>
					<td><?=$geral->cnpj?></td>
					<td><?=$geral->endereco?></td>
					<td><?=$geral->telefone?></td>
					<td><?=$geral->email?></td>
					<td><?=$geral->responsavel?></td>
					<td><?=$geral->cargo?></td>
					<td><?=$geral->emailcontato?></td>
					<td><?=$geral->celular?></td>
					<td><?=$geral->status?></td>
					<td>
								<a href='editar_parceiros.php?id=<?=$geral->id?>' class="btn btn-danger">Editar</a>
								<br>
								
								<a href="javascript:if(confirm('Tem certeza que deseja excluir ?')){location= 'deletar_parceiros.php?id=<?=$geral->id?>';}">Excluir</a>
							
							</td>
						</tr>	
					<?php endforeach;?>
				</table>

			<?php else: ?>

				<!-- Mensagem caso não exista geral ou não encontrado  -->
				<h3 class="text-center text-primary">Não existem Parceiros cadastrados!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>