
<?php
include('conexao.php');
session_start();
date_default_timezone_set('UTC');

if (isset($_POST['criar']) )
 {
       $pwd = mysqli_real_escape_string($conexao, $_POST['pwd']);  
      $email = mysqli_real_escape_string($conexao, $_POST['email']);  
    
    {
        {
        $query = "SELECT * FROM tbalunos  WHERE email Like '$email' And pwd like '$pwd'    ";
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
                    echo "  <strong>  <script> window.alert ('Palavra passe ou Email errado');
                    window.location.href='login-alunos.php'; 
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
    <title>Login Admin</title>
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
                        <h1>Login Alunos</h1>
                    </div>  
                </div>

                <div class="input-group">

                    <div class="input-box">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>

                         <br>

                    <div class="input-box">
                        <label for="password">Senha</label>
                        <input id="password" type="password" name="pwd" placeholder="Digite sua senha" required>
                    </div>

                </div>

                <div class="continue-button">
                <button name="criar" class="btn btn-primary" type="submit">Iniciar Sessão </button>
                </div>

                <div class="continue-button">
                <button name="criar" class="btn btn-primary" type="submit"> <a href="frm-alunos.php" >Criar Conta </a></button>
                </div>

            </form>
        </div>

    </div>
</body>

</html>