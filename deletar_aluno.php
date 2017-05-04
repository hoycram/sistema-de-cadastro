<?php
require_once 'conexao.php';
?>





<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
	<title>Sistema de Cadastro</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>

<body>

<div class='container box-mensagem-crud'>
<?php 
$idAluno = isset($_GET['idAluno']) ? $_GET['idAluno'] : null;
	
	if(empty($idAluno)){
		echo "Aluno não informado";
		exit;
		}
$conexao = conexao::getInstance();

		$sql = "DELETE FROM tab_alunos WHERE idAluno = :idAluno";
		
$del = $conexao->prepare($sql);
$del->bindParam('idAluno', $idAluno, PDO::PARAM_INT);
$retorno = $del->execute();

if ($retorno){
				echo "<div class='alert alert-danger' role='alert'>Registro Deletado com sucesso, aguarde você está sendo redirecionado ...</div> ";
							echo "<meta http-equiv=refresh 
							
						content='3;URL=cadastro_aluno.php'>";
}
?>
		
</div>
</body>
</html>