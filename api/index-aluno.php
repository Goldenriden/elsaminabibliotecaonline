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
    <title>Painel alunos</title>


    <style>
        /* Estilos para a barra de navegação */
       

        /* Estilos para o menu de perfil */
        
         .nav-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #333;
            color: white;
        }

        .nav-list ul {
            display: flex;
            list-style: none;
            padding: 0;
        }

        .nav-list ul li {
            margin: 0 15px;
        }

        .nav-list ul li a {
            color: white;
            text-decoration: none;
        }

        .nav-list ul li a:hover {
            color: yellow;
        }

        .mobile-menu-icon {
            display: none;
        }

        .mobile-menu {
            display: none;
            flex-direction: column;
            align-items: center;
            background-color: #333;
            width: 100%;
        }

        .mobile-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 100%;
            text-align: center;
        }

        .mobile-menu ul li {
            margin: 10px 0;
        }

        .mobile-menu ul li a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
        }

        .mobile-menu ul li a:hover {
            background-color: #575757;
        }

        /* Estilos para o menu de perfil */
        .dropdown {
            float: right;
            overflow: hidden;
        }

        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 20px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .navbar a:hover,
        .dropdown:hover .dropbtn {
            background-color: #ddd;
            color: yellow;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: yellow;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Banner section */
        .banner {
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px 20px;
        }

        .banner .titulo {
            font-size: 2.5em;
        }

        .banner .sub-titulo {
            font-size: 1.5em;
            color: #f4f4f4;
        }

        /* Media queries */
        @media (max-width: 768px) {
            .nav-list {
                display: none;
            }

            .mobile-menu-icon {
                display: block;
            }

            .banner .titulo {
                font-size: 2em;
            }

            .banner .sub-titulo {
                font-size: 1.2em;
            }
        }

        @media (max-width: 768px) {
            .mobile-menu {
                display: flex;
            }
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
                    <li class="nav-item"><a href="" class="nav-link">Pagina Inicial</a></li>
                    <li class="nav-item"><a href="ebook.php" class="nav-link">Pesquisar Livros</a></li>
                    <li class="nav-item"><a href="livros-alunos.php" class="nav-link">Livros</a></li>
                    <li class="nav-item"><a href="add-foto-alunos.php" class="nav-link">Perfil</a></li>
                    <li class="nav-item"><a href="index.php" class="nav-link">Sair</a></li>
              
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
                </ul>
            </div>
            
         
          

           <div class="mobile-menu-icon">
                <button onclick="menuShow()"><img class="icon" src="assets/img/menu_white_36dp.svg" alt="Menu"></button>

        </nav>

        <div class="mobile-menu">
            <ul>
             
                    <li class="nav-item"><a href="" class="nav-link">Pagina Inicial</a></li>
                    <li class="nav-item"><a href="ebook.php" class="nav-link">Pesquisar Livros</a></li>
                    <li class="nav-item"><a href="livros-alunos.php" class="nav-link">Livros</a></li>
                    <li class="nav-item"><a href="add-foto-alunos.php" class="nav-link">Perfil</a></li>
                    <li class="nav-item"><a href="index.php" class="nav-link">Sair</a></li>
              
            </ul>

           
        </div>
    </header>

      <section class="banner">
              
         <div class="texto"> 

                <h1 class="titulo"> Bem-vindo(a) Biblioteca Online Elsamina </h1>
                <br> 
                <h2 class="sub-titulo"> Navega Dentro do Nosso Mundo de Informação </h2>

                 </div> 


     </section>


                  <script>
        function menuShow() {
            var mobileMenu = document.querySelector('.mobile-menu');
            if (mobileMenu.classList.contains('show')) {
                mobileMenu.classList.remove('show');
            } else {
                mobileMenu.classList.add('show');
            }
        }
             </script>

    
</body>


</html>