<!DOCTYPE html>
<html lang="pt-br" class="scroll-smooth md:scroll-auto">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Salão Leila - Cabeleireiro, Estética e Bem-estar</title>

    <link rel="icon" href="https://img.freepik.com/free-vector/women-logo-design-template_474888-1838.jpg?t=st=1742231800~exp=1742235400~hmac=d47d6e7641844d3e6f2977d47e2df2f062b11fbe0e41ea72c536f981d04264c7&w=740" type="image/svg+xml">

    
    <meta name="description" content="No Salão Leila, oferecemos serviços de cabelo, unhas e estética com qualidade, carinho e profissionais qualificados. Agende seu horário e renove seu visual!">
    
    <meta name="keywords" content="salão de beleza, cabelo, unhas, estética, salão, agendamento, beleza, cuidados de cabelo, cuidados com a pele">
    
    <meta name="author" content="Matheus Pereira Soares">
    
    <meta property="og:title" content="Salão Leila - Cabeleireiro, Estética e Bem-estar">
    <meta property="og:description" content="Agende seu horário no Salão Leila e aproveite nossos serviços de cabelo, unhas e estética com um atendimento especializado e de qualidade.">
    <meta property="og:image" content="http://localhost/sistema_salao/public/img/image.png">
    <meta property="og:url" content="http://localhost/seu-projeto">
    <meta property="og:type" content="website">
    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Salão Leila - Cabeleireiro, Estética e Bem-estar">
    <meta name="twitter:description" content="Renove seu visual no Salão Leila com nossos serviços de cabelo, unhas e estética de qualidade. Agende agora!">
    <meta name="twitter:image" content="http://localhost/sistema_salao/public/img/image.png">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Funnel+Display:wght@300..800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://kit.fontawesome.com/8aa4f15802.js" crossorigin="anonymous"></script>
    <style>
        *{
            font-family: "Funnel Display", sans-serif;
        }
    </style>
</head>

        <?php 
            $this->carregarViewNoTemplate($nomeView, $dadosModel); 
        ?>

<script>
        const menuBtn = document.getElementById("menu-btn");
        const menu = document.getElementById("mobile-menu");
                
        menuBtn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    </script>
      <script src="https://unpkg.com/lucide@latest"></script>
  <script>
    lucide.createIcons();
  </script>
</html>