<?php
include('conexao.php');
session_start();
if(!$_SESSION['usuario']) 
{
  header('Location: index.php');
  exit();
}
 
if ( isset($_GET['rem']))
{
  try {
       
  $idrem = filter_input(INPUT_GET, 'rem', FILTER_SANITIZE_STRING);  
  $result_usuario11 = "DELETE FROM  tbalunos  Where id ='$idrem'  ";
  $resuladotodapesquisa11 = mysqli_query ($conn, $result_usuario11);
  header('Location:list-alunos.php?idq=token&Leila=eGmdHit0-1mde6');
 

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

 	<title>List Alunos</title>


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
                   
                          <p align="center">   <strong> Listagens de Alunos </strong> 
                        
 </blockquote>

	<form action="" class="formulario" name="formulario_registro" method="post" enctype="multipart/form-data">

     </header>
	<body>
	
	 <a href="index-admin.php"  style="float: left; margin-bottom: 10px"> <b>   Página Inicial   </b></a>

          <div class="container theme-showcase" role="main">

<?php

$result_usuariosbalancotpa = "SELECT * FROM tbalunos    ";
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
                             <td>   <p align="left">   <strong>  <?php  echo $linha1['aluno']; ?> </strong>    </p>
                          </td>
                           </tr>


                           <tr>
                           <td>
        <a href="list-alunos.php?rem=<?php echo  $linha1['id'] ;  ?>">
          <span class="btn btn-danger">   Iliminar       </span>
        </a> 
        
        </td>
                           </tr>

                           </table>
                           
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

       <script src="layout/scripts/jqueryy.min.js"></script>
       <script src="layout/scripts/bootstrapp.min.js"></script>
       <script src="layout/scripts/docs.min.js"></script>
       <script src="layout/scripts/ie10-viewport-bug-workaround.js"></script>
       <script src="plugin-frameworks/jquery-3.2.1.min.js"></script>
	     <script src="plugin-frameworks/tether.min.js"></script>
	     <script src="plugin-frameworks/bootstrap.js"></script>
	     <script src="common/scripts.js"></script>
		
	</body>
</html>
