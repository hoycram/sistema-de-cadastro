<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Celke - Upload</title>
        <!--<link href="css/bootstrap.css" rel="stylesheet">-->
    </head>
    <body> 
        <?php
            require('./conf/Config.inc');
            $addinfo = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            if($addinfo && $addinfo['addArquivo']):
                $upload = new Upload();
                $file = $_FILES['file'];
                $upload->File($file);
                if(!$upload->getResult()):
                    echo $upload->getMsg();
                else:
                    echo $upload->getMsg();
                endif;
            endif;
        ?>
        
        <form name="addArquivoForm" action="" method="post" enctype="multipart/form-data">
            <label>
                <input type="file" name="file"/>
            </label>
            <input type="submit" name="addArquivo" value="Cadastrar Arquivo"/>
        </form>
    </body>
</html>

