<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8" />

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">

</head>

<body>
<div class="container">
<div class="form-group">
	<form action="salvar.php" method="post" enctype="multipart/form-data"> 								
		
		<div class="row">
		<label>Descrição *</label><br>
		<div class="form-group">
		<input id="descricao_documento" name="descricao_documento" type="text" class="input" size="40" maxlength="100"/> 			
		<br>
		</div>
                <label >Arquivo *</label><br>	
		<input name="dados_documento" type="file" class="input" size="45"/> 
		<br>	
	
		<!--Enviar -->
		<input type="submit" value="Enviar" /> 
	</form>
	
</div>	
</div>	

</body>
</html>