
<?php
include('conexao.php');
session_start();
date_default_timezone_set('UTC');

if (isset($_POST['criar']) )
 {
     
     
      $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
      $novo_nome = md5(time()) . $extensao;
      $diretorio = "./";
      move_uploaded_file(  $_FILES['arquivo']['tmp_name'],$novo_nome );
      $usuario=  $_SESSION['usuario'] ;       
    
        {

            $result_usuario11 = "DELETE FROM  tbperfil  Where usuario ='$usuario'  ";
            $resuladotodapesquisa11 = mysqli_query ($conn, $result_usuario11);

            $resultpesquisa = ("INSERT INTO tbperfil (usuario,fotoperfil)VALUES('$usuario','$novo_nome') ");
            $resuladotodapesquisa = mysqli_query ($conn, $resultpesquisa);
            header('Location:index-bibliotecario.php?idq=token&Leila=eGmdHit0-1mde6');
            exit;
        }
        
     
    }
    ?>
    

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Foto perfil</title>
</head>

<body>
    <div class="container">
      
        <div class="form">
        <form action="" class="formulario" name="" method="post" enctype="multipart/form-data">
             <div class="form-header">
                    <div class="title">
                        <h4>Foto de perfil</h4>
                    </div>

                  
                    
                </div>

                <div class="input-group">
                  
                   
                    <div class="input-box">
                        <label for="email">Foto de Perfil</label>
                        <input id="email" type="file" name="arquivo" placeholder="Digite seu e-mail" required>
                    </div>

                 

                </div>

                <div class="continue-button">
                <button name="criar" class="btn btn-primary" type="submit">Salvar foto </button>
             
                </div>
            </form>

        </div>
    </div>
</body>

</html>