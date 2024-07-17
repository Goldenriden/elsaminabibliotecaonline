<?php
include('conexao.php');
session_start();
date_default_timezone_set('UTC');





if (isset($_POST['criar']) )
 {
   
       
     $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);  
     $pwd = mysqli_real_escape_string($conexao, $_POST['pwd']);  
     $acesso = mysqli_real_escape_string($conexao, $_POST['acesso']);  
     $email = mysqli_real_escape_string($conexao, $_POST['email']);  
    
    {
     $queryda1 = "INSERT INTO tbusuarios(usuario,pwd,acesso,email) VALUES ('$usuario','$pwd','$acesso','$email') ";
     $resulta1 = mysqli_query($conexao, $queryda1);
     {
        $query = "SELECT * FROM tbusuarios  WHERE email Like '$email'     ";
        $result = mysqli_query($conexao, $query);
        $row = mysqli_num_rows($result);
        
        if($row > 0) 
        {
            while ($percorrer= mysqli_fetch_assoc($result))
        
            {	
                      
                $usuario=$percorrer['usuario'];
                $email=$percorrer['email'];
                $acesso=$percorrer['acesso'];
              
                 session_start();
                      
                       {
                         $_SESSION['usuario'] = $usuario;
                         $_SESSION['email'] = $email;    
                         $_SESSION['acesso'] = $acesso;    
                            
                       }
        
                    if ($acesso=="Administrador")
                    {
                   
                   header('Location:index-admin.php?idq=token&Leila=eGmdHit0-1mde6');
                    exit;

                    }
                    else if ($acesso=="Bibliotecario")
                    {
                        header('Location:index-bibliotecario.php?idq=token&Leila=eGmdHit0-1mde6');
                        exit;
                    }
                
            
                 }
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
    <title>Criar usuários</title>
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
                        <h1>Usuários</h1>
                    </div>
                    
                </div>
            
            <strong>
               Listar <a href="list-usuarios.php">  Usuários  </a> <br>
               <a href="index-admin.php"  style="float: left; margin-bottom: 10px"> <b>   Página Inicial   </b></a>
               <br>    <br>
          </strong>
         


         <hr> </hr>
                <div class="input-group">
                    <div class="input-box">
                        <label for="firstname">Usuario</label>
                        <input id="firstname" type="text" name="usuario" placeholder="Digite o seu nome" required>
                    </div>

                    <div class="input-box">
                        <label for="firstname">Palavra Passe</label>
                        <input id="firstname" type="password" name="pwd" placeholder="Digite palavra passe" required>
                    </div>

                    <div class="input-box">
                        <label for="firstname">Email</label>
                        <input id="firstname" type="text" name="email" placeholder="Digite Email" required>
                    </div>
                </div>

               
                <div class="input-group">
                    <div class="input-box">
                    <label for="validationTooltip01" class="form-label"> <h5 class="card-title">Nivel Acesso</h5> </label>
              
                <select name="acesso"  class="input-box"  required>
                    <option selected disabled value="">Escolher...</option>
                    <option>Administrador</option>
                    <option>Bibliotecario</option>
                   
                  </select>
                  </div>
                </div>

                <div class="continue-button">
                <button name="criar" class="btn btn-primary" type="submit">Criar </button>
             
                </div>
            </form>


            <hr> </hr>
            <br>
         


        </div>
       
    </div>
</body>

</html>