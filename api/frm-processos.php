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
    try {
       
     $processo = mysqli_real_escape_string($conexao, $_POST['processo']);  

    {
     $queryda1 = "INSERT INTO tbvalidarprocesso(processo) VALUES ('$processo') ";
     $resulta1 = mysqli_query($conexao, $queryda1);
     header('Location:frm-processos.php?idq=token&Leila=eGmdHit0-1mde6');
   
       exit;

    
    }
    }
       catch (Exception $err) {
        echo $err->getMessage();
       }
 }

 
if ( isset($_GET['rem']))
{
  try {
       
  $idrem = filter_input(INPUT_GET, 'rem', FILTER_SANITIZE_STRING);  
  $result_usuario11 = "DELETE FROM  tbvalidarprocesso  Where id ='$idrem'  ";
  $resuladotodapesquisa11 = mysqli_query ($conn, $result_usuario11);
  header('Location:frm-processos.php?idq=token&Leila=eGmdHit0-1mde6');
 

      }

catch (Exception $err) {
 echo $err->getMessage();
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
    <title>Processos alunos</title>
</head>

<body>
    <div class="container">
        <div class="form-image">
            <img src="assets/img//undraw_shopping_re_3wst.svg" alt="">
        </div>
        <div class="form">
           <form method="post" action="">
                <div class="form-header">
                    <div class="title">
                        <h1>Processos</h1> <br>  <a href="index-admin.php"  style="float: left; margin-bottom: 10px"> <b>   Página Inicial   </b></a>
                    </div>
                    
                </div>


                <div class="input-group">
                    <div class="input-box">
                        <label for="firstname">Processo de Aluno</label>
                        <input id="firstname" type="text" name="processo" placeholder="Digite o Nº de Processo" required>
                    </div>
                </div>


                <div class="continue-button">
                <button name="criar" class="btn btn-primary" type="submit">Criar </button>
             
                </div>
            </form>


            <hr> </hr>
            <br>
            <br>
        
        <table  class="table table-borderless datatable">
           <thead>
                      <tr>
                       
                        <th scope="col"> </th>
                        <th scope="col"></th>
                      
                     
                      </tr>
                    </thead>
                    <tbody>

        <?php
 	
      $query_mostrar = mysqli_query($conn, "select * from tbvalidarprocesso    order by id desc   ");
      $row1 = mysqli_num_rows($query_mostrar);	
      if ($row1> 0)
      { while($row_mostrar = mysqli_fetch_assoc($query_mostrar))
       {
        ?>
         <tr>
                      
        <td><span>  <?php echo"<p style='color:black;'> <b> ".  $row_mostrar['processo'] ;  ?> </span></td>
      


        <td>
        <a href="frm-processos.php?rem=<?php echo  $row_mostrar['id'] ;  ?>">
          <span class="btn btn-danger">   Apagar       </span>
        </a> 
        
        </td>
        
       
           </tr>
          <?php     
          }}?> 

                     
                     
                    </tbody>
                  </table>




        </div>
       
    </div>
</body>

</html>