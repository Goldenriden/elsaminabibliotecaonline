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
     
     $aluno = mysqli_real_escape_string($conexao, $_POST['aluno']);  
      $email = mysqli_real_escape_string($conexao, $_POST['email']);  
      $pwd = mysqli_real_escape_string($conexao, $_POST['pwd']);  
      $processo = mysqli_real_escape_string($conexao, $_POST['processo']);  
    
    {
      

        {
        $query = "SELECT * FROM tbvalidarprocesso  WHERE processo Like '$processo'     ";
        $result = mysqli_query($conexao, $query);
        $row = mysqli_num_rows($result);
        
        if($row > 0) 
        {
            $queryda1 = "INSERT INTO tbalunos(aluno,nmatricula,pwd,email) VALUES ('$aluno','$processo','$pwd','$email') ";
            $resulta1 = mysqli_query($conexao, $queryda1);
          
        

        $querya = "SELECT * FROM tbalunos  WHERE nmatricula Like '$processo'     ";
        $resulta = mysqli_query($conexao, $querya);
        $rowa = mysqli_num_rows($resulta);
      

            while ($percorrer= mysqli_fetch_assoc($result))
        
            {	
                      
                $usuario=$percorrer['aluno'];
                $email=$percorrer['email'];
                $acesso=$percorrer['nmatricula'];
              
                 session_start();
                      
                       {
                         $_SESSION['usuario'] = $usuario;
                         $_SESSION['email'] = $email;    
                         $_SESSION['nmatricula'] = $acesso;    
                            
                       }
    
                   header('Location:index-aluno.php?idq=token&Leila=eGmdHit0-1mde6');
                    exit;     
                 }
                }
            
                else
                {
                    echo "  <strong>  <script> window.alert ('Nº de Matricula incorreto');
                    window.location.href='frm-alunos.php'; 
                         </script>  </strong>   ";
                }
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
    <title>Criar conta</title>
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
                        <h1>Criar conta</h1>
                    </div>
                    
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="firstname">Aluno</label>
                        <input id="firstname" type="text" name="aluno" placeholder="Digite o seu nome" required>
                    </div>

                    <div class="input-box">
                        <label for="firstname">Processo</label>
                        <input id="firstname" type="text" name="processo" placeholder="Digite o seu numero de processo" required>
                    </div>

                    <div class="input-box">
                        <label for="firstname">Palavra Passe</label>
                        <input id="firstname" type="password" name="pwd" placeholder="Processo nº" required>
                    </div>

                    <div class="input-box">
                        <label for="firstname">Email</label>
                        <input id="firstname" type="email" name="email" placeholder="Digite Email" required>
                    </div>
                </div>


                <div class="continue-button">
                <button name="criar" class="btn btn-primary" type="submit">Criar </button>
             
                </div>
            </form>


            <hr> </hr>
            <br>
            <strong>
                Já tens uma conta ? <a href="login-alunos.php"> Iniciar sessão </a>
         
                </strong>

        </div>
       
    </div>
</body>

</html>