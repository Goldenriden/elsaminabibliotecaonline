<?php
include('conexao.php');
session_start();
if(!$_SESSION['usuario']) 
{
  header('Location: index.php');
  exit();
}


if (isset($_POST['comentar']) )
 {
     

            $idpub = mysqli_real_escape_string($conexao, $_POST['idpub']);  
            $mensagem = mysqli_real_escape_string($conexao, $_POST['comentario']);  
            $datah = mysqli_real_escape_string($conexao, $_POST['datah']);  
   
            $usuario=  $_SESSION['usuario'] ;     
            $resultpesquisa = ("INSERT INTO tbavaliacao (idlivro,avaliador,mensagem,datah)VALUES('$idpub','$usuario','$mensagem','$datah') ");
            $resuladotodapesquisa = mysqli_query ($conn, $resultpesquisa);    header("Location:livros-coment.php?coment=$idpub");
            exit;
     
    }

    if (isset($_GET['rem1']) )
     {
      $idpub = mysqli_real_escape_string($conexao, $_POST['idpub']);  
         
        $id = filter_input(INPUT_GET, 'rem1', FILTER_SANITIZE_STRING);	
    
           $result_usuario1 = "DELETE FROM   tbavaliacao Where id ='$id'  ";
           $resuladotodapesquisa1 = mysqli_query ($conn, $result_usuario1);
           header("Location:livros-coment.php?coment=$idpub");
            exit;
        }
    ?>

    


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		

	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <link href="layout/styles/bootstrap.css" rel="stylesheet">
        <link href="layout/styles/ie10-viewport-bug-workaround.css" rel="stylesheet">
        <link href="layout/styles/theme.css" rel="stylesheet">
        <script src="layout/scripts/ie-emulation-modes-warning.js"></script>


  <!-- Stylesheets -->

	<link href="fonts/ionicons.css" rel="stylesheet">


	<link href="common/styles.css" rel="stylesheet">

 	<title>Biblioteca Online Elsamina</title>


	</head>

	       <header>
		 </div><!-- top-header -->

		<div class="middle-header mtb-20 mt-xs-0">
			<div class="container">
				<div class="row">

    	<div class="col-sm-4">
			    	</div><!-- col-sm-4 -->



				</div><!-- row -->
			</div><!-- container -->
		</div><!-- top-header -->

		
                               <blockquote class="vizew-blockquote mb-15">
                   
                          <p align="center">   <strong> Comentários </strong> 
 </blockquote>
 
	<form action="" class="formulario" name="formulario_registro" method="post" enctype="multipart/form-data">

     
     </header>
	<body>
	
	






          <div class="container theme-showcase" role="main">
 <a href="livros.php"  style="float: left; margin-bottom: 10px"> <b>   Voltar   </b></a>

            <div class="page-header">


   <div class="p-30 card-view">
   		

<br>
   <br>

   
<?php


$id = filter_input(INPUT_GET, 'coment', FILTER_SANITIZE_STRING);	
$result_usuariod = "SELECT * FROM tbpublivros Where id  ";
$resultado_usuariod = mysqli_query($conn, $result_usuariod);
$row_usuariod = mysqli_fetch_assoc($resultado_usuariod);


   ?>
                        
                            <div class="col-12 col-md-3">
                                   <div class="p-5 card-view">
            
                           <div class="post-thumbnail">
                           <input id="email" type="hidden" name="datah" value="<?php  echo $row_usuariod['datah']; ?>" required>
                           <input id="email" type="hidden" name="idpub" value="<?php  echo $row_usuariod['id']; ?>" required>
                      
                        <table border="0" width="100%" class="table table-striped table-hover col-md-12 col-sm-12 col-xs-12">
<tr>
   <td>  <p  width="100"  > </p>  <img src="<?php echo $row_usuariod['capa'] ?>" width="100" height="100" border="0" >
                       </td>
</tr>

                           
                          <tr>
                           <td>   <p align="center">   <strong>    <a href="<?php  echo $row_usuariod['anexo']; ?> "> <?php  echo $row_usuariod['titulo']; ?>  </a>  </strong>    </p>
                          </td>
						             </tr>
						  
						
                           <tr>
                             <td>   <p align="center">   <strong>   <a href="<?php  echo $row_usuariod['anexo']; ?> "> <?php  echo $row_usuariod['descricao']; ?>  </a>      </strong>    </p>
                          </td>
                           </tr>
						             
                           <tr>
                             <td>   <p align="center">   <strong>  <?php  echo $row_usuariod['datah']; ?>      </strong>    </p>
                          </td>
                           </tr>


                           <tr>
                           <td>
        
        </td>

                        </tr>
                          
                           </table>

                           
                                 
                            </div>
                           
              
                            </div>
     
<strong> Comentários </strong>
<hr> </hr>
                            
<?php

$id = filter_input(INPUT_GET, 'coment', FILTER_SANITIZE_STRING);

$result_usuariosbalancotpa = "SELECT * FROM tbavaliacao Where idlivro Like '$id%'    ";
$resultado_usuariosbalancotpa = mysqli_query($conn, $result_usuariosbalancotpa);

$row = mysqli_num_rows($resultado_usuariosbalancotpa);

if($row > 0 )
{
while ($linha1 = mysqli_fetch_assoc($resultado_usuariosbalancotpa))

  {
   ?>                     <div class="p-30 card-view">
                          <div class="p-5 card-view">
            
                           <div class="post-thumbnail">
                          
                        <table border="0" width="100%" class="table table-striped table-hover col-md-12 col-sm-12 col-xs-12">
						            <tr>
                        <small>   <strong>  <?php  echo $linha1['avaliador']; ?><br>    </strong></small> 
                             
                             <td>   <p align="left">   <strong>  <?php  echo $linha1['mensagem']; ?> </strong> 
                            
                            </p>

                        <small>  <?php  echo $linha1['datah']; ?> 
                          <a href="livros-coment.php?rem1=<?php echo  $linha1['id'] ;  ?>">

                           <span>  <strong>  Iliminar  </strong>     </span> 
        </a> 
                        
                        </small>
                          </td>
                           </tr>

                       
                          
                           </table>

                           
                           </div>     
                            </div>
                            </div>
                           
              

  <?php }

  }


?>   

  <?php ?>   
<tr>   <td class="text-right col-md-1 col-sm-1 col-xs-1"><label for="arquivo"> Comentário </label></td>
      <textarea name="comentario" id="aluno" class="form-control" placeholder="Descreve um comentário"  > </textarea>
</tr>

     <br>

 <tr>
   <td class="text-right col-md-1 col-sm-1 col-xs-1"></td>
   <td><input type="submit" id="btn-submit" name="comentar"   value="Comentar " class="btn btn-success"></td>
</tr>


		</form>

          </table>
     

    </div>


        </div>




	
	<footer class="bg-191 pos-relative color-ccc bg-primary pt-50">
		


	</footer>





	<!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="layout/scripts/jqueryy.min.js"></script>
    <script src="layout/scripts/bootstrapp.min.js"></script>
    <script src="layout/scripts/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="layout/scripts/ie10-viewport-bug-workaround.js"></script>


    	<script src="plugin-frameworks/jquery-3.2.1.min.js"></script>

	<script src="plugin-frameworks/tether.min.js"></script>

	<script src="plugin-frameworks/bootstrap.js"></script>

	<script src="common/scripts.js"></script>

		
		
		
	</body>
</html>
