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
$id = isset($_GET['idProfessor']) ? $_GET['idProfessor'] : null;
	
	if(empty($id)){
		echo "Curso não informado";
		exit;
		}
$conexao = conexao::getInstance();
		$sql = "DELETE FROM tab_professor WHERE idProfessor = :idProfessor";
$del = $conexao->prepare($sql);
$del->bindParam('idProfessor', $id, PDO::PARAM_INT);
$retorno = $del->execute();
if ($retorno){
				echo "<div class='alert alert-danger' role='alert'>Registro Deletado com sucesso, aguarde você está sendo redirecionado ...</div> ";
							echo "<meta http-equiv=refresh 
							
						content='3;URL=cadastro_artista.php'>";
}
?>
		
</div>
</body>
</html>