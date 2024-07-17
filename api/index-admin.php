<?php
include('conexao.php');
session_start();
date_default_timezone_set('UTC');

if(!$_SESSION['usuario']) 
{
  header('Location: index.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Painel do Administrador</title>


    <style>
        .nav-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            background-color: #343a40;
            color: white;
        }

        .nav-bar .logo h1 {
            margin: 0;
            font-size: 1.5rem;
        }

        .nav-list {
            display: flex;
        }

        .nav-list ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .nav-list ul li {
            margin-right: 1rem;
        }

        .nav-list ul li a {
            color: white;
            text-decoration: none;
        }

        .nav-list ul li a:hover {
            text-decoration: underline;
        }

        .login-button button {
            background: none;
            border: none;
            color: white;
            font-size: 1rem;
            cursor: pointer;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .mobile-menu-icon {
            display: none;
        }

        .mobile-menu {
            display: none;
            background-color: #343a40;
            padding: 1rem;
        }

        .mobile-menu ul {
            list-style: none;
            padding: 0;
        }

        .mobile-menu ul li {
            margin-bottom: 1rem;
        }

        .mobile-menu ul li a {
            color: white;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .nav-list {
                display: none;
            }

            .mobile-menu-icon {
                display: block;
            }

            .mobile-menu.show {
                display: block;
            }
        }

        .banner {
            background-color: #f8f9fa;
            padding: 2rem;
            text-align: center;
        }

        .banner .titulo {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .banner .sub-titulo {
            font-size: 1.5rem;
        }
    </style>

</head>

<body>
    <header>
        <nav class="nav-bar">
            <div class="logo">
                <h1>Biblioteca Online Elsamina</h1>
            </div>

            <div class="nav-list">
                <ul>
                 
                    <li class="nav-item"><a href="publicar-livro.php" class="nav-link">Publicar Livros</a></li>
                    <li class="nav-item"><a href="frm-processos.php" class="nav-link">Processos alunos</a></li>
                    <li class="nav-item"><a href="livros.php" class="nav-link">Biblioteca</a></li>
                    <li class="nav-item"><a href="ebook-admin.php" class="nav-link">Ebook</a></li>
                    <li class="nav-item"><a href="list-alunos.php" class="nav-link">Alunos</a></li>
                    <li class="nav-item"><a href="frm-usuarios.php" class="nav-link">Usuários</a></li>
                      <li class="nav-item"><a href="index.php" class="nav-link">Saír</a></li>
                 
                    <li class="nav-item"><a href="add-foto-perfil-administradores.php" class="nav-link">Perfil</a></li>
             

                    <div class="dropdown">
                <?php
                $usuario= $_SESSION['usuario'];
                $query = "SELECT * FROM tbperfil  WHERE usuario Like '$usuario'     ";
                $result = mysqli_query($conexao, $query);
                while ($percorrer= mysqli_fetch_assoc($result))
                {   
               
                ?>
                <img src="<?php echo $percorrer['fotoperfil'] ?>" width="50" height="50" border="0" >
                <?php 
                }
                ?>
                    
                    <div class="dropdown">
          
                    

            </div>
            </div>
            

<div class="login-button">
          
          <button> 
      
          <a href="">  <STRONG>   <?php echo  $_SESSION['usuario'] ; ?></a>
      
      </STRONG>
</button>
      </div>

                        
            </div>
                    </div>
                </ul>
            </div>
          
         

            <div class="mobile-menu-icon">
                <button onclick="menuShow()"><img class="icon" src="assets/img/menu_white_36dp.svg" alt=""></button>
            </div>
        </nav>
        <div class="mobile-menu">
            <ul>
            <li class="nav-item"><a href="publicar-livro.php" class="nav-link">Publicar Livros</a></li>
                    <li class="nav-item"><a href="livros.php" class="nav-link">Biblioteca</a></li>
                    <li class="nav-item"><a href="list-alunos.php" class="nav-link">Alunos</a></li>
                    <li class="nav-item"><a href="list-usuarios.php" class="nav-link">Usuários</a></li>
                 
                    <li class="nav-item"><a href="ebook-admin.php" class="nav-link">Ebook</a></li>
                    <li class="nav-item"><a href="add-foto-perfil-administradores.php" class="nav-link">Perfil</a></li>
                      <li class="nav-item"><a href="index.php" class="nav-link">Saír</a></li>
             
              
            </ul>

           
        </div>
    </header>

      <section class="banner">
              
                <div class="texto"> 

                <h1 class="titulo"> Bem-vindo ao Painel Administrativo </h1>
                <br> 
                <h2 class="sub-titulo"> Painel Administrativo/Adm </h2>

                 </div> 

                 

     </section>

    <script src="assets/js/script.js"></script>
</body>
<!-- FEITO POR: LARISSA V. KICH  -->

</html>