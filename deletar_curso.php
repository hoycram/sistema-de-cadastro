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
$idCurso = isset($_GET['idCurso']) ? $_GET['idCurso'] : null;
	
	if(empty($idCurso)){
		echo "Curso não informado";
		exit;
		}
$conexao = conexao::getInstance();
		$sql = "DELETE FROM tab_cursos WHERE idCurso = :idCurso";
$del = $conexao->prepare($sql);
$del->bindParam('idCurso', $idCurso, PDO::PARAM_INT);
$retorno = $del->execute();
if ($retorno){
				echo "<div class='alert alert-danger' role='alert'>Registro Deletado com sucesso, aguarde você está sendo redirecionado ...</div> ";
							echo "<meta http-equiv=refresh 
							
						content='3;URL=cadastro_curso.php'>";
}
?>
		
</div>
</body>
</html>