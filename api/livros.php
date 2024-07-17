<?php
include('conexao.php');
session_start();

 
if ( isset($_GET['rem']))
{
  try {
       
  $idrem = filter_input(INPUT_GET, 'rem', FILTER_SANITIZE_STRING);  
  $result_usuario11 = "DELETE FROM  tbpublivros  Where id ='$idrem'  ";
  $resuladotodapesquisa11 = mysqli_query ($conn, $result_usuario11);
  header('Location:livros.php?idq=token&Leila=eGmdHit0-1mde6');
 

      }

catch (Exception $err) {
 echo $err->getMessage();
}

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
                   
                          <p align="center">   <strong> Biblioteca - Gestão de Livros </strong> 
                        
                 

 </blockquote>
 
	<form action="" class="formulario" name="formulario_registro" method="post" enctype="multipart/form-data">

     
     </header>
	<body>
	
	






          <div class="container theme-showcase" role="main">
 <a href="index-admin.php"  style="float: left; margin-bottom: 10px"> <b>   Página Inicial   </b></a>

            <div class="page-header">

		
<tr>   <td class="text-right col-md-1 col-sm-1 col-xs-1"><label for="arquivo">  </label></td>
      <td class="col-sm-11 col-md-11 col-xs-11"><input type="text" name="txtpesquisar" id="aluno" class="form-control" placeholder="INFORME UMA PESQUISA AQUI"  ></td>
</tr>

     <br>

 <tr>
   <td class="text-right col-md-1 col-sm-1 col-xs-1"></td>
   <td><input type="submit" id="btn-submit" name="BDENVIAR1"   value="Pesquisar livros " class="btn btn-success"></td>
</tr>


<?php


if (isset($_POST['BDENVIAR1']) )
{



include_once("conexao.php");
$pesquisar = filter_input(INPUT_POST, 'txtpesquisar', FILTER_SANITIZE_STRING);

$result_usuariosbalancotpa = "SELECT * FROM tbpublivros  Where  titulo LIKE '%$pesquisar%'  Or  descricao LIKE '%$pesquisar%'    order by id desc     ";
$resultado_usuariosbalancotpa = mysqli_query($conn, $result_usuariosbalancotpa);

$row = mysqli_num_rows($resultado_usuariosbalancotpa);

if($row > 0 )
{
while ($linha1 = mysqli_fetch_assoc($resultado_usuariosbalancotpa))

{
?>



<div class="col-12 col-md-3">
    <div class="p-5 card-view">
            
     <div class="post-thumbnail">
 
<table border="0" width="100%" class="table table-striped table-hover col-md-12 col-sm-12 col-xs-12">
<tr>
<td>  <p  width="100"  > </p>  <img src="<?php echo $linha1['capa'] ?>" width="100" height="100" border="0" >
</td>
</tr>

 <tr>
  <td>   <p align="center">   <strong>    <a href="<?php  echo $linha1['anexo']; ?> "> <?php  echo $linha1['titulo']; ?>  </a>  </strong>    </p>
 </td>
</tr>

<hr>
  <tr>
    <td>   <p align="center">   <strong>   <a href="<?php  echo $linha1['anexo']; ?> "> <?php  echo $linha1['descricao']; ?>  </a>      </strong>    </p>
 </td>
  </tr>
<tr>
    <td>   <p align="center">   <strong>  <?php  echo $linha1['datah']; ?>      </strong>    </p>
 </td>
  </tr>

  <tr>
                           <td>
        <a href="livros.php?rem=<?php echo  $linha1['id'] ;  ?>">
          <span class="btn btn-danger">   Apagar       </span>
        </a> 

         
        <a href="livros-coment.php?coment=<?php echo  $linha1['id'] ;  ?>">
          <span class="btn btn-success">  Comentários      </span>
        </a> 
        
        </td>

      
                           </tr>

 
  </table>

  
  </div>   
   </div>
  

   </div>



<?php }

}
else
{
echo"   <strong> NENHUMA BUSCA RELACIONADA FOI ENCONTRADA!   </strong> ";
}



?>  <?php {} } ?>

</form>
<hr></hr>

   <div class="p-30 card-view">
   		

<br>
   <br>
  <br>
   <br>

   
   
<?php



$result_usuariosbalancotpa = "SELECT * FROM tbpublivros    ";
$resultado_usuariosbalancotpa = mysqli_query($conn, $result_usuariosbalancotpa);

$row = mysqli_num_rows($resultado_usuariosbalancotpa);

if($row > 0 )
{
while ($linha1 = mysqli_fetch_assoc($resultado_usuariosbalancotpa))

  {
   ?>
                        


                            <div class="col-12 col-md-3">
                                   <div class="p-5 card-view">
            
                           <div class="post-thumbnail">
                          
                        <table border="0" width="100%" class="table table-striped table-hover col-md-12 col-sm-12 col-xs-12">
<tr>
   <td>  <p  width="100"  > </p>  <img src="<?php echo $linha1['capa'] ?>" width="100" height="100" border="0" >
                       </td>
</tr>

                           
                          <tr>
                           <td>   <p align="center">   <strong>    <a href="<?php  echo $linha1['anexo']; ?> "> <?php  echo $linha1['titulo']; ?>  </a>  </strong>    </p>
                          </td>
						  </tr>
						  
						
                           <tr>
                             <td>   <p align="center">   <strong>   <a href="<?php  echo $linha1['anexo']; ?> "> <?php  echo $linha1['descricao']; ?>  </a>      </strong>    </p>
                          </td>
                           </tr>
						    <tr>
                             <td>   <p align="center">   <strong>  <?php  echo $linha1['datah']; ?>      </strong>    </p>
                          </td>
                           </tr>


                           <tr>
                           <td>
        <a href="livros.php?rem=<?php echo  $linha1['id'] ;  ?>">
          <span class="btn btn-danger">   Apagar       </span>
        </a> 

      
        <a href="livros-coment.php?coment=<?php echo  $linha1['id'] ;  ?>">
          <span class="btn btn-success">  Comentários      </span>
        </a> 
        
      
        
        </td>


                           </tr>

                        
                          
                           </table>

                           </div>
                        
                                 
                            </div>
                           
              
                            </div>
     


  <?php }

  }


?>   

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
