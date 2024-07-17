<?php
include('conexao.php');
session_start();
date_default_timezone_set('UTC');


if (isset($_POST['criar']) )
 {
   
       
     $usuario = mysqli_real_escape_string($conexao, $_POST['nome']);  
     $pwd = mysqli_real_escape_string($conexao, $_POST['pwd']);  
     $nmatricula = mysqli_real_escape_string($conexao, $_POST['validarprocess']);  
     $curso = mysqli_real_escape_string($conexao, $_POST['curso']);  
     $email = mysqli_real_escape_string($conexao, $_POST['email']);  
    
     $query = "SELECT * FROM tbvalidarprocesso  WHERE processo Like '$nmatricula'     ";
     $result = mysqli_query($conexao, $query);
     $row = mysqli_num_rows($result);
     
     if($row > 0) 
     {

    {
     $queryda1 = "INSERT INTO tbalunos(aluno,nmatricula,curso,pwd,email) VALUES ('$usuario','$nmatricula','$curso','$pwd','$email') ";
     $resulta1 = mysqli_query($conexao, $queryda1);
     {
        $query = "SELECT * FROM tbalunos  WHERE email Like '$email'     ";
        $result = mysqli_query($conexao, $query);
        $row = mysqli_num_rows($result);
        
        if($row > 0) 
        {
            while ($percorrer= mysqli_fetch_assoc($result))
        
            {	
                      
                $usuario=$percorrer['aluno'];
                $email=$percorrer['email'];
                $acesso=$percorrer['nmatricula'];
              
                 session_start();
                      
                       {
                         $_SESSION['aluno'] = $usuario;
                         $_SESSION['email'] = $email;    
                         $_SESSION['nmatricula'] = $acesso;    
                            
                       }
        
                  
                   
                   header('Location:index-aluno.php?idq=token&Leila=eGmdHit0-1mde6');
                    exit;

            
                 }
                }
            }
        }
 }
 else
 {
    echo "  <strong>  <script> window.alert ('  Nº Processo Invalido ');
    window.location.href='conta-aluno.php'; 
         </script>  </strong>   ";
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
    <title>Conta aluno</title>
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
                        <h1>Criar conta aluno</h1>
                    </div>
                    <div class="login-button">
                        <button><a href="login-alunos.php">Iniciar sessão</a></button>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="firstname">Primeiro Nome</label>
                        <input id="firstname" type="text" name="nome" placeholder="Digite seu primeiro nome" required>
                    </div>

                    <select name="curso" class="form-select input-box"  required>
                 <option selected disabled value="">Escolher...</option>
                 <?php
 	
   $query_mostrar = mysqli_query($conn, "select * from tbcurso    order by id desc   ");
   $row1 = mysqli_num_rows($query_mostrar);	
   if ($row1> 0)
   { while($row_mostrar = mysqli_fetch_assoc($query_mostrar))
    {
     ?>
      <option  value ="<?php echo  $row_mostrar['curso'] ;  ?>"> <?php echo  $row_mostrar['curso'] ;  ?> </option>   
       <?php     
          }}?>          
               </select>

                    
                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>

                  

                    <div class="input-box">
                        <label for="password">Senha</label>
                        <input id="password" type="text" name="pwd" placeholder="Digite sua senha" required>
                    </div>

                    <div class="input-box">
                        <label for="password">N Matricula</label>
                        <input id="password" type="text" name="validarprocess" placeholder="" required>
                    </div>


                </div>

                <div class="continue-button">
                <button name="criar" class="btn btn-primary" type="submit">Criar conta </button>
             
                </div>
            </form>
        </div>
    </div>
</body>

</html>