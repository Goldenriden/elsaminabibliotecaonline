
<?php
include('conexao.php');
session_start();
date_default_timezone_set('UTC');
if(!$_SESSION['usuario']) 
{
  header('Location: index.php');
  exit();
}
if (isset($_POST['criar']) )
 {
     
       $titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);  
        $autor = mysqli_real_escape_string($conexao, $_POST['autor']);  
        $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);  
        $data1 = date("Y-m-d: h:i:s");
    
    {
              $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
              $extensao1 = strtolower(substr($_FILES['arquivo1']['name'], -4));
          
            
               $novo_nome = md5(time()) . $extensao;
               $novo_nome1 = md5(time()) . $extensao1;
            
               $diretorio = "./";
                move_uploaded_file(  $_FILES['arquivo']['tmp_name'],$novo_nome );
                move_uploaded_file(  $_FILES['arquivo1']['tmp_name'],$novo_nome1 );

               $resultpesquisa = ("INSERT INTO tbpublivros (datah,autor,titulo,descricao,anexo,capa)VALUES('$data1','$autor','$titulo', '$descricao','$novo_nome','$novo_nome1') ");
               $resuladotodapesquisa = mysqli_query ($conn, $resultpesquisa);
               {
                echo "  <strong>  <script> window.alert (' O livro foi publicado com sucesso');
                window.location.href='publicar-livro.php'; 
                     </script>  </strong>   ";

               }
            


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
    <title>Publicar livros</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="assets/img//undraw_shopping_re_3wst.svg" alt="">
        </div>
        <div class="form">
        <form action="" class="formulario" name="" method="post" enctype="multipart/form-data">


                <div class="input-group">

                
                <div class="form-header">
                    <div class="title">
                        <h2>Publicar livros</h2>
                        <br>
                        <a href="index-admin.php"  style="float: left; margin-bottom: 10px"> <b>   Página Inicial   </b></a>
                        
                    </div>
                    
                </div>
                <br>
                <br>
                  
                   
                    <div class="input-box">
                        <label for="email">Titulo </label>
                        <input id="email" type="text" name="titulo" placeholder="" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Autor</label>
                        <input id="password" type="text" name="autor" placeholder="" required>
                    </div>

                 
                    

                    <div class="input-box">
                        <label for="password">Descrição</label>
                        <input id="password" type="text" name="descricao" placeholder="" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Anexo Livro</label>
                        <input type="file" name="arquivo" id="aluno" class="form-control" autofocus=""  requered=""  >

                    </div>

                    <div class="input-box">
                        <label for="password">Anexo Capa</label>
                        <input type="file" name="arquivo1" id="aluno" class="form-control" autofocus=""  requered=""  >

                    </div>
                    
                 
                  

                </div>

                <div class="continue-button">
                <button name="criar" class="btn btn-primary" type="submit"> Publicar </button>
             
                </div>
            </form>

        </div>
    </div>
</body>

</html>