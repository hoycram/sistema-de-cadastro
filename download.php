<?php

$odb = new PDO('mysql:host=127.0.0.1;dbname=blog', 'root', '');
$query = "SELECT arquivos FROM tab_professor";
    $data = $odb->prepare($query);   
    $data->execute();
    while($row=$data->fetch(PDO::FETCH_ASSOC)){
	echo '<option value="'.$row['arquivos'].'">'.$row['arquivos'].'</option>';
	
    }
?>